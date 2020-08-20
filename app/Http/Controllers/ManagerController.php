<?php

namespace App\Http\Controllers;

use App\Course;
use App\Major;
use App\Subject;
use App\MajorSubject;
use App\CourseMajor;
use App\Student;
use App\ClassRoom;
use Illuminate\Http\Request;
use Mockery\Matcher\Subset;

class ManagerController extends Controller
{

    public function view_all_khoa_hoc() {
        $khoa_hoc = Course::all();
        return view('manager.view_khoa_hoc', compact('khoa_hoc'));
    }


    public function khoa_hoc_chi_tiet($id_khoa_hoc) {
        $nganh = Course::findOrFail($id_khoa_hoc)->majors()->get();
        $khoa_hoc = Course::findOrFail($id_khoa_hoc);
        return view('manager.khoa_hoc_chi_tiet', compact('nganh', 'khoa_hoc'));
    }

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

    public function update_khoa_hoc($id) {
        $khoa_hoc = Course::findOrFail($id);
        return view('manager.update_khoa_hoc', compact('khoa_hoc'));
    }

    public function process_update_khoa_hoc(Request $rq) {
        $data = request()->validate([
            'id' => 'required',
            'name' => 'required',
        ]);

        Course::findOrFail($rq->id)->update($rq->all());
        return redirect("/khoa_hoc");
    }
///////////////////END KHOA HOC/////////////////////////

////////////////////KHOA NGANH///////////////
    public function view_khoa_nganh($id) {
        return redirect("/khoa_hoc/$id/nganh");
    }

    public function create_khoa_nganh($id_khoa_hoc) {
        $a = Course::findOrFail($id_khoa_hoc)->majors()->get();
        //print_r($a->pluck('id')->toArray());
        //dd($a);
        $major = Major::all();
        $nganh = $major->diff(Major::whereIn('id', $a->pluck('id')->toArray())->get());
        //print_r($nganh->pluck('id')->toArray());
        // // $mon2 = $mon->diff(Subject::whereIn('id', ['BKS10000', 'BKS10001'])->get());
        $khoa_hoc = Course::findOrFail($id_khoa_hoc);
        return view('manager.create_khoa_nganh', compact('nganh', 'khoa_hoc'));
    }


    public function store_khoa_nganh() {
        $data = request()->validate([
            'course_id' => 'required',
            'major_id' => 'required',
            'course_name' => 'required',
            'major_name' => 'required',
        ]);

        $courseMajor = new CourseMajor();
        $class = new ClassRoom(); /////tạo luôn 1 lớp chứa tất cả sinh viên nhập học
        $class->create([
                'name' => $data['course_name']."+".$data['major_name'],
                'course_id' => $data['course_id'],
                'major_id' => $data['major_id'],

        ]);
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
        $nganh = Major::findOrFail($id_nganh);
        return view('manager.update_nganh', compact('nganh'));
    }

    public function process_update_nganh(Request $rq) {
        $data = request()->validate([
            'name' => 'required',
        ]);

        Major::findOrFail($rq->id)->update($rq->all());
        return redirect('/nganh');
    }

    public function redirect_view_mon_nganh($id) {
        return redirect("/nganh/$id/mon");
    }

    public function view_mon_nganh($id_nganh) {
            $mon = Major::findOrFail($id_nganh)->subjects()->get();
            $name = Major::findOrFail($id_nganh)->name;
            return view('manager.view_mon_nganh', compact('mon', 'id_nganh', 'name'));
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

///////////////////////
    public function add_mon_nganh($id_nganh) {
        $a = Major::findOrFail($id_nganh)->subjects()->get();
        //print_r($a->pluck('id')->toArray());
        //dd($a);
        $mon = Subject::all();
        $mon2 = $mon->diff(Subject::whereIn('id', $a->pluck('id')->toArray())->get());
        // $mon2 = $mon->diff(Subject::whereIn('id', ['BKS10000', 'BKS10001'])->get());
        $name = Major::findOrFail($id_nganh)->name;
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
        $mon = Subject::findOrFail($id_mon);
        //dd($mon);
        return view('manager.update_mon', compact('mon'));
    }

    public function process_update_mon(Request $rq) {
        $data = request()->validate([
            'name' => 'required',
            'time_total' => 'required',
            'test_type' => 'required',
        ]);

        Subject::findOrFail($rq->id)->update($rq->all());
        return redirect('/mon');
    }

    ////////////////////////////
    public function view_sinh_vien() {
        $student = Student::where('status', 0)->get();

        return view('manager.sinh_vien', compact('student'));
    }

    public function create_sinh_vien() {
        return view('manager.create_sinh_vien');
    }

    public function process_create_sinh_vien(Request $rq) {
        $data = request()->validate([
            'name' => 'required',
            'gender' => 'required',
            'dob' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'status' => 'required',
        ]);
        $student = new Student();
        $student->create($rq->all());
        return redirect('/sinh_vien');
    }

    public function update_sinh_vien($id)
    {
        $student = Student::findOrFail($id);
        return view('manager.update_sinh_vien', compact('student'));
    }

    public function process_update_sinh_vien(Request $rq) {
        $data = request()->validate([
            'name' => 'required',
            'gender' => 'required',
            'dob' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'status' => 'required',
        ]);

        Student::findOrFail($rq->id)->update($rq->all());
        return redirect('/sinh_vien');
    }

    public function view_lop_hoc($id_khoa_hoc, $id_nganh) {
        $class = ClassRoom::where('course_id', $id_khoa_hoc)->where('major_id', $id_nganh)->get();
        return view('manager.view_lop_hoc', compact('class'));
    }

}
