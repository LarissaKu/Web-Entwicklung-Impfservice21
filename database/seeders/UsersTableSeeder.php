<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new \App\Models\User;
        $user->gender = "weiblich";
        $user->firstname = "Susi";
        $user->lastname = "Maier";
        $user->birthday = "1998-10-05";
        $user->svnr = "7985 051098";
        $user->email = "susi@maier.at";
        $user->phone = "+43 660 7894561";
        $user->fedstate = "Niederösterreich";
        $user->zip = "2580";
        $user->city = "Horn";
        $user->adress = "Wunderstrasse 16";
        $user->vaccinated = true;
        $user->registered = true;
        $user->password = bcrypt('susim');
        $user->admin = true;
        $user->save();

        $user1 = new \App\Models\User;
        $user1->gender = "männlich";
        $user1->firstname = "Max";
        $user1->lastname = "Zimmer";
        $user1->birthday = "1958-03-18";
        $user1->svnr = "7932 180358";
        $user1->email = "max@zimmer.at";
        $user1->phone = "+43 660 4336862";
        $user1->fedstate = "Niederösterreich";
        $user1->zip = "2610";
        $user1->city = "St. Pölten";
        $user1->adress = "Gerichtsstrasse 16";
        $user1->vaccinated = false;
        $user1->registered = false;
        $user1->password = bcrypt('maxz');
        $user1->admin = false;
        $user1->save();

        $user2 = new \App\Models\User;
        $user2->gender = "weiblich";
        $user2->firstname = "Alex";
        $user2->lastname = "Schmidt";
        $user2->birthday = "2001-07-13";
        $user2->svnr = "5411 130701";
        $user2->email = "alex@schmidt.at";
        $user2->phone = "+43 664 3156843";
        $user2->fedstate = "Niederösterreich";
        $user2->zip = "2380";
        $user2->city = "Perchtoldsdorf";
        $user2->adress = "Wienerstrasse 25/b";
        $user2->vaccinated = false;
        $user2->registered = true;
        $user2->password = bcrypt('alexs');
        $user2->admin = false;
        $user2->save();

        $user3 = new \App\Models\User;
        $user3->gender = "männlich";
        $user3->firstname = "Hans";
        $user3->lastname = "Holzberger";
        $user3->birthday = "1994-08-15";
        $user3->svnr = "9782 150894";
        $user3->email = "hans@holzberger.at";
        $user3->phone = "+43 650 4622645";
        $user3->fedstate = "Niederösterreich";
        $user3->zip = "2340";
        $user3->city = "Mödling";
        $user3->adress = "Bachgasse 32";
        $user3->vaccinated = true;
        $user3->registered = true;
        $user3->password = bcrypt('hansh');
        $user3->admin = true;
        $user3->save();


        $user4 = new \App\Models\User;
        $user4->gender = "weiblich";
        $user4->firstname = "Eva";
        $user4->lastname = "Lo";
        $user4->birthday = "1987-03-12";
        $user4->svnr = "7382 120387";
        $user4->email = "eva@lo.at";
        $user4->phone = "+43 650 4224418";
        $user4->fedstate = "Niederösterreich";
        $user4->zip = "2201";
        $user4->city = "Amstetten";
        $user4->adress = "Uferweg 32";
        $user4->vaccinated = false;
        $user4->registered = false;
        $user4->password = bcrypt('eval');
        $user4->admin = false;
        $user4->save();
    }
}
