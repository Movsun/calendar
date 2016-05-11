<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(KhmerYearsTableSeeder::class);
        $this->call(KhmerMonthsTableSeeder::class);
        $this->call(khmerCalendarsTableSeeder::class);
        $this->call(EventsTableSeeder::class);
        $this->call(EventKhmerCalendarsTableSeeder::class);
    }
}
