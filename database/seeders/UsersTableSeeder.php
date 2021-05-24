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
        $user->gender = "2";
        $user->firstname = "Susi";
        $user->lastname = "Maier";
        $user->birthday = "1998-10-05";
        $user->svnr = "7985 051098";
        $user->email = "susi@maier.at";
        $user->phone = "+43 660 7894561";
        $user->save();

        $user1 = new \App\Models\User;
        $user1->gender = "1";
        $user1->firstname = "Max";
        $user1->lastname = "Zimmer";
        $user1->birthday = "1958-03-18";
        $user1->svnr = "7932 180358";
        $user1->email = "max@zimmer.at";
        $user1->phone = "+43 660 4336862";
        $user1->save();

        $user2 = new \App\Models\User;
        $user2->gender = "0";
        $user2->firstname = "Alex";
        $user2->lastname = "Schmidt";
        $user2->birthday = "2001-07-13";
        $user2->svnr = "5411 130701";
        $user2->email = "alex@schmidt.at";
        $user2->phone = "+43 664 3156843";
        $user2->save();
    }
}
