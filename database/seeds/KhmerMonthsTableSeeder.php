<?php

use Illuminate\Database\Seeder;

class KhmerMonthsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $khmerMonths = [
          'មិគសិរ', 'បុស្ស', 'មាឃ', 'ផល្គុន', 'ចេត្រ',
          'ពិសាខ', 'ជេស្ឋ', 'អាសាឌ្ឍ', 'ស្រាពណ៌', 'ភទ្របទ',
          'អសុជ្ស', 'កត្តិក', 'បឋមសាឌ្ឍ', 'ទុតិយាសាឌ្ឍ'
        ];

        foreach ($khmerMonths as $month) {
          DB::table('khmer_months')->insert([
            'name' => $month,
          ]);
        }
    }
}
