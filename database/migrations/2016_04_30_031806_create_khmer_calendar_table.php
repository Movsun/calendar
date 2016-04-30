<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKhmerCalendarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('khmer_calendars', function (Blueprint $table) {
            $table->increments('id');
            $table->date('international_date')->unique();
            $table->integer('khmer_year');
            $table->integer('khmer_months_id');
            $table->integer('khmer_day');
            $table->timestamps();
            $table->foreign('khmer_months_id')->references('id')->on('khmer_months');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('khmer_calendars');
    }
}
