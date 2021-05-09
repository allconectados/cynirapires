<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Period extends Model
{
    protected $table = 'periods';
    protected $primaryKey = 'id';
    public $incrementing = false;

    protected $dates = ['created_at', 'updated_at'];

    protected $guarded = [];

    protected $fillable = [
        'year_id',
        'stage_id',
        'serie_id',
        'date_initial',
        'date_final',
        'title',
        'url'
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

    public function plans()
    {
        return $this->hasMany(Plan::class, 'period_id', 'id');
    }
}
