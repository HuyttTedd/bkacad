<?php

namespace App\Exports;

use App\Student;
use Maatwebsite\Excel\Concerns\FromCollection;

use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportStudent implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Student::all(['id', 'name', 'gender', 'dob', 'phone', 'email']);
    }


    public function headings() :array {
    	return ["Mã sinh viên", "Tên", "Giới tính", "Ngày sinh", "Số điện thoại", "Email"];
    }
}
