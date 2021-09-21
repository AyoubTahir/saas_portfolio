<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {

            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('website_name_ar');
            $table->string('website_name_en');
            $table->string('footer_desc_ar');
            $table->string('footer_desc_en');
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('twiter')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('light_logo_ar');
            $table->string('light_logo_en');
            $table->string('dark_logo_ar');
            $table->string('dark_logo_en');
            $table->string('theme_mode');
            $table->string('website_status');
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
        Schema::dropIfExists('settings');
    }
}
