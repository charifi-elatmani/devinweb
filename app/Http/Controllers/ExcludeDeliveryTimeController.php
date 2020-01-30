<?php

namespace App\Http\Controllers;

use App\Citie;
use App\CitieDeliveryTime;
use App\ExcludingDeliveryTime;
use Illuminate\Http\Request;
Use \Carbon\Carbon;


class ExcludeDeliveryTimeController extends Controller
{

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
