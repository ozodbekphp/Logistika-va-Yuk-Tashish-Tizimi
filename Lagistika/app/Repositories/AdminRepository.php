<?php


namespace App\Repositories;

use App\Interfaces\AdminInterface;
use App\Models\Shipment;
use App\Models\User;

class AdminRepository implements AdminInterface
{
    public function index()
    {
        $admin = auth('sanctum')->user();
        $admin_status = User::where('role', 1);

        if ($admin && $admin_status) {

            $all_shipment = Shipment::all();
            return response()->json($all_shipment);
        } else {
            return response()->json(["message" => "Siz ro'yxatdan o'tmagansiz yoki Admin emassiz"]);
        }
    }
}
