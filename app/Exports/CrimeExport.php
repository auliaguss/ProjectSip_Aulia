<?php

namespace App\Exports;

use App\Crime;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;

class CrimeExport implements FromView
{
    use Exportable;
    protected $request;
    public function __construct($request)
    {
        $this->request = $request;
    }
    public function view(): View
    {
        $crimes = Crime::all();
        if ($this->request->id > 0) {
            $crimes = Crime::where($this->request->jenis, 'like', '%' . $this->request->name)->get();
        }
        return view('excel.crime', [
            'crime' => $crimes
        ]);
    }

    // /**
    // * @return \Illuminate\Support\Collection
    // */
    // public function collection()
    // {
    //     return Crime::all();
    // }
}
