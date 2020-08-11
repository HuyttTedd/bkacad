<?php

use Illuminate\Database\Seeder;
use App\Subject;
class SubjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Subject::class, 40)->create();
    }
}
