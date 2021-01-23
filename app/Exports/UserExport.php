<?php

namespace App\Exports;

use App\User;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;

class UserExport implements FromView
{
    use Exportable;
    protected $request;
    public function __construct($request)
    {
        $this->request = $request;
    }
    public function view(): View
    {
        $users = User::all();
        if ($this->request->id > 0) {
            $users = User::where($this->request->jenis, 'like', '%' . $this->request->name)->get();
        }
        return view('excel.user', [
            'user' => $users
        ]);
    }
    // /**
    // * @return \Illuminate\Support\Collection
    // */
    // public function collection()
    // {
    // return MttRegistration::where('lifeskill_id',$this->id)->get()([
    //     'first_name', 'email'
    // ]);
    //     return User::all();
    // }
}
