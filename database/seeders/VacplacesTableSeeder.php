<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class VacplacesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vacplace = new \App\Models\Vacplace;
        $vacplace->fedstate = "Wien";
        $vacplace->zip = "1120";
        $vacplace->city = "Wien";
        $vacplace->adress = "Sommerstrasse 3";
        $vacplace->save();

        $vacplace1 = new \App\Models\Vacplace;
        $vacplace1->fedstate = "Burgenland";
        $vacplace1->zip = "4530";
        $vacplace1->city = "Eisenstadt";
        $vacplace1->adress = "Winterstrasse 3";
        $vacplace1->save();

        $vacplace2 = new \App\Models\Vacplace;
        $vacplace2->fedstate = "Tirol";
        $vacplace2->zip = "4530";
        $vacplace2->city = "Innsbruck";
        $vacplace2->adress = "Winterstrasse 3";
        $vacplace2->save();
    }
}
