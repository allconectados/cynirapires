<?php

namespace Modules\Proatec\Entities;

use Illuminate\Database\Eloquent\Model;

class Discipline extends Model
{
    protected $fillable = ['code','title'];

    public function teachers()
    {
        return $this->belongsToMany(Teacher::class, 'discipline_teacher')
            ->withPivot(['teacher_id'])->withTimestamps();
    }

    public function rooms()
    {
        return $this->belongsToMany(Room::class, 'discipline_room')
            ->withPivot(['room_id'])->withTimestamps();
    }
}
