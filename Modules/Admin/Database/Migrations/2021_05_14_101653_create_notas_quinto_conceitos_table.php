<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotasQuintoConceitosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notas_quinto_conceitos', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique()->nullable();
            $table->string('ano')->nullable();
            $table->string('stage')->nullable();
            $table->string('serie')->nullable();
            $table->string('teacher')->nullable();
            $table->string('discipline')->nullable();
            $table->string('room')->nullable();
            $table->string('number')->nullable();
            $table->string('name')->nullable();
            $table->string('nota_primeiro_bimestre')->nullable();
            $table->string('faltas_primeiro_bimestre')->nullable();
            $table->string('nota_segundo_bimestre')->nullable();
            $table->string('faltas_segundo_bimestre')->nullable();
            $table->string('nota_terceiro_bimestre')->nullable();
            $table->string('faltas_terceiro_bimestre')->nullable();
            $table->string('nota_quarto_bimestre')->nullable();
            $table->string('faltas_quarto_bimestre')->nullable();
            $table->string('nota_quinto_conceito')->nullable();

            $table->string('total_de_notas')->nullable();

            $table->string('total_de_faltas')->nullable();

            $table->boolean('status')->default(0);

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
        Schema::dropIfExists('notas_quinto_conceitos');
    }
}
