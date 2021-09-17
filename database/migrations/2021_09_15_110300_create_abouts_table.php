<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('full_name_ar');
            $table->string('full_name_en');
            $table->string('sub_title_ar');
            $table->string('sub_title_en');
            $table->string('job_ar');
            $table->string('job_en');
            $table->text('description_ar');
            $table->text('description_en');
            $table->string('button_ar');
            $table->string('button_en');
            $table->string('signature')->nullable();
            $table->string('image');
            $table->boolean('status');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('abouts');
    }
}
