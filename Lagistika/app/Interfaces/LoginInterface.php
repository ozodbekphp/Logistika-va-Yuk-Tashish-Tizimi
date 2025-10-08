<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface LoginInterface
{

    public function login(Request $request);
    
}