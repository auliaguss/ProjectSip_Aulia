<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Illuminate\Support\Facades\DB;
use App\User;
// use App\Role;
use Spatie\Permission\Models\Role;

use App\Exports\UserExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

use Session;

use App\Imports\UserImport;

class UserController extends Controller
{
    function __construct()
    {
        // if (auth()->id() == 30) {
        //yang memiliki hak akses crime otomatis memiliki hak akses untuk user juga
        $this->middleware('permission:crime-create', ['only' => ['create', 'store', 'index']]);
        $this->middleware('permission:crime-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:crime-delete', ['only' => ['destroy']]);
        // }
    }

    public function destroy($id)
    {
        $ur = DB::table("users")->delete($id);
        return response()->json(['success' => "user Deleted successfully.", 'tr' => 'tr_' . $id]);
    }



    public function create()
    {
        $roles = DB::table('roles')->get();

        // $roles = Role::pluck('name', 'name')->all();
        return view('users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required',
            'role_id' => 'required',
        ]);

        User::create($request->all());


        return redirect()->route('users.index')
            ->with('success', 'User created successfully.');
    }

    public function filter($jenis)
    {
        $users = DB::table('users')->where('role_id', $jenis)->get();
        return view('users.index', compact('users'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = DB::table('roles')->get();
        $userRole = $user->roles->pluck('name', 'name')->all();



        return view('users.edit', compact('user', 'roles', 'userRole'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required',
            'role_id' => 'required',
        ]);

        $user->update($request->all());


        return redirect()->route('users.index')
            ->with('success', 'User updated successfully');
    }
    public function index(Request $request)
    {
        $data = User::orderBy('id', 'DESC')->paginate(5);
        return view('users.index', compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }


    // public function create()
    // {
    //     $roles = Role::pluck('name', 'name')->all();
    //     return view('users.create', compact('roles'));
    // }

    public function cekRole($id)
    {
        $user = User::find($id);
        $ro = Role::find($user->role_id);
        return $ro->name;
    }

    public function search($jenis, $variabel)
    {
        if ($jenis == "id") $data = User::find($variabel);
        else $data = DB::table('users')->where($jenis, 'like', '%' . $variabel . '%')->get();
        return $data;
    }

    public function export_excel(Request $req)
    {
        return Excel::download(new UserExport($req), 'user.xlsx');
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
        Excel::import(new UserImport, public_path('/file_upload/' . $nama_file));

        // alihkan halaman kembali
        return redirect('/users');
    }

    // public function edit(request $req, $id)
    // {
    //     $user = User::find($id);
    //     $user->role_id = $req->role_id;
    //     $user->name = $req->name;
    //     $user->username = $req->username;
    //     $user->email = $req->email;
    //     $user->password = $req->password;

    //     $user->save();

    //     return "Data Berhasil Diupdate";
    // }

    // public function delete($id)
    // {
    //     $user = User::find($id);
    //     $user->delete();

    //     return "Data Berhasil Dihapus";
    // }
}
