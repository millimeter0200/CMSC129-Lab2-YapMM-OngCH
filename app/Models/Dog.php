<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dog extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'gender',
        'color',
        'location_id',
        'temperament',
    ];

    public function location()
    {
        return $this->belongsTo(Location::class);
    }
}