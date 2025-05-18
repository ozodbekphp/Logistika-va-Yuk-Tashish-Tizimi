<?php

namespace App\Http\Controllers;

use App\Models\Shipment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class AdminReportController extends Controller
{
    public function index()
    {
        $today = Carbon::today();

        return response()->json([
           'Foydalanuvchilar' => User::count(),
           'Bugungi yangi foydalanuvchilar' => User::whereDate('created_at' , $today)->count(),
           'Buyurtmalar' => Shipment::count(),
           'Bugungi buyurtmalar' => Shipment::whereDate('created_at' , $today)->count()
        ]);
    }
}

