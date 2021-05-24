<?php

namespace Modules\Coordination\Entities;

use Illuminate\Database\Eloquent\Model;

class FaltasConselhoStudent extends Model
{
    protected $table = 'faltas_conselho_students';

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
        'room',
        'number',
        'name',
        'total_falta_primeiro_bimestre',
        'total_falta_segundo_bimestre',
        'total_falta_terceiro_bimestre',
        'total_falta_quarto_bimestre',
        'total_falta_bimestres',
        'total_falta_compensadas_ano',
        'total_falta_ano',
    ];
}
