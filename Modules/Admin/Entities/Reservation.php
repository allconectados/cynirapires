<?php

namespace Modules\Admin\Entities;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $table = 'reservations';
    protected $primaryKey = 'id';
    public $incrementing = false;

    protected $fillable = [
        'year_id',
        'stage_id',
        'sala_id',
        'schedule_id',
        'teacher_id',
        'title',
        'aula',
        'start',
        'end',
        'color',
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

    public function schedule()
    {
        return $this->belongsTo(Schedule::class)->orderBy('time_initial', 'asc');
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class)->orderBy('name', 'asc');
    }

    public function getStartAttribute($value)
    {
        $dateStart = Carbon::createFromFormat('Y-m-d H:i:s', $value)->format('d/m/Y');
        $timeStart = Carbon::createFromFormat('Y-m-d H:i:s', $value)->format('H:i:s');

        return $this->start = ($timeStart == '00:00:00' ? $dateStart : $value);

    }

    public function getEndAttribute($value)
    {
        $dateEnd = Carbon::createFromFormat('Y-m-d H:i:s', $value)->format('d/m/Y');
        $timeEnd = Carbon::createFromFormat('Y-m-d H:i:s', $value)->format('H:i:s');

        return $this->end = ($timeEnd == '00:00:00' ? $dateEnd : $value);

    }
}
