<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discipline extends Model
{
    protected $table = 'disciplines';

    protected $primaryKey = 'id';

    public $incrementing = false;

    protected $dates = ['created_at', 'updated_at'];

    protected $guarded = [];

    protected $casts = [
        'id' => 'string',
    ];

    protected $fillable = [
        'year_id',
        'stage_id',
        'serie_id',
        'room_id',
        'teacher_id',
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

    public function teachers()
    {
        return $this->belongsToMany(Teacher::class, 'discipline_teacher')
            ->withPivot(['teacher_id'])->withTimestamps();
    }
}
