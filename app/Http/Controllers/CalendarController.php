<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\KhmerCalendar;
use DB;
use Carbon\Carbon;
use App\Event;

class CalendarController extends Controller
{
    public function show($year, $month){
      $dow = [
        'Sunday', 'Monday', 'Tueday', 'Wednesday', 'Thurday', 'Friday',
        'Saterday'
      ];
      $day = [];
      for ($i=0; $i<30; $i++){
        if ($i>14) {
          $day[$i] = ($i-14)." រោច";
        }else{
          $day[$i] = ($i+1)." កើត";
        }
      }

      $from = Carbon::create($year, $month, 1)->startOfWeek()->addDay(-1);
      $to = Carbon::create($year, $month, 1)->startOfWeek()->addDay(-1)->addDay(41);
      $khmerCalendars = KhmerCalendar::whereBetween('date', [$from, $to])->get();

      // dd($khmerCalendars);

      // $khmerCalendars = DB::table('khmer_calendars')->skip($offset*49)->take(49)->get();
      $khmerMonths = DB::table('khmer_months')->get();
      return view('calendar.index', compact('dow', 'khmerCalendars', 'khmerMonths', 'day'));
    }

    public function test(){
      // $dates = KhmerCalendar::all();
      // $events = Event::all();
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
    }

}
