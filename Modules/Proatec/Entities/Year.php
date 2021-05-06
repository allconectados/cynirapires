<?php

namespace Modules\Proatec\Entities;

use Illuminate\Database\Eloquent\Model;

class Year extends Model
{
    protected $fillable = ['code','title'];

    public function rooms()
    {
        return $this->hasMany(Room::class, 'year_id');
    }

    public function teachers()
    {
        return $this->hasMany(Teacher::class, 'year_id');
    }

    public function students()
    {
        return $this->hasMany(Student::class, 'year_id');
    }
}
