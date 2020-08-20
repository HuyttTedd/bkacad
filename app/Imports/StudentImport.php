<?php

namespace App\Imports;

use App\Student;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StudentImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function headingRow() : int
    {
        return 1;
    }

    public function model(array $row)
    {
        return new Student([
            'name' => $row["ten_sinh_vien"],
            'gender' => $row["gioi_tinh"] == 'nam' ? 1 : 0,
            'dob' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['ngay_sinh'])->format('Y-m-d'),
            'phone' => $row["so_dien_thoai"],
            'email' => $row["email"],
            'password' => Hash::make('123456'),
            'status' => '0',
        ]);
    }
}
