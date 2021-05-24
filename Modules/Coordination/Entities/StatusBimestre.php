<?php

namespace Modules\Coordination\Entities;

use Illuminate\Database\Eloquent\Model;

class StatusBimestre extends Model
{
    protected $table = 'status_bimestres';

    protected $dates = ['created_at', 'updated_at'];

    protected $guarded = [];

    protected $casts = [
        'id' => 'int',
    ];

    protected $fillable = [
        'status_primeiro_bimestre',
        'status_segundo_bimestre',
        'status_terceiro_bimestre',
        'status_quarto_bimestre',
        'status_quinto_conceito',
    ];
}
