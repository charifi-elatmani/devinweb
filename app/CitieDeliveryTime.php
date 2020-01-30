<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CitieDeliveryTime extends Model
{
    
    public function CitieExclutDeliveryTime(){
        return $this->hasMany(ExcludingDeliveryTime::class);
    }
}
