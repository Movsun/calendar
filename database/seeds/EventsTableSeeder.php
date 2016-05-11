<?php

use Illuminate\Database\Seeder;
use App\KhmerCalendar;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $events = [
        [
          'en_name' => 'International New Year Day',
          'kh_name' => 'ចូលឆ្នាំសាកល',
          'month' => 1,
          'day' => 1,
          'is_lunar' => false,
        ],
        [
          'en_name' => 'Victory over Genocide Day',
          'kh_name' => '៧ មករា',
          'month' => 1,
          'day' => 7,
          'is_lunar' => false,
        ],
        [
          'en_name' => 'Valentine Day',
          'kh_name' => 'បុណ សង្សា',
          'month' => 2,
          'day' => 14,
          'is_lunar' => false,
        ],
        [
          'en_name' => 'International Women Day',
          'kh_name' => 'សិទ្ធនារី',
          'month' => 3,
          'day' => 8,
          'is_lunar' => false,
        ],
        [
          'en_name' => 'International Labor Day',
          'kh_name' => 'ការងារ',
          'month' => 5,
          'day' => 1,
          'is_lunar' => false,
        ],
        [
          'en_name' => 'King\'s Birthday, Norodom Sihamoni',
          'kh_name' => '',
          'month' => 5,
          'day' => 13,
          'is_lunar' => false,
        ],
        [
          'en_name' => 'International Children Day',
          'kh_name' => '',
          'month' => 6,
          'day' => 1,
          'is_lunar' => false,
        ],
        [
          'en_name' => 'King\'s Mother Birthday, Norodom Monineath Sihanouk',
          'kh_name' => '',
          'month' => 6,
          'day' => 18,
          'is_lunar' => false,
        ],
        [
          'en_name' => 'Constitutional Day',
          'kh_name' => '',
          'month' => 9,
          'day' => 24,
          'is_lunar' => false,
        ],
        [
          'en_name' => 'Commemoration Day of King\'s Father, Norodom Sihanouk',
          'kh_name' => '',
          'month' => 10,
          'day' => 15,
          'is_lunar' => false,
        ],
        [
          'en_name' => 'Paris Peace Agreements Day',
          'kh_name' => '',
          'month' => 10,
          'day' => 23,
          'is_lunar' => false,
        ],
        [
          'en_name' => 'King\'s Coronation Day, Norodom Sihamoni',
          'kh_name' => '',
          'month' => 10,
          'day' => 29,
          'is_lunar' => false,
        ],
        [
          'en_name' => 'Independent Day',
          'kh_name' => '',
          'month' => 11,
          'day' => 9,
          'is_lunar' => false,
        ],
        [
          'en_name' => 'Human Right Day',
          'kh_name' => '',
          'month' => 12,
          'day' => 10,
          'is_lunar' => false,
        ],
        [
          'en_name' => 'Mea BoChea',
          'kh_name' => 'មាឃ បូជា',
          'month' => 3,
          'day' => 15,
          'is_lunar' => true,
        ],
        [
          'en_name' => 'Pisa BoChea',
          'kh_name' => 'ពិសាខ បូជា',
          'month' => 6,
          'day' => 15,
          'is_lunar' => true,
        ],
      ];

      App\Event::insert($events);

        // $adData = [
        //   [
        //     'event_id' => '1',
        //     'month' => 1,
        //     'day' => 1,
        //   ],
        //   [
        //     'event_id' => '2',
        //     'month' => 1,
        //     'day' => 7,
        //   ],
        //   [
        //     'event_id' => '3',
        //     'month' => 2,
        //     'day' => 14,
        //   ],
        //   [
        //     'event_id' => '4',
        //     'month' => 3,
        //     'day' => 8,
        //   ],
        //   [
        //     'event_id' => '5',
        //     'month' => 5,
        //     'day' => 1,
        //   ],
        //   [
        //     'event_id' => '6',
        //     'month' => 5,
        //     'day' => 13,
        //   ],
        //   [
        //     'event_id' => '7',
        //     'month' => 6,
        //     'day' => 1,
        //   ],
        //   [
        //     'event_id' => '8',
        //     'month' => 6,
        //     'day' => 18,
        //   ],
        //   [
        //     'event_id' => '9',
        //     'month' => 9,
        //     'day' => 24,
        //   ],
        //   [
        //     'event_id' => '10',
        //     'month' => 10,
        //     'day' => 15,
        //   ],
        //   [
        //     'event_id' => '11',
        //     'month' => 10,
        //     'day' => 23,
        //   ],
        //   [
        //     'event_id' => '12',
        //     'month' => 10,
        //     'day' => 29,
        //   ],
        //   [
        //   'event_id' => '13',
        //     'month' => 11,
        //     'day' => 9,
        //   ],
        //   [
        //     'event_id' => '14',
        //     'month' => 12,
        //     'day' => 10,
        //   ],
        // ];
        //
        // App\AdDateEvent::insert($adData);


        // $khData = [
        //   [
        //     'event_id' => '15',
        //     'month' => 3,
        //     'day' => 15,
        //   ],
        //   [
        //     'event_id' => '16',
        //     'month' => 6,
        //     'day' => 15,
        //   ],
        // ];
        //
        // App\KhDateEvent::insert($khData);
    }
}
