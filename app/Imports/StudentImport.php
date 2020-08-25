<?php

namespace App\Imports;

use App\Student;
use App\Classes;
use App\ClassStudent;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class StudentImport implements ToCollection, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function __construct(array $data = [])
    {
        $this->data = $data;
    }

    public function headingRow() : int
    {
        return 1;
    }

    public function collection(Collection $rows)
    {
        $i = 0;
        $arr = array();
        //$this->data = $arr;
        $arr = $this->data;
        // $arr_sinh_vien_lop = array();
        // $numOfClass = ceil((int)$arr['total'] / (int)$arr['each']);
        foreach ($rows as $row)
        {
            Student::create([
                        'name' => $row["ten_sinh_vien"],
                        'gender' => $row["gioi_tinh"] == 'nam' ? 1 : 0,
                        //'dob' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['ngay_sinh'])->format('Y-m-d'),
                        'dob' => $row['ngay_sinh'],
                        'phone' => $row["so_dien_thoai"],
                        'email' => $row["email"],
                        'password' => Hash::make('123456'),
                        'status' => '0',
            ]);

            $student = Student::all()->last();

            if($i % (int)$arr['each'] == 0) {
                $count = Classes::all()->count();
                Classes::create([
                'name' => 'BKC'.($count + 10).$arr['course_name'],
                'course_id' => $arr['course_id'],
                'major_id' => $arr["major_id"],
            ]);
            }

            // $b = [
            //     'student_id' => $student->id,
            //     'class_id' => $lastClass->id,
            // ];
            // array_push($arr_sinh_vien_lop, $b);
            $lastClass = Classes::all()->last();
            ClassStudent::create([
                'student_id' => $student->id,
                'class_id' => $lastClass->id,
            ]);

            $i++;
        }

        // foreach ($arr_sinh_vien_lop as $key => $value) {
        //     # code...
        //     ClassStudent::create([
        //         'student_id' => $value['student_id'],
        //         'class_id' => $value['class_id'],
        //     ]);
        // }



    // public function model(array $row)
    // {
    //     $i = 0;
    //     $arr = array();
    //     array_push($arr, $row);
    //     $i++;
    //     if(count($arr) == 1) {
    //         dd(++$i);
    //     }

    //     return new Student([
    //         'name' => $row["ten_sinh_vien"],
    //         'gender' => $row["gioi_tinh"] == 'nam' ? 1 : 0,
    //         'dob' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['ngay_sinh'])->format('Y-m-d'),
    //         'phone' => $row["so_dien_thoai"],
    //         'email' => $row["email"],
    //         'password' => Hash::make('123456'),
    //         'status' => '0',
    //     ]);
    // }
}


}
