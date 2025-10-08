<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use App\Interfaces\AdminInterface;
use App\Models\Shipment;
use App\Models\User;

class AdminController extends Controller
{
    public function __construct(private AdminInterface $adminRepository){}
    public function index()
    { 
      return $this->adminRepository->index(); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $admin = auth('sanctum')->user();
        $admin_status = User::where('role', 1);

        if (!$admin && $admin_status) {
            return response()->json(["message" => "Siz ro'yxatdan o'tmagan ekansiz yoki Admin emassiz"]);
        }
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAdminRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAdminRequest $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        //
    }
}
