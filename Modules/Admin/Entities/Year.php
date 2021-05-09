<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Year extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'url',
        'code',
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

    public function salas()
    {
        return $this->hasMany(Sala::class, 'year_id', 'id')
            ->orderBy('title', 'asc');
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class, 'year_id', 'id')
            ->orderBy('title', 'asc');
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class, 'year_id', 'id')
            ->orderBy('title', 'asc');
    }

    public function periods()
    {
        return $this->hasMany(Period::class, 'year_id', 'id')
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
