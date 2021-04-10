<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Erico Rosiski Weber',
            'email' => 'ericoweber@hotmail.com',
            'password' => Hash::make('parati98'),
            'admin' => true,
            'created_at' => Carbon::now()->toDateTimeString(),
        ]);
        DB::table('users')->insert([
            'name' => 'Usuario teste',
            'email' => 'teste@teste.com.br',
            'password' => Hash::make('teste'),
            'admin' => false,
            'created_at' => Carbon::now()->toDateTimeString(),
        ]);
    }
}
