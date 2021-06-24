<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('gender');
            $table->string('firstname');
            $table->string('lastname');
            $table->date('birthday');
            $table->string('svnr')->unique();
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('fedstate');
            $table->string('zip');
            $table->string('city');
            $table->string('adress');
            $table->timestamp('email_verified_at')->nullable();
            $table->boolean('vaccinated');
            $table->boolean('registered');
            $table->string('password');
            $table->boolean('admin');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
