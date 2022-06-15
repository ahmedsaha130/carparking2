<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Park extends Model
{
    protected $guarded = [];

    public function status(){
        return $this->status == 1 ?"active":'Disable';
    }

    public function reservation()
    {
        return $this->hasMany(Reservation::class,'park_id','id');
    }
}
