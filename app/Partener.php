<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partener extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'parteners';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','citie_id'];


    public function city(){
        return $this->hasOne(City::class);
    }

}
