<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KhmerCalendar extends Model
{
    protected $dates = [
      'date'
    ];

    protected $hidden = [
      'id', 'khmer_year','khmer_years_id', 'khmer_months_id', 'khmer_day', 'created_at', 'updated_at'
    ];

    protected $appends = [
      'kh_year', 'be_year','kh_month', 'kh_day', 'events'
    ];

    public function khmerYear(){
      return $this->belongsTo('App\KhmerYear', 'khmer_years_id');
    }

    public function khmerMonth(){
        return $this->belongsTo('App\KhmerMonth', 'khmer_months_id');
    }

    public function event(){
      return $this->belongsToMany('App\Event', 'event_khmer_calendar', 'khmer_calendars_id', 'events_id');
    }

    public function getEventsAttribute(){
      return $this->event()->select('en_name', 'kh_name')->get();
    }

    public function getBeYearAttribute(){
      return $this->khmer_year;
    }

    public function getKhYearAttribute(){
      return $this->khmerYear()->first()->name;
    }

    public function getKhMonthAttribute(){
      return $this->khmerMonth()->first()->name;
    }

    public function getKhDayAttribute(){
      $value = $this->khmer_day;
      if ($value > 15) {
        $x = $value - 15;
        return "{$x} រោច";
      } else {
        return "{$value} កើត";
      }
    }

    // public function getIsHolyDayAttribute(){
    //   $day = $this['khmer_day'];
    //   if ($day == 8 || $day == 15 || $day == 23) {
    //     return true;
    //   } elseif () {
    //     # code...
    //   }
    // }

}
