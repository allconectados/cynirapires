<?php

namespace Modules\Proatec\Entities;

use Illuminate\Database\Eloquent\Model;

class Proatec extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'is_super_admin',
        'code',
        'name',
        'cargo',
        'email',
    ];
}
