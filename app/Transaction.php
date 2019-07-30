<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transaction';
    protected $fillable = ['id','user_id','property_id','owner_id','booking_range','start_booking_date','amount','note','status','stap_token','payment_slip'];

    public function property()
    {
        return $this->belongsTo(Property::class,'property_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function owner()
    {
        return $this->belongsTo(User::class,'owner_id');
    }
    public function setPending()
    {
        $this->attributes['status'] = 'pending';
        self::save();
    }
    public function setSuccess()
    {
        $this->attributes['status'] = 'success';
        self::save();
    }
    public function setFailed()
    {
        $this->attributes['status'] = 'failed';
        self::save();
    }
    public function setExpired()
    {
        $this->attributes['status'] = 'expired';
        self::save();
    }
}
