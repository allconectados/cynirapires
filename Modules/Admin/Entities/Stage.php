<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stage extends Model
{
    use HasFactory;

    protected $table = 'stages';
    protected $primaryKey = 'id';
    public $incrementing = false;

    protected $fillable = [
        'year_id',
        'title',
        'url'
    ];

    public function year()
    {
        return $this->belongsTo(Year::class)->orderBy('title', 'asc');
    }

    public function salas()
    {
        return $this->hasMany(Sala::class, 'stage_id', 'id')
            ->orderBy('title', 'asc');
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class, 'stage_id', 'id')
            ->orderBy('title', 'asc');
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class, 'stage_id', 'id')
            ->orderBy('title', 'asc');
    }

    public function series()
    {
        return $this->hasMany(Serie::class, 'stage_id', 'id')
            ->orderBy('title', 'asc');
    }

    public function periods()
    {
        return $this->hasMany(Period::class, 'stage_id', 'id')
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

    public function informes()
    {
        return $this->hasMany(Informe::class, 'stage_id', 'id')
            ->orderBy('created_at', 'desc');
    }

    public function atividades()
    {
        return $this->hasMany(Atividade::class, 'stage_id', 'id')
            ->orderBy('date', 'desc');
    }
}
