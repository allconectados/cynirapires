<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;

class Coordination extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ano',
        'code',
        'name',
        'cargo',
        'email',
    ];
}
