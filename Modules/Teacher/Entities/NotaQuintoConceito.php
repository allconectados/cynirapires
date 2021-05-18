<?php

namespace Modules\Teacher\Entities;

use Illuminate\Database\Eloquent\Model;

class NotaQuintoConceito extends Model
{
    protected $table = 'notas_quinto_conceito';

    protected $dates = ['created_at', 'updated_at'];

    protected $guarded = [];

    protected $casts = [
        'id' => 'int',
    ];

    protected $fillable = [
        'ano',
        'stage',
        'serie',
        'teacher',
        'discipline',
        'room',
        'number',
        'name',
        'nota_primeiro_bimestre',
        'faltas_primeiro_bimestre',
        'nota_segundo_bimestre',
        'faltas_segundo_bimestre',
        'nota_terceiro_bimestre',
        'faltas_terceiro_bimestre',
        'nota_quarto_bimestre',
        'faltas_quarto_bimestre',
        'nota_quinto_conceito',
        'nota_participation_quinto_conceito',
        'nota_final_quinto_conceito',
        'faltas_compensadas_quinto_conceito',
        'total_de_faltas_quinto_conceito',
        'motivo_nota_participation',
    ];
}
