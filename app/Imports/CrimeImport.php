<?php

namespace App\Imports;

use App\Crime;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CrimeImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Crime([
            'case_name' => $row['Case Name'] ?? $row['case name'] ?? $row['case_name'],
            'location' => $row['Location'] ?? $row['location'],
            'user_id' => $row['User ID'] ?? $row['user id'] ?? $row['user_id'],
            'start_date' => $row['Start Date'] ?? $row['start date'] ?? $row['start_date'],
            'status' => $row['Status'] ?? $row['status'],
            'detail' => $row['Detail'] ?? $row['detail'],
        ]);
    }
    public function headingRow(): int
    {
        return 3;
    }
}
