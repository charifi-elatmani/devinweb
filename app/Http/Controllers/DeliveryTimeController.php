<?php

namespace App\Http\Controllers;

use App\DeliveryTime;
use Illuminate\Http\Request;

class DeliveryTimeController extends Controller
{
    public function store(Request $request)
    {

        $this->validate($request, [
            'delivery_at' => 'required|max:255',
        ]);


        return DeliveryTime::create([
            'delivery_at' => $request->delivery_at
        ]);

    }


}
