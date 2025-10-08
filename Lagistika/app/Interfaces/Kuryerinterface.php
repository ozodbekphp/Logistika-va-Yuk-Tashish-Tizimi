<?php


namespace App\Interfaces;

use Illuminate\Http\Request;

interface Kuryerinterface
{
    public function kuryer_take_shipment(Request $request);
    
}