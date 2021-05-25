<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotasConselhosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notas_conselhos', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique()->nullable();
            $table->string('ano')->nullable();
            $table->string('stage')->nullable();
            $table->string('serie')->nullable();
            $table->string('discipline')->nullable();
            $table->string('room')->nullable();
            $table->string('number')->nullable();
            $table->string('name')->nullable();
            $table->string('teacher')->nullable();

            $table->string('nota_conselho_primeiro_bimestre')->nullable();
            $table->string('nota_conselho_aulas_previstas_primeiro_bimestre')->nullable();
            $table->string('nota_conselho_aulas_dadas_primeiro_bimestre')->nullable();
            $table->string('faltas_conselho_primeiro_bimestre')->nullable();

            $table->string('nota_conselho_segundo_bimestre')->nullable();
            $table->string('nota_conselho_aulas_previstas_segundo_bimestre')->nullable();
            $table->string('nota_conselho_aulas_dadas_segundo_bimestre')->nullable();
            $table->string('faltas_conselho_segundo_bimestre')->nullable();

            $table->string('nota_conselho_terceiro_bimestre')->nullable();
            $table->string('nota_conselho_aulas_previstas_terceiro_bimestre')->nullable();
            $table->string('nota_conselho_aulas_dadas_terceiro_bimestre')->nullable();
            $table->string('faltas_conselho_terceiro_bimestre')->nullable();

            $table->string('nota_conselho_quarto_bimestre')->nullable();
            $table->string('nota_conselho_aulas_previstas_quarto_bimestre')->nullable();
            $table->string('nota_conselho_aulas_dadas_quarto_bimestre')->nullable();
            $table->string('faltas_conselho_quarto_bimestre')->nullable();

            $table->string('nota_conselho_quinto_conceito')->nullable();
            $table->string('faltas_conselho_total_bimestres')->nullable();
            $table->string('faltas_conselho_compensadas')->nullable();
            $table->string('faltas_conselho_total')->nullable();
            $table->string('faltas_conselho_porcentagem_aulas_dadas')->nullable();

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
        Schema::dropIfExists('notas_conselhos');
    }
}
