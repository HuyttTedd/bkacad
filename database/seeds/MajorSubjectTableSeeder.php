<?php

use Illuminate\Database\Seeder;

class MajorSubjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\MajorSubject::class, 20)->create();
    }
}
