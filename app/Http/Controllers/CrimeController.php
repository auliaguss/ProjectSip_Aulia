<?php

namespace App\Http\Controllers;

use \Illuminate\Support\Facades\DB;
use App\Crime;
use App\User;
use Illuminate\Http\Request;
use App\Exceptions\Handler;

use App\Exports\CrimeExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;


use App\Imports\CrimeImport;

class CrimeController extends Controller
{

    function __construct()
    {
        // if (auth()->id() == 30) {
        $this->middleware('permission:crime-create', ['only' => ['create', 'store', 'index']]);
        $this->middleware('permission:crime-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:crime-delete', ['only' => ['destroy']]);
        // }
    }

    public function destroy($id)
    {
        $ur = DB::table("crimes")->delete($id);
        return response()->json(['success' => "crime Deleted successfully.", 'tr' => 'tr_' . $id]);
    }


    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        $ur = DB::table("crimes")->whereIn('id', explode(",", $ids))->delete();
        return response()->json(['success' => "crimes Deleted successfully."]);
    }
    public function index()
    {
        $crimes = Crime::latest()->paginate(5);
        return view('crimes.index', compact('crimes'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function indexUser($id)
    {
        // $user = DB::table('users')->where('name', 'John')->first();
        // $crimes = Crime::latest()->paginate(5);
        $crimes = DB::table('crimes')->where('user_id', $id)->latest()->paginate(5);
        return view('crimes.index', compact('crimes'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        $usr = DB::table('users')->get();
        return view('crimes.create', compact('usr'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'case_name' => 'required',
            'location' => 'required',
            'user_id' => 'required',
            'start_date' => 'required',
            'status' => 'required',
            'detail' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time() . '.' . $request->photo->extension();
        $request->photo->move(public_path('images/upload'), $imageName);
        $request->photo = $imageName;

        $crm = new Crime;
        $crm->case_name = $request->case_name;
        $crm->photo = 'images/upload/' . $imageName;
        $crm->location = $request->location;
        $crm->user_id = $request->user_id;
        $crm->start_date = $request->start_date;
        $crm->status = $request->status;
        $crm->detail = $request->detail;
        $crm->save();


        return redirect()->route('crimes.index')
            ->with('success', 'Crime created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Crime  $crime
     * @return \Illuminate\Http\Response
     */
    public function show(Crime $crime)
    {
        $user = User::find($crime->user_id);
        return view('crimes.show', compact('crime', 'user'));
    }
    public function filter($jenis)
    {
        // $crimes = Crime::latest()->paginate(5);

        $crimes = DB::table('crimes')->where('status', $jenis)->latest()->paginate(5);
        // return view('crimes.index', compact('crimes'));
        return view('crimes.index', compact('crimes'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Crime  $crime
     * @return \Illuminate\Http\Response
     */
    public function edit(Crime $crime)
    {
        $usr = DB::table('users')->get();
        return view('crimes.edit', compact('crime', 'usr'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Crime  $crime
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Crime $crime)
    {

        $request->validate([
            'case_name' => 'required',
            'location' => 'required',
            'user_id' => 'required',
            'start_date' => 'required',
            'status' => 'required',
            'detail' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time() . '.' . $request->photo->extension();
        $request->photo->move(public_path('images/upload'), $imageName);
        $request->photo = $imageName;

        // $crm = new Crime;
        // $crm->save();

        Crime::where('id', $crime->id)
            ->update([
                "case_name" => $request->case_name,
                "photo" => 'images/upload/' . $imageName,
                "location" => $request->location,
                "user_id" => $request->user_id,
                "start_date" => $request->start_date,
                "status" => $request->status,
                "detail" => $request->detail,
            ]);



        return redirect()->route('crimes.index')
            ->with('success', 'Crime updated successfully');
    }


    public function export_excel(Request $req)
    {
        return Excel::download(new CrimeExport($req), 'crime.xlsx');
    }
    public function import_excel(Request $request)
    {
        // validasi
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        // menangkap file excel
        $file = $request->file('file');

        // membuat nama file unik
        $nama_file = rand() . $file->getClientOriginalName();

        // upload ke folder file_user di dalam folder public
        $file->move('file_upload', $nama_file);

        // import data
        Excel::import(new CrimeImport, public_path('/file_upload/' . $nama_file));

        // alihkan halaman kembali
        return redirect('/crimes');
    }
}
