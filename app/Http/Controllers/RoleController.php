<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Illuminate\Support\Facades\DB;
use App\Role;

class RoleController extends Controller
{
    public function index()
    {
        return Role::all();
    }

    public function search($jenis, $variabel)
    {
        if ($jenis == "id") $data = Role::find($variabel);
        else $data = DB::table('roles')->where($jenis, 'like', '%' . $variabel . '%')->get();
        return $data;
    }

    public function add(request $req)
    {
        $role = new Role();
        $role->name = $req->name;
        $role->save();
        return "Data Berhasil Disimpan";
    }
    public function edit(request $req, $id)
    {
        $role = Role::find($id);
        $role->name = $req->name;

        $role->save();

        return "Data Berhasil Diupdate";
    }

    public function delete($id)
    {
        $role = Role::find($id);
        $role->delete();

        return "Data Berhasil Dihapus";
    }
}
