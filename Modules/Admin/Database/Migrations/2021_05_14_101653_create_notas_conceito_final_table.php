<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotasConceitoFinalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notas_conceito_final', function (Blueprint $table) {
            $table->id();
            $table->string('ano');
            $table->string('stage');
            $table->string('serie');
            $table->string('teacher');
            $table->string('discipline');
            $table->string('room');
            $table->string('number');
            $table->string('name');
            $table->string('nota')->nullable();

            $table->char('nota_participation', 10)->nullable();

            $table->char('nota_final', 10)->nullable();

            $table->char('faltas_compensadas', 10)->nullable();

            $table->char('total_de_faltas', 10)->nullable();

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
        Schema::dropIfExists('notas_conceito_final');
    }
}
