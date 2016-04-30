<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\KhmerCalendar;
use DB;

class CalendarController extends Controller
{
    public function show($offset){
      $dow = [
        'Monday', 'Tueday', 'Wednesday', 'Thurday', 'Friday',
        'Saterday', 'Sunday'
      ];
      $day = [];
      for ($i=0; $i<30; $i++){
        if ($i>14) {
          $day[$i] = ($i-14)." រោច";
        }else{
          $day[$i] = ($i+1)." កើត";
        }
      }

      $khmerCalendars = DB::table('khmer_calendars')->skip($offset*49)->take(49)->get();
      $khmerMonths = DB::table('khmer_months')->get();
      return view('calendar.index', compact('dow', 'khmerCalendars', 'khmerMonths', 'day'));
    }
}
