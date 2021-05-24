<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFaltasConselhoStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faltas_conselho_students', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique()->nullable();
            $table->string('ano')->nullable();
            $table->string('stage')->nullable();
            $table->string('serie')->nullable();
            $table->string('room')->nullable();
            $table->string('number')->nullable();
            $table->string('name')->nullable();
            $table->string('total_falta_primeiro_bimestre')->nullable();
            $table->string('total_falta_segundo_bimestre')->nullable();
            $table->string('total_falta_terceiro_bimestre')->nullable();
            $table->string('total_falta_quarto_bimestre')->nullable();
            $table->string('total_falta_bimestres')->nullable();
            $table->string('total_falta_compensadas_ano')->nullable();
            $table->string('total_falta_ano')->nullable();
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
        Schema::dropIfExists('faltas_conselho_students');
    }
}
