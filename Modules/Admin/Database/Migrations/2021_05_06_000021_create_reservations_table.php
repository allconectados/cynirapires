<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
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

            $table->unsignedBigInteger('schedule_id')->index();
            $table->foreign('schedule_id')->references('id')->on('schedules')
                ->onDelete('cascade');

            $table->unsignedBigInteger('teacher_id')->index();
            $table->foreign('teacher_id')->references('id')->on('teachers')
                ->onDelete('cascade');

            $table->string('code')->unique();
            $table->string('title');
            $table->string('aula');
            $table->dateTime('start');
            $table->dateTime('end');
            $table->string('color');
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
        Schema::dropIfExists('reservations');
    }
}
