<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images_user', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->integer('image_id')->unsigned();
            $table->timestamps();

            $table->primary(['user_id', 'image_id']);
        });

      //   Schema::table('images_user', function($table) {
      //      $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
      //      $table->foreign('image_id')->references('id')->on('images')->onDelete('cascade');
      //   });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('images_user');
    }
}
