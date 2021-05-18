<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotasQuintoConceitoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notas_quinto_conceito', function (Blueprint $table) {
            $table->id();
            $table->string('ano');
            $table->string('stage');
            $table->string('serie');
            $table->string('teacher');
            $table->string('discipline');
            $table->string('room');
            $table->string('number');
            $table->string('name');
            $table->string('nota_primeiro_bimestre')->nullable();
            $table->string('faltas_primeiro_bimestre')->nullable();
            $table->string('nota_segundo_bimestre')->nullable();
            $table->string('faltas_segundo_bimestre')->nullable();
            $table->string('nota_terceiro_bimestre')->nullable();
            $table->string('faltas_terceiro_bimestre')->nullable();
            $table->string('nota_quarto_bimestre')->nullable();
            $table->string('faltas_quarto_bimestre')->nullable();

            $table->string('nota_quinto_conceito')->nullable();

            $table->string('nota_participation_quinto_conceito')->nullable();

            $table->string('nota_final_quinto_conceito')->nullable();

            $table->string('faltas_compensadas_quinto_conceito')->nullable();

            $table->string('total_de_faltas_quinto_conceito')->nullable();

            $table->string('motivo_nota_participation')->nullable();

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
        Schema::dropIfExists('notas_quinto_conceito');
    }
}
