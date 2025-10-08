<?php

namespace App\Http\Controllers;

use App\Interfaces\AdminReportInterface;
use App\Models\Shipment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class AdminReportController extends Controller
{
    public function __construct(private AdminReportInterface $adminReportRepository){}

    public function index()
    {
       return $this->adminReportRepository->index();    
    }
}

