<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Illuminate\Support\Facades\DB;
use App\User;
// use App\Role;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $data = User::orderBy('id', 'DESC')->paginate(5);
        return view('users.index', compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find(2);
        return view('users.show', compact('user'));
    }

    // public function index()
    // {
    //     return User::all();
    // }

    public function create()
    {
        $roles = Role::pluck('name', 'name')->all();
        return view('users.create', compact('roles'));
    }

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

    public function add(request $req)
    {
        $user = new User();
        $user->role_id = $req->role_id;
        $user->name = $req->name;
        $user->username = $req->username;
        $user->email = $req->email;
        $user->password = $req->password;
        $user->save();
        return "Data Berhasil Disimpan";
    }
    public function edit(request $req, $id)
    {
        $user = User::find($id);
        $user->role_id = $req->role_id;
        $user->name = $req->name;
        $user->username = $req->username;
        $user->email = $req->email;
        $user->password = $req->password;

        $user->save();

        return "Data Berhasil Diupdate";
    }

    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();

        return "Data Berhasil Dihapus";
    }
}
