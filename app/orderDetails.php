<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class orderDetails extends Model
{
    //
    public function user (){
        return $this->belongsTo('App\Order');
    }
}
