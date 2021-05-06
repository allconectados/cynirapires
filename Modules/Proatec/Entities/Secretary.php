<?php

namespace Modules\Proatec\Entities;

use Illuminate\Database\Eloquent\Model;

class Secretary extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code',
        'name',
        'email',
    ];
}
