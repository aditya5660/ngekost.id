<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transaction';
    protected $fillable = ['id','user_id','property_id','owner_id','booking_range','start_booking_date','subtotal','payments','payment_slip','status'];

    public function property()
    {
        return $this->belongsTo(Property::class,'property_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
