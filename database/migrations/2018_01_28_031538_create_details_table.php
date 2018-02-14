<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('details', function (Blueprint $table) {
           $table->increments('id');
           $table->unsignedInteger('user_id');
           $table->string('username')->unique();
           $table->date('dob');
           $table->string('gender');
           $table->unsignedInteger('state_id');
           $table->unsignedInteger('city_id');
           $table->timestamps();

           $table->foreign('user_id')->references('id')->on('users')
               ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('details');
    }
}
