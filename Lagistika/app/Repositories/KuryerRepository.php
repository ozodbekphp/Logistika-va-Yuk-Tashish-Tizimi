<?php

namespace App\Repositories;

use App\Interfaces\Kuryerinterface;
use App\Models\Shipment;
use Illuminate\Http\Request;

class KuryerRepository implements Kuryerinterface
{
    public function kuryer_take_shipment(Request $request)
    {
        $shipment_id = $request->shipment_id;

        if (auth('sanctum')->user()->role === 2) {
            $shipment = Shipment::find($shipment_id);
            if (!$shipment || $shipment->status == "success") {
                return response()->json(["message" => "Bunday buyurtma id topilmadi yoki boshqa kuryer yetkazib bermoqda!"]);
            }
            $shipment->status = "success";
            $shipment->save();

            return response()->json([
                "message" => "buyurtma muvaffaqiyatli qabul qilindi",
                "shipment" => $shipment
            ]);
        }
    }
}
