<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;

class Discipline extends Model
{
    protected $table = 'disciplines';

    protected $dates = ['created_at', 'updated_at'];

    protected $guarded = [];

    protected $casts = [
        'id' => 'int',
    ];

    protected $fillable = [
        'year_id',
        'stage_id',
        'serie_id',
        'room_id',
        'teacher',
        'title',
        'url',
        'code',
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

    public function room()
    {
        return $this->belongsTo(Room::class)->orderBy('title', 'asc');
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class)->orderBy('name', 'asc');
    }
}
