<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFactFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fact_fields', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fact_id');
            $table->string('title_ar');
            $table->string('title_en');
            $table->integer('number');
            $table->string('icon');
            $table->timestamps();

            $table->foreign('fact_id')->references('id')->on('facts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fact_fields');
    }
}
