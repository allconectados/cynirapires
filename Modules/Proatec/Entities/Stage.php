<?php

namespace Modules\Proatec\Entities;

use Illuminate\Database\Eloquent\Model;

class Stage extends Model
{
    protected $fillable = ['code','title'];

    public function rooms()
    {
        return $this->hasMany(Room::class, 'stage_id');
    }

    public function students()
    {
        return $this->hasMany(Student::class, 'stage_id');
    }
}
