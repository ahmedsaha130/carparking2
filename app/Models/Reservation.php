<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reservation extends Model
{   use SoftDeletes;
    protected $guarded = [];

    public function status(){
        if ($this->status == 1){
            return 'reserved';
        }elseif($this->status == 0){
            return 'canceled';

        }elseif($this->status == 3){
            return 'finished';

        }else{
            return 'busy';
        }
    }


    public function  customers(){

        return $this->belongsTo(Customer::class,'customer_id','id');

    }
    public function  parks(){

        return $this->belongsTo(Park::class,'park_id','id');
    }
    public  function  intervals(){

        return $this->belongsTo(Interval::class,'interval_id','id');
    }
}
