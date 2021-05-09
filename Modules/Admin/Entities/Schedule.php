<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $table = 'schedules';
    protected $primaryKey = 'id';
    public $incrementing = false;

    protected $fillable = [
        'year_id',
        'stage_id',
        'sala_id',
        'title',
        'url',
        'time_initial',
        'time_final',
    ];

    public function year()
    {
        return $this->belongsTo(Year::class)->orderBy('title', 'asc');
    }

    public function stage()
    {
        return $this->belongsTo(Stage::class)->orderBy('title', 'asc');
    }

    public function sala()
    {
        return $this->belongsTo(Sala::class)->orderBy('title', 'asc');
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class, 'schedule_id', 'id')
            ->orderBy('title', 'asc');
    }
}
