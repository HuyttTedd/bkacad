<?php

namespace App\Http\Controllers;
use App\Exports\ExportStudent;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Imports\StudentImport;

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
            'file'  => 'required|mimes:xls,xlsx'
        ]);

        Excel::import(new StudentImport,request()->file('file'));

        return redirect('/import_sinh_vien')->with('success', 'Success!!!');
    }
}
