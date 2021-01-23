<?php

namespace App\Http\Controllers;


use \Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class ProductController extends Controller
{

    public function index()
    {
        $porducts = DB::table("porducts")->get();
        return view('porducts', compact('porducts'));
    }

    public function destroy($id)
    {
        $ur = DB::table("porducts")->delete($id);
        return response()->json(['success' => "porduct Deleted successfully.", 'tr' => 'tr_' . $id]);
    }


    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        $ur = DB::table("porducts")->whereIn('id', explode(",", $ids))->delete();
        return response()->json(['success' => "porducts Deleted successfully."]);
    }
}
