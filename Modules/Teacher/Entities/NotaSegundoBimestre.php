<?php

namespace Modules\Teacher\Entities;

use Illuminate\Database\Eloquent\Model;

class NotaSegundoBimestre extends Model
{
    protected $table = 'notas_segundo_bimestres';

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
        'nota',
        'nota_participation',
        'nota_final',
        'falta',
        'faltas_compensadas',
        'total_de_faltas',
    ];
}
