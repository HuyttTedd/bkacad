<?php

namespace App\Http\Controllers;
use Illuminate\Support\Carbon;
use App\Course;
use App\Major;
use App\Subject;
use App\MajorSubject;
use App\CourseMajor;
use App\Student;
use App\Classes;
use App\Assignment;
use App\Attendance;
use App\AttendanceDetail;
use App\Staff;
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
            // 'course_name' => 'required',
            // 'major_name' => 'required',
        ]);

        $courseMajor = new CourseMajor();
        //$class = new Classes(); /////tạo luôn 1 lớp chứa tất cả sinh viên nhập học
        // $class->create([
        //         'name' => $data['course_name']."+".$data['major_name'],
        //         'course_id' => $data['course_id'],
        //         'major_id' => $data['major_id'],

        // ]);
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
//////////////////////////////////


///////////////////////

////////////////////////////


    ///////////////////////////



    ////////////////////////////
    // public function view_sinh_vien() {
    //     $student = Student::where('status', 0)->get();

    //     return view('manager.sinh_vien', compact('student'));
    // }

    // public function create_sinh_vien() {
    //     return view('manager.create_sinh_vien');
    // }

    // public function process_create_sinh_vien(Request $rq) {
    //     $data = request()->validate([
    //         'name' => 'required',
    //         'gender' => 'required',
    //         'dob' => 'required',
    //         'phone' => 'required',
    //         'email' => 'required',
    //         'status' => 'required',
    //     ]);
    //     $student = new Student();
    //     $student->create($rq->all());
    //     return redirect('/sinh_vien');
    // }

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
////////////////////LOP HOC//////////////////////////////////////
    public function view_lop_hoc($id_khoa_hoc, $id_nganh) {
        $khoa_hoc = Course::findOrFail($id_khoa_hoc);
        $nganh = Major::findOrFail($id_nganh);
        $class = Classes::where('course_id', $id_khoa_hoc)->where('major_id', $id_nganh)->get();
        return view('manager.view_lop_hoc', compact('class', 'khoa_hoc', 'nganh'));
    }

    // public function create_lop($id_khoa_hoc, $id_nganh) {
    //     $khoa_hoc = Course::findOrFail($id_khoa_hoc);
    //     $nganh = Major::findOrFail($id_nganh);
    //     $class = Classes::where('course_id', $id_khoa_hoc)->where('major_id', $id_nganh)->get();

    //     return view('manager.create_lop', compact('class', 'khoa_hoc', 'nganh'));
    // }

    // public function process_create_lop(Request $rq, $id_khoa_hoc, $id_nganh) {
    //     $total = $rq->total;

    //     $countClass = Classes::count();

    //     $khoa_hoc = Course::findOrFail($id_khoa_hoc);
    //     //dd($numberOfClass);
    //     for($i = 1; $i <= $total; $i++) {
    //         $class = new Classes();
    //         $class->create([
    //         'name' => 'BKC'.($countClass + $i).($khoa_hoc->name),
    //         'course_id' => $id_khoa_hoc,
    //         'major_id' => $id_nganh,
    //         ]);
    //     }
    //     return redirect("/class/$id_khoa_hoc/$id_nganh");
    // }

    public function import_sinh_vien($id_khoa_hoc, $id_nganh) {
        $khoa_hoc = Course::findOrFail($id_khoa_hoc);
        $nganh = Major::findOrFail($id_nganh);
        return view('manager.create_lop', compact('khoa_hoc', 'nganh'));
    }

    public function view_lop_sinh_vien($id_lop) {
        $sinh_vien = Classes::findOrFail($id_lop)->students()->get();
        $lop = Classes::findOrFail($id_lop);
        return view('manager.view_lop_sinh_vien', compact('lop', 'sinh_vien'));
    }

    public function phan_cong($id_khoa_hoc, $id_nganh) {
        $khoa_hoc = Course::find($id_khoa_hoc);
        $nganh = Major::find($id_nganh);
        $giang_vien = Staff::all();
        return view('manager.phan_cong', compact('khoa_hoc', 'nganh', 'giang_vien'));
    }

    public function process_phan_cong(Request $rq) {


        $arr = $rq->input('class');
        foreach ($arr as $key => $value) {
                Assignment::updateOrCreate([
            'class_id' => $value,
            'subject_id' => $rq->subject_id],[
            'lecturer_id' =>$rq->lecturer_id,
        ]);
        }

        //dd($arr);
        redirect('/phan_cong');
    }

//giảng viên xem phân công của mình
    public function view_phan_cong($id_giang_vien) {

        $arr = array();
        $phan_cong = Assignment::where('lecturer_id', $id_giang_vien)->get();
        foreach ($phan_cong as $key) {
            $class = Classes::find($key->class_id)->name;
            $subject = Subject::find($key->subject_id)->name;
            array_push($arr, [$class, $subject]);
        }
        //dd($arr);

        return view('manager.giang_vien_view_phan_cong', compact('arr'));
    }

    public function diem_danh($id_giang_vien) {
        $lastAtt = Attendance::where('lecturer_id', $id_giang_vien)->orderBy('id', 'DESC')->first();
        $att_id = $lastAtt->id;
        $date_time = Carbon::now()->toDateTimeString();
        $get_time = explode(" ", $date_time);
        if($get_time[0] > $lastAtt->date || $get_time[1] > $lastAtt->time_end) {
                    //dd(date('H', $date_time));
        //dd($get_time);
        $arr = array();
        $phan_cong = Assignment::where('lecturer_id', $id_giang_vien)->get();
        foreach ($phan_cong as $key) {
            $class = Classes::find($key->class_id);
            $subject = Subject::find($key->subject_id);
            $arr_phan_cong = [
                    'name' => "LỚP: ".$class->name." + MÔN HỌC: ".$subject->name,
                    'class_id' => $class->id,
                    'subject_id' => $subject->id,

                ];
            array_push($arr, $arr_phan_cong);
        }
        //dd($arr);
        return view('manager.chon_lop_diem_danh', compact('arr', 'id_giang_vien'));
        }

    }



    public function process_chon_lop_mon(Request $rq) {
        request()->validate([
            'classSubject' => 'required',
        ]);
        $id_giang_vien = $rq->lecturer_id;
        $class_subject = explode(",", $rq->classSubject);
        $class_id = $class_subject[0];
        $subject_id = $class_subject[1];
        session([
            'class_id' => $class_id,
            'subject_id' => $subject_id,
            'lecturer_id' => $id_giang_vien,
        ]);
        //dd($student);
        return redirect("/view_diem_danh");
    }

    public function view_diem_danh(Request $rq) {
        $view_diem_danh = $rq->session()->all();
        $class = Classes::findOrFail($view_diem_danh['class_id']);
        $subject = Subject::findOrFail($view_diem_danh['subject_id']);
        $student = Classes::find($class->id)->students()->get();
        $id_giang_vien = $view_diem_danh['lecturer_id'];
        $each_att_id = Attendance::where('class_id', $class->id)->where('subject_id', $subject->id)->pluck('id');
        //dd($each_att_id);
        $arr = [];
        $arrr = [];
        foreach ($student as $key1) {
                $arr[$key1->id]['sum'] = 0;
        }

        foreach ($each_att_id as $key => $value) {

            $id_att = AttendanceDetail::where('attendance_id', $value)->get();
            foreach ($id_att as $valuee) {
                if($valuee->status == 0) {
                    $count = 0;
                } elseif($valuee->status == 2) {
                    $count = 1;
                } else {
                    $count = (float)1/3;
                }

                $arr[$valuee->student_id]['sum'] += $count;
                // array_push($arrr, [$valuee->attendance_id, $valuee->student_id]);
            }

        }
        //dd($arr);
        return view('manager.diem_danh', compact('student', 'class', 'subject', 'id_giang_vien', 'arr'));
    }

    //đi học :0, muộn: 1; nghỉ: 2; có phép: 3
    //đi học :0, muộn: 1; nghỉ: 2; có phép: 3

    public function process_diem_danh(Request $rq) {
        request()->validate([
            //validate bắt đầu vs kết thúc dùng javaScript

            'start_hour' => 'required',
            'start_minute' => 'required',
            'end_hour' => 'required',
            'end_minute' => 'required',
            'end_hour' => 'gt:start_hour',
            'start_hour' => 'numeric|between:6,23',
            'end_hour' => 'numeric|between:6,23',
        ]);
        $date = Carbon::now()->toDateString();
        //dd($date);
        $time_start = $rq->start_hour.":".$rq->start_minute;
        $time_end = $rq->end_hour.":".$rq->end_minute;
        Attendance::updateOrCreate([
            'time_start' => $time_start,
            'lecturer_id' => $rq->lecturer_id,
            'class_id' => $rq->class_id,
            'date' => $date,
            'subject_id' => $rq->subject_id,
            ],[
            'time_end' => $time_end,

        ]
        );

        $lastAtt = Attendance::where('lecturer_id', $rq->lecturer_id)->orderBy('id', 'DESC')->first();
        $att_id = $lastAtt->id;

        $student = Classes::find($rq->class_id)->students()->get();
        foreach ($student as $key) {
            $id = $key->id;
            $status = $rq->$id;
            AttendanceDetail::updateOrCreate(
                ['attendance_id' => $att_id,
                 'student_id' => $id],[
                 'status' => $status,
                ]
            );
        }
        //dd($rq->$id);
        return redirect("/chon_lop_diem_danh/$rq->lecturer_id");

    }

    public function update_diem_danh() {

    }
}


