<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Interval extends Model
{
    protected $guarded = [];

    public function reservation()
    {
        return $this->hasMany(Reservation::class,'interval_id','id');
    }
    public function status(){
        return $this->status == 1 ?"active":'Disable';
    }

}
