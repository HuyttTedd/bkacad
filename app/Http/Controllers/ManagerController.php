<?php

namespace App\Http\Controllers;

use App\Course;
use App\Major;
use App\Subject;
use Illuminate\Http\Request;

class ManagerController extends Controller
{

    public function view_khoa_hoc() {
        $khoa_hoc = Course::all();
        return view('manager.view_khoa_hoc', compact('khoa_hoc'));
    }

    public function xep_lop() {
        return view('manager.xep_lop');
    }

    public function khoa_hoc_chi_tiet($khoa_hoc) {
        $khoa = 
    }

}
