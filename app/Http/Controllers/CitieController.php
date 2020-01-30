<?php

namespace App\Http\Controllers;

use App\Citie;
use App\DeliveryTime;
use Illuminate\Http\Request;

class CitieController extends Controller
{

    public function store(Request $request)
    {
//        dd($request->all());
        $this->validate($request, [
            'name' => 'required|unique|max:255',
        ]);
        
        return Citie::create([
            'name' => $request->name
        ]);

    }

    
    public function StoreCityDeliveryTimes(Request $request, $city_id){
        $citie=Citie::findOrFail($city_id);
        $citie->delevery_times()->attach($request->span);
    }



//    public function update(Request $request, $city_id){
//        $this->validate($request, [
//            'name' => 'required|unique|max:255',
//        ]);
//
//        /**** else error***/
//        $citie=Citie::findOrFail($city_id);
//        $citie->name= $request->name;
//        $citie->update();
//    }
//
//    public function delete($id){
//        Citie::findOrFail($id)->delete();
//
//    }
//
//
//
//    /******************************************/
//
//    public function storee(Request $request)
//    {
//
//        $this->validate($request, [
//            'delivery_at' => 'required|max:255',
//        ]);
//
//
//        return DeliveryTime::create([
//            'delivery_at' => $request->name
//        ]);
//
//    }
//
//
//    public function storeee(Request $request, $citie_id)
//    {
//
//        $citie=Citie::findOrFail($citie_id);
//        $spans = explode(',', $request->span) ;
//        $citie->delevery_times()->detach($spans);
//
//        $this->validate($request, [
//            'delivery_at' => 'required|max:255',
//        ]);
//
//
//        return DeliveryTime::create([
//            'delivery_at' => $request->name
//        ]);
//
//    }
}
