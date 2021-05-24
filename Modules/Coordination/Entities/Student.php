<?php

namespace Modules\Coordination\Entities;


use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'active',
        'number',
        'room',
        'name',
        'username',
        'ra',
        'ra_digit',
        'email',
        'date_of_birth',
        'status',
        'code'
    ];
}
