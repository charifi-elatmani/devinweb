<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExcludingDeliveryTime extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'excluding_delivery_times';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['date','citie_delivery_time_id'];

    /**
     * Get the city delivery time.
     */
    public function cityDeliveryTime()
    {
        return $this->belongsTo(DeliveryTime::class);
    }
}

