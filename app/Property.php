<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $table = 'properties';
    protected $fillable = [
        'id',
        'title',
        'slug',
        'address',
        'location_latitude',
        'location_longitude',
        'provinces',
        'regencies',
        'districts',
        'zipcode',
        'daily_price',
        'monthly_price',
        'yearly_price',
        'room_size',
        'available_room',
        'status',
        'featured',
        'image',
        'description',
        'amenities_id',
        'user_id',
        'category_id',
        'created_at',
        'updated_at',

    ];
    public function gallery()
    {
        return $this->hasMany(PropertyImageGallery::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }
    public function province()
    {
        return $this->belongsTo(Province::class,'provinces');
    }
    public function regency()
    {
        return $this->belongsTo(Regency::class,'regencies');
    }
    public function district()
    {
        return $this->belongsTo(District::class,'districts');
    }
}
