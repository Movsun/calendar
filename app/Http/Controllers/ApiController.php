<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Carbon\Carbon;
use App\KhmerCalendar;
use Response;

class ApiController extends Controller
{
      public function show($year, $month){

        $from = Carbon::create($year, $month, 1)->startOfWeek()->addDay(-1);
        $to = Carbon::create($year, $month, 1)->startOfWeek()->addDay(-1)->addDay(41);
        $data = KhmerCalendar::whereBetween('date', [$from, $to])->get();



        return Response::json(array(
                  'error' => false,
                  'data' => $data,
                  'status_code' => 200
              ));
      }

      public function yearly($year){
        $from = Carbon::create($year, 1, 1);
        $to = Carbon::create($year, 1, 1)->addYear();
        $data = KhmerCalendar::whereBetween('date', [$from, $to])->get();



        return Response::json(array(
                  'error' => false,
                  'data' => $data,
                  'status_code' => 200
              ));
      }
}
