<?php

namespace App\Http\Controllers;

use App\Course;
use App\Major;
use App\Subject;
use App\MajorSubject;
use App\CourseMajor;
use Illuminate\Http\Request;
use Mockery\Matcher\Subset;

class ManagerController extends Controller
{

    public function view_all_khoa_hoc() {
        $khoa_hoc = Course::all();
        return view('manager.view_khoa_hoc', compact('khoa_hoc'));
    }



    public function khoa_hoc_chi_tiet($id_khoa_hoc) {
        $nganh = Course::find($id_khoa_hoc)->majors()->get();
        $khoa_hoc = Course::find($id_khoa_hoc);
        return view('manager.khoa_hoc_chi_tiet', compact('nganh', 'khoa_hoc'));
    }

    public function create_khoa_nganh($id_khoa_hoc) {
        $a = Course::find($id_khoa_hoc)->majors()->get();
        //print_r($a->pluck('id')->toArray());
        //dd($a);
        $major = Major::all();
        $nganh = $major->diff(Subject::whereIn('id', $a->pluck('id')->toArray())->get());
        // $mon2 = $mon->diff(Subject::whereIn('id', ['BKS10000', 'BKS10001'])->get());
        $khoa_hoc = Course::find($id_khoa_hoc);
        return view('manager.create_khoa_nganh', compact('nganh', 'khoa_hoc'));
    }

    public function store_khoa_nganh() {
        $data = request()->validate([
            'course_id' => 'required',
            'major_id' => 'required',
        ]);

        $courseMajor = new CourseMajor();
        $courseMajor->create(
            [
                'course_id' => $data['course_id'],
                'major_id' => $data['major_id'],
            ]);
            $id = $data["course_id"];
        return redirect("khoa_hoc/$id");
    }

    // public function xep_lop() {
    //     return view('manager.xep_lop');
    // }


    public function create_khoa_hoc() {
        return view('manager.create_khoa_hoc');
    }


    public function store_khoa_hoc() {
        $data = request()->validate([
            'new_khoa_hoc' => 'required',
        ]);
        $course = new Course();
        $course->create(
            [
                'name' => $data['new_khoa_hoc']
            ]
    );
    return redirect('/khoa_hoc');
    }

    ///////////////////////////////////
    public function view_all_nganh() {
        $nganh = Major::all();
        return view('manager.view_nganh', compact('nganh'));
    }
/////////////
    public function create_nganh() {
        return view('manager.create_nganh');
    }
/////////////
    public function store_nganh() {
        $data = request()->validate([
            'new_nganh' => 'required',
        ]);
        $major = new Major();
        $major->create(
            [
                'name' => $data['new_nganh'],
            ]);
            return redirect('/nganh');
    }

    public function update_nganh($id_nganh) {
        $nganh = Major::find($id_nganh);
        return view('manager.update-nganh', compact('nganh'));
    }

    public function process_update_nganh(Request $rq) {
        $data = request()->validate([
            'name' => 'required',
        ]);

        Major::find($rq->id)->update($rq->all());
        return redirect('/nganh');
    }
///////////////////////////Mon
    public function view_mon() {
        $mon = Subject::all();
        return view('manager.view_mon', compact('mon'));
    }

    public function create_mon() {
        return view('manager.create_mon');
    }


    public function store_mon() {
        $data = request()->validate([
            'name' => 'required',
            'time_total' => 'required',
            'test_type' => 'required',
        ]);
        $subject = new Subject();
        $subject->create(
            [
                'name' => $data['name'],
                'time_total' => $data['time_total'],
                'test_type' => $data['test_type'],
            ]);
        return redirect('/mon');
    }

//////////////////////////////////
    public function view_mon_nganh($id_nganh) {
        $mon = Major::find($id_nganh)->subjects()->get();
        $name = Major::find($id_nganh)->name;
        return view('manager.view_mon_nganh', compact('mon', 'id_nganh', 'name'));
    }
///////////////////////
    public function add_mon_nganh($id_nganh) {
        $a = Major::find($id_nganh)->subjects()->get();
        //print_r($a->pluck('id')->toArray());
        //dd($a);
        $mon = Subject::all();
        $mon2 = $mon->diff(Subject::whereIn('id', $a->pluck('id')->toArray())->get());
        // $mon2 = $mon->diff(Subject::whereIn('id', ['BKS10000', 'BKS10001'])->get());
        $name = Major::find($id_nganh)->name;
        return view('manager.add_mon_nganh', compact('mon2', 'name', 'id_nganh'));
    }
////////////////////////////
    public function store_mon_nganh($id_nganh) {

        $data = request()->validate([
            'subject_id' => 'required',
            'major_id' => 'required',
        ]);

        $subject = new MajorSubject();
        $subject->create(
            [
                'subject_id' => $data['subject_id'],
                'major_id' => $data['major_id'],
            ]);
        return redirect("mon/$id_nganh");
    }

    ///////////////////////////

    public function update_mon($id_mon) {
        $mon = Subject::find($id_mon);
        //dd($mon);
        return view('manager.update_mon', compact('mon'));
    }

    public function process_update_mon(Request $rq) {
        $data = request()->validate([
            'name' => 'required',
            'time_total' => 'required',
            'test_type' => 'required',
        ]);

        Subject::find($rq->id)->update($rq->all());
        return redirect('/mon');
    }

    

}
