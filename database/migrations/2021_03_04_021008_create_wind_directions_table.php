<?php

use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateWindDirectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wind_directions', function (Blueprint $table) {
            $table->id();
            $table->double('max');
            $table->double('min');
            $table->double('average');
            $table->double('standard');
            $table->double('status');
            $table->softDeletes();
            $table->timestamps();
        });
        DB::table('wind_directions')->insert([
            ['id' => 1,'max' => 10,'min' => 5,'average' => 7.5,'standard'=>0,'status' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 2,'max' => 20,'min' => 15,'average' => 17.5,'standard'=>0,'status' => 2,'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 3,'max' => 30,'min' => 25,'average' => 27.5,'standard'=>0,'status' => 3,'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 4,'max' => 40,'min' => 35,'average' => 37.5,'standard'=>0,'status' =>0,'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]
            ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wind_directions');
    }
}
