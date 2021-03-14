<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->softDeletes();
            $table->timestamps();
            $table->dateTime('start_at');
            $table->dateTime('finish_at');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('variable_id');
        });
        Schema::table('reports', function(Blueprint $table) {
            $table->foreign('variable_id')->references('id')->on('variables')->onDelete('cascade');;
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reports');
    }
}
