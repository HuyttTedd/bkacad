<?php

namespace App\Http\Controllers;
use App\Exports\ExportStudent;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class ExcelController extends Controller
{
    public function export()
    {
        return Excel::download(new ExportStudent, 'users.xlsx');
    }
}
