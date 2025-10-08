<?php


namespace App\Repositories;

use App\Interfaces\AdminInterface;
use App\Models\Shipment;
use App\Models\User;

class AdminRepository implements AdminInterface
{
    public function index()
    {
        if (auth('sanctum')->user()->role === 1 || auth('sanctum')->user()->role === 2) {
            $shipments = Shipment::all();
            return response()->json(["data" => $shipments]);
        }else{
            return response()->json(["message" => "Ro'yxatdan o'tmaga ekansiz yoki Admin emas ekansiz!"]);
        }
    }
}
