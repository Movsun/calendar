<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KhmerCalendar extends Model
{
    public function khmerMonth(){
      $this->belongsTo('App\KhmerMonth', 'khmer_months_id');
    }

    public function getKhmerDayAttribute($value){
      if ($value >15) {
        return ($value - 15)." រោច";
      } else {
        return $value." កើត";
      }
    }
}
