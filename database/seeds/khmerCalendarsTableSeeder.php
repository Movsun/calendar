<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class khmerCalendarsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $startDate = Carbon::create(1900, 1, 1);
        $currentDate = $startDate;
        $endDate = Carbon::create(3000, 1, 1);
        $khmerYear = 2443;
        $khmerMonth = 1;
        $khmerDay = 1;
        $isAHolyDay = false;
        $isLeapDay = false;
        $isLeapMonth = true;
        $khmerYearId = 12;
        $dayInMonth = [
          29, 30, 29, 30, 29, 30, 29, 30, 29, 30, 29, 30, 30, 30
        ];
        $maxDay = $dayInMonth[$khmerMonth];



        while ($currentDate < $endDate) {

          DB::table('khmer_calendars')->insert([
            'date' => $currentDate,
            'khmer_year' => $khmerYear,
            'khmer_months_id' => $khmerMonth+1,
            'khmer_day' => $khmerDay,
            'khmer_years_id' => $khmerYearId,
            'is_a_holy_day' => $isAHolyDay,
          ]);

          $currentDate = $currentDate->addDay();

          // khmer year change after new year
          if ($currentDate->day == 17 && $currentDate->month == 4 ) {
            $khmerYear += 1;
            $isLeapDay = $this->isLeapDay($khmerYear);
            $isLeapMonth = $this->isLeapMonth($khmerYear);
          }

          $khmerDay +=1;
          if ($khmerDay > $maxDay) {
            $khmerDay = 1;
            $khmerMonth += 1;
            $khmerYearId += 1;

            if ($khmerYearId == 13) {
              $khmerYearId = 1;
            }

            if ($khmerMonth == 12) {
              $khmerMonth = 0;
            }

            if ($khmerMonth == 14) {
              $khmerMonth = 8;
            }

            if ($khmerMonth == 7 && $isLeapMonth) {
              $khmerMonth = 12;
            }

            if ($khmerMonth == 6 && $isLeapDay) {
              $maxDay = 30;
            } else {
              $maxDay = $dayInMonth[$khmerMonth];
            }
          }

          if ($khmerDay == 8 || $khmerDay == 15 || $khmerDay == 23 || $khmerDay == $maxDay) {
            $isAHolyDay = true;
          } else {
            $isAHolyDay = false;
          }

        }
    }


    // return boolean
    public function khmerSolarLeap($be_year){
        $aharkun_mod = ($be_year * 292207 + 499) % 800;
        $kromthupul = 800 - $aharkun_mod;
        return $kromthupul <= 207;
    }

    public function ahakhun($be_year){
        return floor(($be_year * 292207 + 499) / 800) + 4;
    }

    public function avoman($be_year){
        return ($this->ahakhun($be_year) * 11 + 25) % 692;
    }

    public function bodithey($be_year){
        $a = $this->ahakhun($be_year);
        $temp = floor(($a * 11 + 25) / 692);
        return  ($temp + $a + 29) % 30;
    }

    public function isLeapMonth($be_year){
        if ($this->bodithey($be_year) > 24 || $this->bodithey($be_year) < 6){
            if ($this->bodithey($be_year) == 25 && $this->bodithey($be_year+1) == 5){
                return false;
            } else {
                return true;
            }
        } else {
            if ($this->bodithey($be_year) == 24 && $this->bodithey($be_year+1) == 6){
                return true;
            } else {
                return false;
            }
        }
    }

    public function calculateLeapDay($be_year){
        if ($this->khmerSolarLeap($be_year)){
            if ($this->avoman($be_year) < 127){
                return true;
            } else {
              return false;
            }
        } else {
            if ($this->avoman($be_year) < 138){
                if ($this->avoman($be_year) == 137 && $this->avoman($be_year + 1) == 0){
                    return false;
                } else {
                    return true;
                }
            } else {
                return false;
            }
        }
    }

    public function isLeapDay($be_year){
      if ($this->isLeapMonth($be_year)) {
        return false;
      } else if ($this->isLeapMonth($be_year -1) && $this->calculateLeapDay($be_year-1)) {
        return true;
      } else {
        return $this->calculateLeapDay($be_year);
      }
    }

}
