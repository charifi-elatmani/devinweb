<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeliveryTime extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'delivery_times';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['delivery_at'];

    
    public function cities(){
        return $this->belongsToMany(City::class);
    }

}
