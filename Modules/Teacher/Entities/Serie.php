<?php

namespace Modules\Teacher\Entities;

use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    protected $table = 'series';

    protected $dates = ['created_at', 'updated_at'];

    protected $guarded = [];

    protected $casts = [
        'id' => 'int',
    ];

    protected $fillable = [
        'year_id',
        'stage_id',
        'title',
        'url',
    ];

    public function year()
    {
        return $this->belongsTo(Year::class)->orderBy('title', 'asc');
    }

    public function stage()
    {
        return $this->belongsTo(Stage::class)->orderBy('title', 'asc');
    }

    public function rooms()
    {
        return $this->hasMany(Room::class, 'serie_id', 'id')
            ->orderBy('title', 'asc');
    }

    public function disciplines()
    {
        return $this->hasMany(Discipline::class, 'serie_id', 'id')
            ->orderBy('title', 'asc');
    }
}
