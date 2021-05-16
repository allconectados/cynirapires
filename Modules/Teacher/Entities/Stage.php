<?php

namespace Modules\Teacher\Entities;

use Illuminate\Database\Eloquent\Model;

class Stage extends Model
{
    protected $table = 'stages';

    protected $dates = ['created_at', 'updated_at'];

    protected $guarded = [];

    protected $casts = [
        'id' => 'int',
    ];

    protected $fillable = [
        'year_id',
        'title',
        'url'
    ];

    public function year()
    {
        return $this->belongsTo(Year::class)->orderBy('title', 'asc');
    }

    public function series()
    {
        return $this->hasMany(Serie::class, 'stage_id', 'id')
            ->orderBy('title', 'asc');
    }

    public function rooms()
    {
        return $this->hasMany(Room::class, 'stage_id', 'id')
            ->orderBy('title', 'asc');
    }

    public function disciplines()
    {
        return $this->hasMany(Discipline::class, 'stage_id', 'id')
            ->orderBy('title', 'asc');
    }
}
