<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
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

            $table->string('code')->unique();
            $table->char('title', 100);
            $table->string('url')->unique();
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
        Schema::dropIfExists('rooms');
    }
}
