<?php

namespace Modules\Coordination\Entities;

use Illuminate\Database\Eloquent\Model;

class ConselhoPrimeiroBimestre extends Model
{
    protected $table = 'notas_primeiro_bimestres';

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
        'teacher',
        'discipline',
        'room',
        'number',
        'name',
        'nota',
        'falta',
        'faltas_compensadas',
        'total_de_faltas',
    ];
}
