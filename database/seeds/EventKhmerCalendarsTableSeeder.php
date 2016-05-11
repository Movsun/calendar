<?php

use Illuminate\Database\Seeder;

class EventKhmerCalendarsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      $dates = App\KhmerCalendar::take(1000)->get();
      $events = App\Event::all();

      $n = 0;

      while(!$dates->isEmpty()){
        // $dates = App\KhmerCalendar::all();

        foreach ($dates as $d) {
          foreach ($events as $event) {
            if ($event->is_lunar) {
              if ($d->khmer_months_id == $event->month && $d->khmer_day == $event->day) {
                $d->event()->attach($event->id);
              }
            } else {
              $month = $d->date->month;
              $day = $d->date->day;
              if ($month == $event->month && $day == $event->day) {
                $d->event()->attach($event->id);
              }
            }
          }
        }

        $n += 1000;
        $dates = App\KhmerCalendar::take(1000)->skip($n)->get();
      }


      // $dates = App\KhmerCalendar::all();
      // $events = App\Event::all();
      //
      // foreach ($dates as $d) {
      //   foreach ($events as $event) {
      //     if ($event->is_lunar) {
      //       if ($d->khmer_months_id == $event->month && $d->khmer_day == $event->day) {
      //         $d->event()->attach($event->id);
      //       }
      //     } else {
      //       $month = $d->date->month;
      //       $day = $d->date->day;
      //       if ($month == $event->month && $day == $event->day) {
      //         $d->event()->attach($event->id);
      //       }
      //     }
      //   }
      // }





      // $dates = DB::table('khmer_calendars')->get();
      // $events = DB::table('events')->get();
      // foreach ($dates as $d) {
      //   foreach ($events as $event) {
      //     if ($event->is_lunar) {
      //       if ($d->khmer_months_id == $event->month && $d->khmer_day == $event->day) {
      //         // $d->event()->attach($event->id);
      //         DB::table('event_khmer_calendar')->insert([
      //             'khmer_calendars_id' => $d->id,
      //             'events_id' => $event->id,
      //           ]);
      //       }
      //     } else {
      //       $carbon = Carbon\Carbon::createFromFormat('Y-m-d', $d->date);
      //       $month = $carbon->month;
      //       $day = $carbon->day;
      //       if ($month == $event->month && $day == $event->day) {
      //         // $d->event()->attach($event->id);
      //         DB::table('event_khmer_calendar')->insert([
      //             'khmer_calendars_id' => $d->id,
      //             'events_id' => $event->id,
      //           ]);
      //       }
      //     }
      //   }
      // }

    }
}
