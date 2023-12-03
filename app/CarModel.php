<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarModel extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    public function marks()
    {
        return $this->belongsTo('CarMark', 'mark_id');
    }
}
