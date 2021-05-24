<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\App;
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
        $vacdate = new \App\Models\Vacdate;
        $vacdate->vacday = "2021-08-21";
        $vacdate->start = "12:20:00";
        $vacdate->end = "12:30:00";
        $vacdate->maxpersons = 15;
        $vacdate->vaccine = "Moderna";

        $vacdate->vacplace()->associate(1);
        $vacdate->save();

        $vacdate1 = new \App\Models\Vacdate;
        $vacdate1->vacday = "2021-08-21";
        $vacdate1->start = "12:40:00";
        $vacdate1->end = "12:50:00";
        $vacdate1->maxpersons = 2;
        $vacdate1->vaccine = "Pfizer";

        $vacdate1->vacplace()->associate(2);
        $vacdate1->save();

        $vacdate2 = new \App\Models\Vacdate;
        $vacdate2->vacday = "2021-08-22";
        $vacdate2->start = "13:40:00";
        $vacdate2->end = "14:50:00";
        $vacdate2->maxpersons = 5;
        $vacdate2->vaccine = "Moderna";

        $vacdate2->vacplace()->associate(3);
        $vacdate2->save();





            //'vacday','start','end','maxPersons','vaccine','vacplace','user_id'

        /*DB::table('vacdates')->insert([
            'vacday' => date("Y-m-d H:i:s"),
            'start' => Carbon::now(),
            'end' => Carbon::now(),
            'maxPersons' => 300,
            'vaccine' => Str::random(50),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);*/
    }
}
