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
        $vacplace->fedstate = "Niederösterreich";
        $vacplace->zip = "2331";
        $vacplace->city = "Vösendorf";
        $vacplace->adress = "Sommerstrasse 3";
        $vacplace->save();

        $vacplace1 = new \App\Models\Vacplace;
        $vacplace1->fedstate = "Niederösterreich";
        $vacplace1->zip = "2130";
        $vacplace1->city = "Mistelbach";
        $vacplace1->adress = "Winterstrasse 3";
        $vacplace1->save();

        $vacplace2 = new \App\Models\Vacplace;
        $vacplace2->fedstate = "Niederösterreich";
        $vacplace2->zip = "2380";
        $vacplace2->city = "Perchtoldsdorf";
        $vacplace2->adress = "Winterstrasse 3";
        $vacplace2->save();

        $vacplace3 = new \App\Models\Vacplace;
        $vacplace3->fedstate = "Niederösterreich";
        $vacplace3->zip = "2340";
        $vacplace3->city = "Mödling";
        $vacplace3->adress = "Pizzastrasse 17b";
        $vacplace3->save();
    }
}
