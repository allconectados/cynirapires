<?php

namespace Modules\Coordination\Entities;

use Illuminate\Database\Eloquent\Model;

class NotaQuintoConceito extends Model
{
    protected $table = 'notas_quinto_conceitos';

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
        'total_de_notas',
        'total_de_faltas',
        'status',
    ];
}
