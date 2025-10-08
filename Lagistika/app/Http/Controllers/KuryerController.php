<?php

namespace App\Http\Controllers;

use App\Models\Kuryer;
use App\Http\Requests\StoreKuryerRequest;
use App\Http\Requests\UpdateKuryerRequest;
use App\Interfaces\Kuryerinterface;
use App\Models\Shipment;
use App\Models\User;
use Illuminate\Http\Request;

class KuryerController extends Controller
{
    public function __construct(private Kuryerinterface $KuryerRepository){}

    public function kuryer_take_shipment(Request $request)
    {
        return $this->KuryerRepository->kuryer_take_shipment($request);
    }
}
