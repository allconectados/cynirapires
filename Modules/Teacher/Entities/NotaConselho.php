<?php

namespace Modules\Teacher\Entities;

use Illuminate\Database\Eloquent\Model;

class NotaConselho extends Model
{
    protected $table = 'notas_conselhos';

    protected $dates = ['created_at', 'updated_at'];

    protected $guarded = [];

    protected $casts = [
        'id' => 'int',
    ];

    protected $fillable = [
        'code',
        'ano',
        'stage',
        'serie',
        'discipline',
        'room',
        'number',
        'name',
        'teacher',

        'nota_conselho_primeiro_bimestre',
        'nota_conselho_aulas_previstas_primeiro_bimestre',
        'nota_conselho_aulas_dadas_primeiro_bimestre',
        'faltas_conselho_primeiro_bimestre',

        'nota_conselho_segundo_bimestre',
        'nota_conselho_aulas_previstas_segundo_bimestre',
        'nota_conselho_aulas_dadas_segundo_bimestre',
        'faltas_conselho_segundo_bimestre',

        'nota_conselho_terceiro_bimestre',
        'nota_conselho_aulas_previstas_terceiro_bimestre',
        'nota_conselho_aulas_dadas_terceiro_bimestre',
        'faltas_conselho_terceiro_bimestre',

        'nota_conselho_quarto_bimestre',
        'nota_conselho_aulas_previstas_quarto_bimestre',
        'nota_conselho_aulas_dadas_quarto_bimestre',
        'faltas_conselho_quarto_bimestre',

        'nota_conselho_quinto_conceito',
        'faltas_conselho_total_bimestres',
        'faltas_conselho_compensadas',
        'faltas_conselho_total',
        'faltas_conselho_porcentagem_aulas_dadas',
        'status',
    ];
}
