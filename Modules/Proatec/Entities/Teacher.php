<?php

namespace Modules\Proatec\Entities;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code',
        'name',
        'email',
    ];

    public function disciplines()
    {
        return $this->belongsToMany(Discipline::class, 'discipline_teacher')
            ->withPivot(['discipline_id'])->withTimestamps();
    }

    public function rooms()
    {
        return $this->belongsToMany(Room::class, 'room_teacher')
            ->withPivot(['room_id'])->withTimestamps();
    }
}
