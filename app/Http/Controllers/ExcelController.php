<?php

namespace App\Http\Controllers;
use App\Exports\ExportStudent;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Imports\StudentImport;
use App\Student;
use App\Course;
use App\Classes;
use App\ClassStudent;

class ExcelController extends Controller
{

    public function export_sinh_vien()
    {
        return Excel::download(new ExportStudent, 'users.xlsx');
    }

    public function import_sinh_vien()
    {
        return view('excel.import_excel');
    }
    public function process_import_sinh_vien(Request $rq) {
        $this->validate($rq, [
            'file'  => 'required|mimes:xls,xlsx',
            'course_id' => 'required',
            'major_id' => 'required',
            'total' => 'required',
            'each' => 'required',
        ]);
        //$lastClass = Student::all()->last()->id;
        //dd($lastClass);
        // $a = $rq->all();
        // dd($a);
        $course_id = $rq->course_id;
        $major_id = $rq->major_id;
        $total = $rq->total;
        $each = $rq->each;
        $course_name = Course::findOrFail($course_id)->name;
        $data = [
            'course_id' => $course_id,
            'major_id' => $major_id,
            'total' => $total,
            'each' => $each,
            'course_name' => $course_name,
        ];

        Excel::import(new StudentImport($data),request()->file('file'));

        // $numOfClass = ceil((int)$total / (int)$each);
        // $lastClasses = Classes::orderBy('id', 'DESC')->limit($numOfClass);
        // $student =
        //     ClassStudent::create([
        //         'student_id' => $student->id,
        //         'class_id' => $lastClasses->id,
        //     ]);
        return redirect('/import_sinh_vien');
    }
}
