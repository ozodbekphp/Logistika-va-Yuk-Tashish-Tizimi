<?php

namespace App\Http\Controllers;

use App\Models\Shipment;
use App\Http\Requests\StoreShipmentRequest;
use App\Http\Requests\UpdateShipmentRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class ShipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $user = auth('sanctum')->user();

        if (!$user) {
            return response()->json(["message" => "Iltimos ro'yxatdan o'ting"]);
        }


        $buyurtma =  Shipment::where('user_id', $user->id)->get();
        $buyurtma = $buyurtma->map(function ($item) {
            return [
                'buyurtma id' => $item->id,
                'buyurtma nomi' => $item->name,
                "buyurtma o'g'irligi" => $item->weight,
                'buyurtma hajmi' => $item->size,
                'Buyurtma status' => $item->status,
                'yukni olish joyi' => $item->yuk_olish_joyi,
                'yukni yetkazish joyi' => $item->yuk_qabul_qilish_joyi
            ];
        });
        return response()->json($buyurtma);
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
    public function store(StoreShipmentRequest $request)
    {
        $user = auth('sanctum')->user();

        if (!$user) {
            return response()->json(["message" => "Iltimos oldim ro'yxatdan o'ting"]);
        }

        $data = $request->validated();
        $data['user_id'] = $user->id;
        Shipment::create($data);

        return response()->json(['message' => 'Yuk muvaffaqiyali elon qilindi sizga tez orqada aloqaga chiqishadi']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Shipment $shipment) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Shipment $shipment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateShipmentRequest $request, $id)
    {
        $user = auth('sanctum')->user();
        if (!$user) {
            return response()->json(['message' => "Siz ro'yxatdan o'tmagansiz"]);
        } else {
            if ($user->id != $id) {
                return response()->json(["message" => "Siz faqat o'z yukingizni yangilay olasiz"]);
            } else {
                $shipment = Shipment::findOrFail($id);
                if ($shipment->status == 'Kutmoqda') {
                    try {

                        $shipment = Shipment::findOrFail($id);
                        $shipment->update($request->validated());
                        return response()->json(['message' => 'Yuk yangilandi']);
                    } catch (ModelNotFoundException $e) {
                        return response()->json(['message' => 'xatolik yuz berdi']);
                    }
                }else{
                    return response()->json(["message" => "Yukni endi yangilab bo'lmaydi"]);
                }
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Shipment $shipment) {}
}
