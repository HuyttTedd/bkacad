<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use Illuminate\Database\Eloquent\Model;
use App\Major;
use App\Subject;
use App\Staff;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use App\Student;
/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/
//////////Bảng ngành

$factory->define(Major::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
    ];
});
///////////////////////////////////////////////////////Subject
$factory->define(Subject::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'time_total' => $faker->randomElement([60, 120, 80, 100, 40, 20]),
        'test_type' => $faker->biasedNumberBetween($min = 0, $max = 2)
    ];
});

///////////////////////////////////////////////////////Staff
$factory->define(Staff::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'gender' => $faker->biasedNumberBetween($min = 0, $max = 1),
        'dob' => $faker->date(),
        'phone' => $faker->phoneNumber,
        'email' => $faker->email,
        'status' => $faker->biasedNumberBetween($min = 0, $max = 1),
        'level' =>  $faker->biasedNumberBetween($min = 1, $max = 2),
    ];
});

///bảng ngành và môn
$factory->define(App\MajorSubject::class, function (Faker $faker) {

    static $combos;
    $combos = $combos ?: [];
    $subject = App\Subject::all(['id'])->random();
    $major = App\Major::all(['id'])->random();
    $sub_maj = [$subject, $major];
    while(in_array($sub_maj, $combos)) {
        $major = Major::all(['id'])->random();

        $sub_maj = [$subject, $major];
    }
    array_push($combos, $sub_maj);
    return [
        'subject_id' => $subject,
        'major_id' => $major,
    ];

    // static $combos;
    // $combos = $combos ?: [];
    // static $subject;
    // $subject = $subject ?: App\Subject::all(['id']);
    // array_shift($subject);
    // $major = App\Major::all(['id'])->random();
    // $sub_maj = [$subject->first(), $major];

    // $i = 0;

    // while(in_array($sub_maj, $combos) && $i < 3) {
    //     $major = Major::all(['id'])->random();
    //     $i++;
    //     $sub_maj = [$subject, $major];
    // }
    // array_push($combos, $sub_maj);
    // return [
    //     'subject_id' => $subject,
    //     'major_id' => $major,
    // ];
});

///bảng khóa học (TỰ TẠO KHÓA HỌC VD: K10, K11)
// $factory->define(App\Course::class, function (Faker $faker) {
//     return [
//         'name' => $faker->name,
//     ];
// });

/// bảng lớp học
///GIÁO VỤ TỰ TẠO LỚP THEO NGÀNH VÀ KHÓA
// $factory->define(App\ClassRoom::class, function (Faker $faker) {
//     return [
//         'name' => $faker->name,
//         'course_id' => App\Course::all(['id'])->random(),
//         'major_id' => App\Major::all(['id'])->random()
//     ];
// });



//Bảng sinh viên
// $factory->define(App\Student::class, function (Faker $faker) {
//     return [
//         'name' => $faker->name,
//         'gender' => $faker->biasedNumberBetween($min = 0, $max = 1),
//         'dob' => $faker->date(),
//         'phone' => $faker->phoneNumber,
//         'email' => $faker->email,
//         'status' => $faker->biasedNumberBetween($min = 0, $max = 2),
//         //'class_id' => App\ClassRoom::all(['id'])->random(),
//     ];
// });


///
