<?php

namespace Modules\Teacher\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    use HasFactory;

    protected $table = 'series';
    protected $primaryKey = 'id';
    public $incrementing = false;

    protected $fillable = [
        'year_id',
        'stage_id',
        'title',
        'url'
    ];

    public function year()
    {
        return $this->belongsTo(Year::class)->orderBy('title', 'asc');
    }

    public function stage()
    {
        return $this->belongsTo(Stage::class)->orderBy('title', 'asc');
    }

    public function periods()
    {
        return $this->hasMany(Period::class, 'serie_id', 'id')
            ->orderBy('title', 'asc');
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

    public function atividades()
    {
        return $this->hasMany(Atividade::class, 'serie_id', 'id')
            ->orderBy('date', 'desc');
    }
}
