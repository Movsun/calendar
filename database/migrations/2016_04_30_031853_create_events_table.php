<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('event_khmer_calendar', function (Blueprint $table) {
            $table->integer('khmer_caledars_id');
            $table->integer('events_id');

            $table->foreign('khmer_caledars_id')->references('id')->on('khmer_calendars');
            $table->foreign('events_id')->references('id')->on('events');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('events');
        Schema::drop('event_khmer_calendar');
    }
}
