<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WindSpeedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($count = 0 ; $count < 15; $count++){
            DB::table('wind_speeds')->insert([
                'max' => 10*$count,
                'min' => 10*$count - 5,
                'average' => (10*$count - 10*$count-5)/2,
                'standard' => 30+$count,
                'created_at'=> Carbon::now()->toDateTimeString(),
                'status' => 1,
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);
        }
      
    }
}
