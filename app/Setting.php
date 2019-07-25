<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table ="settings";
    protected $fillable = ['id','name','email','phone','address','footer','aboutus','facebook','twitter','linkedin'];

}
