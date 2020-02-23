<?php

namespace App\Http\Controllers;

use App\Citie;
use App\DeliveryTime;
use Illuminate\Http\Request;

class CitieController extends Controller
{

    public function store(Request $request)
    {


        $this->validate($request, [
            'name' => 'required|unique|max:255',
        ]);

         Citie::create([
            'name' => $request->name
        ]);

    }


    public function StoreCityDeliveryTimes(Request $request, $city_id){
        $citie=Citie::findOrFail($city_id);
        $citie->delevery_times()->attach($request->id);
    }



}
