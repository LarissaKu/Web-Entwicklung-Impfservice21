<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVacdatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacdates', function (Blueprint $table) {
            $table->id();
            $table->date('vacday');
            $table->string('start');
            $table->string('end');
            $table->integer('maxpersons')->default(3);
            $table->string('vaccine')->default('Pfizer');
            $table->bigInteger('vacplace')->unsigned();
            $table->foreign('vacplace')->references('id')->on('vacplaces')->onDelete('cascade');
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
        Schema::dropIfExists('vacdates');
    }
}
