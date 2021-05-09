<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'is_super_admin',
        'ano',
        'code',
        'name',
        'cargo',
        'email',
    ];
}
