<?php

namespace App\Http\Controllers;

use \Illuminate\Support\Facades\DB;
use App\Crime;
use Illuminate\Http\Request;

class CrimeController extends Controller
{

    function __construct()
    {
        // if (auth()->id() == 30) {
        $this->middleware('permission:crime-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:crime-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:crime-delete', ['only' => ['destroy']]);
        // }
    }

    public function index()
    {
        $crimes = Crime::latest()->paginate(5);
        return view('crimes.index', compact('crimes'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('crimes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);


        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        Crime::create($request->all());


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
        return view('crimes.show', compact('crime'));
    }
    public function search($jenis, $variabel)
    {
        if ($jenis == "id") $data = Crime::find($variabel);
        else $data = DB::table('crimes')->where($jenis, 'like', '%' . $variabel . '%')->get();
        return $data;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Crime  $crime
     * @return \Illuminate\Http\Response
     */
    public function edit(Crime $crime)
    {
        return view('crimes.edit', compact('crime'));
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
        request()->validate([
            'name' => 'required',
            'detail' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);


        // $request->validate([
        // ]);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        $crime->update($request->all());


        return redirect()->route('crimes.index')
            ->with('success', 'Crime updated successfully');
    }
    // public function imageUploadPost(Request $request)
    // {
    //     $request->validate([
    //         'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    //     ]);

    //     $imageName = time().'.'.$request->image->extension();  

    //     $request->image->move(public_path('images'), $imageName);

    //     return back()
    //         ->with('success','You have successfully upload image.')
    //         ->with('image',$imageName);

    // }

    public function delete($id)
    {
        $user = Crime::find($id);
        $user->delete();

        return "Data Berhasil Dihapus";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\crime  $crime
     * @return \Illuminate\Http\Response
     */
    // public function destroy(crime $crime)
    // {
    //     $crime->delete();


    //     return redirect()->route('crimes.index')
    //                     ->with('success','crime deleted successfully');
    // }
}
