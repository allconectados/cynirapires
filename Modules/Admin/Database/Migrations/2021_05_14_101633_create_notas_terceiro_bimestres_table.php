<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotasTerceiroBimestresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notas_terceiro_bimestres', function (Blueprint $table) {
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
            $table->string('nota_participation')->nullable();
            $table->string('nota_final')->nullable();
            $table->string('falta')->nullable();
            $table->string('faltas_compensadas')->nullable();
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
        Schema::dropIfExists('notas_terceiro_bimestres');
    }
}
