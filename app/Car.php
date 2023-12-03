<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'year', 'mileage', 'color',
    ];

    public function marks()
    {
        return $this->belongsTo('CarMark', 'mark_id');
    }

    public function models()
    {
        return $this->belongsTo('CarModel', 'model_id');
    }
}

