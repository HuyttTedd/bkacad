<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManagerController extends Controller
{
    public function xep_lop() {
        return view('manager.xep_lop');
    }

}
