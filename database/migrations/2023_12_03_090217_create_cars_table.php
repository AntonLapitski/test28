<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->bigInteger('mark_id')->unsigned()->index()->nullable();
            $table->foreign('mark_id')->references('id')->on('car_marks')->onDelete('cascade');
            $table->bigInteger('model_id')->unsigned()->index()->nullable();
            $table->foreign('model_id')->references('id')->on('car_models')->onDelete('cascade');
            $table->integer('year');
            $table->integer('mileage');
            $table->string('color');
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
        Schema::table('cars', function(Blueprint $table)
        {
            $table->dropForeign('mark_id');
            $table->dropForeign('model_id');
        });
        Schema::dropIfExists('cars');
    }
}
