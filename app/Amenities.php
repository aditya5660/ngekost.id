<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Amenities extends Model
{
    protected $fillable = [
        'id','name','icon'
    ];
}
