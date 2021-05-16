<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;

class Year extends Model
{
    protected $table = 'years';

    protected $dates = ['created_at', 'updated_at'];

    protected $guarded = [];

    protected $casts = [
        'id' => 'int',
    ];

    protected $fillable = [
        'title',
        'url',
    ];

    public function stages()
    {
        return $this->hasMany(Stage::class, 'year_id', 'id')
            ->orderBy('title', 'asc');
    }

    public function series()
    {
        return $this->hasMany(Serie::class, 'year_id', 'id')
            ->orderBy('title', 'asc');
    }

    public function rooms()
    {
        return $this->hasMany(Room::class, 'year_id', 'id')
            ->orderBy('title', 'asc');
    }

    public function disciplines()
    {
        return $this->hasMany(Discipline::class, 'year_id', 'id')
            ->orderBy('title', 'asc');
    }
}
