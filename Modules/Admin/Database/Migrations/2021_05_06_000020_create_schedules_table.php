<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('year_id')->index();
            $table->foreign('year_id')->references('id')->on('years')
                ->onDelete('cascade');

            $table->unsignedBigInteger('stage_id')->index();
            $table->foreign('stage_id')->references('id')->on('stages')
                ->onDelete('cascade');

            $table->unsignedBigInteger('sala_id')->index();
            $table->foreign('sala_id')->references('id')->on('salas')
                ->onDelete('cascade');

            $table->string('code')->unique();
            $table->string('title');
            $table->string('url');
            $table->time('time_initial');
            $table->time('time_final');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedules');
    }
}
