<?php

namespace App\Repositories;

use App\Interfaces\AdminReportInterface;
use App\Models\Shipment;
use App\Models\User;
use Illuminate\Support\Carbon;

class AdminReportRepositories implements AdminReportInterface
{
    public function index()
    {
        if (auth('sanctum')->user()->role == 1) {
            $today = Carbon::today();

            return response()->json([
                'Foydalanuvchilar' => User::count(),
                'Bugungi yangi foydalanuvchilar' => User::whereDate('created_at', $today)->count(),
                'Buyurtmalar' => Shipment::count(),
                'Bugungi buyurtmalar' => Shipment::whereDate('created_at', $today)->count()
            ]);
        }

        return response()->json(["message" => "Siz admin emas ekansiz"]);
    }
}
