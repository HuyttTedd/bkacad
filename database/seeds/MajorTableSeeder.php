<?php

use Illuminate\Database\Seeder;
use App\Major;
class MajorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Major::class, 4)->create();
    }
}
