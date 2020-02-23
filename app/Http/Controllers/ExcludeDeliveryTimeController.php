<?php

namespace App\Http\Controllers;

use App\Citie;
use App\CitieDeliveryTime;
use App\ExcludeDateTime;
use App\ExcludingDeliveryTime;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
Use \Carbon\Carbon;


class ExcludeDeliveryTimeController extends Controller
{
    public function excludeCityDeliveryTime(Request $request, $city_id, $delivery_time)
    {
        $date = $request->date;
            $city_delivery_time = CitieDeliveryTime::where('citie_id', $city_id)->where('delivery_time_id', $delivery_time)->first();
            if ($city_delivery_time) {
                ExcludingDeliveryTime::create([
                    "date" => $date,
                    "citie_delivery_time_id" => $city_delivery_time->id
                ]);
            }
    }


    public function StoreCityDeliveryTimes(Request $request, $city_id)
    {
            $date = $request->date;
            $citie = Citie::with('deleveryTimes')->whereHas('deleveryTimes')->find($city_id)->toArray();
              foreach($citie["delevery_times"] as $delivery_time){
                  ExcludingDeliveryTime::create([
                      "date" => $date,
                      "citie_delivery_time_id" =>  $delivery_time["pivot"]["id"]
                  ]);
        }
    }



    public function EndPointDeliveryTimes($city_id , $number_of_days ){

      $date = Carbon::now();
      $delai= $date->addDays($number_of_days);

      $tableDelivery = array();
      $excluDates= array();
      $days=0;

      $citieDeliveryTime= Citie::findOrFail($city_id);

      $data= ExcludingDeliveryTime::find($citieDeliveryTime->CitieExclutDeliveryTime);
      foreach ($data as $item) {
                 if(( $date <= $item->date ) && ($item->date <=$delai)){
                    $days++;
                    $excluDates[] = $item->date;
                 }

      }
      for($i=0;$i<$number_of_days + $days;$i++){
         foreach($excluDates as $item){
            if($item != $date->addDays($i)){
               $tableDelivery[]=$date->addDays($i);
            }

         }
      }
      return response()->json( ['days' => $tableDelivery],JsonResponse::HTTP_OK);
   }

}
