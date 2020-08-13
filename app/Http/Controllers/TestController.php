<?php

namespace App\Http\Controllers;
use App\Major;
use Illuminate\Http\Request;
use Database\seeds\DatabseSeeder;

class TestController extends Controller
{
    public function test() {

        $major = Major::all(['id']);
        return($major->first());
        // return view('test', compact('major'));
        //$a = new DatabaseSeeder();


    }
}
