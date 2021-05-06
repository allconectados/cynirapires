<?php

namespace Modules\Proatec\Entities;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = ['year_id','stage_id','code','title'];

    protected $guarded = [];

    public function year()
    {
        return $this->belongsTo(Year::class, 'year_id');
    }

    public function stage()
    {
        return $this->belongsTo(Stage::class, 'stage_id');
    }

    public function students()
    {
        return $this->hasMany(Student::class, 'room_id');
    }

    public function teachers()
    {
        return $this->belongsToMany(Teacher::class, 'room_teacher')
            ->withPivot(['teacher_id'])->withTimestamps();
    }

    public function disciplines()
    {
        return $this->belongsToMany(Discipline::class, 'discipline_room')
            ->withPivot(['discipline_id'])->withTimestamps();
    }
}
