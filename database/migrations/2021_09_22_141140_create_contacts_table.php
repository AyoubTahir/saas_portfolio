<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('title_ar');
            $table->string('title_en');
            $table->string('desc_ar');
            $table->string('desc_en');
            $table->string('email')->nullable();
            $table->string('email_desc_ar')->nullable();
            $table->string('email_desc_en')->nullable();
            $table->string('phone')->nullable();
            $table->string('phone_desc_ar')->nullable();
            $table->string('phone_desc_en')->nullable();
            $table->string('address_ar')->nullable();
            $table->string('address_en')->nullable();
            $table->text('address_link')->nullable();
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
        Schema::dropIfExists('contacts');
    }
}
