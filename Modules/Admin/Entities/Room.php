<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $table = 'rooms';
    protected $primaryKey = 'id';
    public $incrementing = false;

    protected $fillable = [
        'year_id',
        'stage_id',
        'serie_id',
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

    public function serie()
    {
        return $this->belongsTo(Serie::class)->orderBy('title', 'asc');
    }

    public function disciplines()
    {
        return $this->hasMany(Discipline::class, 'room_id', 'id');
    }

    public function atividades()
    {
        return $this->hasMany(Atividade::class, 'room_id', 'id')
            ->where('teacher_id', '=', auth()->guard('teacher')->user()->id)
            ->orderBy('date', 'desc');
    }
}
