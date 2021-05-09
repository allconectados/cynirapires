<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDisciplinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disciplines', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('year_id');
            $table->foreign('year_id')->references('id')->on('years')
                ->onDelete('cascade');

            $table->unsignedBigInteger('stage_id');
            $table->foreign('stage_id')->references('id')->on('stages')
                ->onDelete('cascade');

            $table->unsignedBigInteger('serie_id');
            $table->foreign('serie_id')->references('id')->on('series')
                ->onDelete('cascade');

            $table->unsignedBigInteger('room_id');
            $table->foreign('room_id')->references('id')->on('rooms')
                ->onDelete('cascade');

            $table->unsignedBigInteger('teacher_id')->nullable();
            $table->foreign('teacher_id')->references('id')->on('teachers')
                ->onDelete('cascade');

            $table->string('code')->unique();
            $table->string('title');
            $table->string('url');
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
        Schema::dropIfExists('disciplines');
    }
}
