<?php

use Illuminate\Database\Seeder;

class KhmerYearsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $years = [
          'ជូត',
          'ឆ្លូវ',
          'ខាល',
          'ថោះ',
          'រោង',
          'ម្សាញ់',
          'មមី',
          'មមែ',
          'វក',
          'រការ',
          'ច',
          'កុរ',
        ];

        foreach ($years as $year) {
          DB::table('khmer_years')->insert([
            'name' => $year,
          ]);
        }

    }
}
