<?php

namespace App\Http\Controllers;

use App\Models\Kuryer;
use App\Http\Requests\StoreKuryerRequest;
use App\Http\Requests\UpdateKuryerRequest;
use App\Models\Shipment;
use App\Models\User;
use Illuminate\Http\Request;

class KuryerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request , $id)
    {
        $user = auth()->user();

        if (!$user) {
            return response()->json(["message"  => "Iltimos avval ro'yxatdan o'ting"]);
        } else {

            if($request->shipment_id) {
                $shipment_id = Shipment::where("shipment_id" , $request->shipment_id)->first();
                if(!$shipment_id)
                {
                    return response()->json(["message" => "Bunday buyurtma id topilmadi"]);
                }else{
             
                }
            }
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreKuryerRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Kuryer $kuryer, $id)
    {
        $auth = auth()->user();
        if (!$auth) {
            return response()->json(["message" > "Iltimos Ro'yxatdan o'ting"]);
        } else {
            if ($auth->id != $id) {
                return response()->json(["message" => "Iltimos o'z id ingizni kiriting"]);
            } else {
                $user = User::where('role', 2)->first();
                if (!$user) {
                    return response()->json(["message" => "Siz Kuryer emas ekansiz"]);
                } else {
                    $shipments = Shipment::all();
                    return response()->json([$shipments]);
                }
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kuryer $kuryer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKuryerRequest $request, Kuryer $kuryer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kuryer $kuryer)
    {
        //
    }
}
