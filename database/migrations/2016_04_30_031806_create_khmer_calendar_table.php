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
            $table->date('date')->unique();
            $table->integer('khmer_year');
            $table->integer('khmer_months_id');
            $table->integer('khmer_day');
            $table->integer('khmer_years_id');
            $table->boolean('is_a_holy_day')->default(false);
            $table->timestamps();
            $table->foreign('khmer_months_id')->references('id')->on('khmer_months')->onDelete('restrict');
            $table->foreign('khmer_years_id')->references('id')->on('khmer_years')->onDelete('restrict');


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
