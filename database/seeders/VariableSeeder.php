<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VariableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('variables')->insert([
            'id' => 1,
            'name' => 'Wind Speed',
            'table_name' => 'wind_speeds',
            'created_at' => Carbon::now()->toDateTimeString(),
        ]);
        DB::table('variables')->insert([
            'id' => 2,
            'name' => 'Battery Voltage',
            'table_name' => 'battery_voltages',
            'created_at' => Carbon::now()->toDateTimeString(),
        ]);
        DB::table('variables')->insert([
            'id' => 3,
            'name' => 'Power Generated',
            'table_name' => 'power_generateds',
            'created_at' => Carbon::now()->toDateTimeString(),
        ]);
        DB::table('variables')->insert([
            'id' => 4,
            'name' => 'Acumulated Energy',
            'table_name' => 'acumulated_energies',
            'created_at' => Carbon::now()->toDateTimeString(),
        ]);
        DB::table('variables')->insert([
            'id' => 5,
            'name' => 'Wind Direction',
            'table_name' => 'wind_directions',
            'created_at' => Carbon::now()->toDateTimeString(),
        ]);
    }
}
