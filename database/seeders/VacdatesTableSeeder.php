<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class VacdatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vacdates')->insert([
            'vacday' => date("Y-m-d H:i:s"),
            'start' => Carbon::now(),
            'end' => Carbon::now(),
            'maxPersons' => 300,
            'vaccine' => Str::random(50),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
    }
}
