<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sala extends Model
{
    use HasFactory;

    protected $table = 'salas';
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

    public function schedules()
    {
        return $this->hasMany(Schedule::class, 'sala_id', 'id')
            ->orderBy('time_initial', 'asc');
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class, 'sala_id', 'id')
            ->orderBy('start', 'asc');
    }
}
