<?php

namespace Modules\Proatec\Entities;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'code',
        'year_id',
        'stage_id',
        'room_id',
        'name',
        'email',
    ];

    protected $guarded = [];

    public function year()
    {
        return $this->belongsTo(Year::class, 'year_id');
    }

    public function stage()
    {
        return $this->belongsTo(Stage::class, 'stage_id');
    }

    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id');
    }
}
