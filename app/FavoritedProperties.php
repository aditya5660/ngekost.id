<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FavoritedProperties extends Model
{
    protected $table ="favorited_properties";
    protected $fillable = [
        'user_id',	'property_id'
    ];
    public function property()
    {
        return $this->belongsTo(Property::class,'property_id');
    }
}
