<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatusBimestresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('status_bimestres', function (Blueprint $table) {
            $table->id();
            $table->boolean('status_primeiro_bimestre')->default(0);
            $table->boolean('status_segundo_bimestre')->default(0);
            $table->boolean('status_terceiro_bimestre')->default(0);
            $table->boolean('status_quarto_bimestre')->default(0);
            $table->boolean('status_quinto_conceito')->default(0);
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
        Schema::dropIfExists('status_bimestres');
    }
}
