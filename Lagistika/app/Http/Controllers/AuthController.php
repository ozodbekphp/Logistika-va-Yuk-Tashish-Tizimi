<?php

namespace App\Http\Controllers;

use App\Interfaces\LoginInterface;
use App\Jobs\SendWelcomeEmail;
use App\Models\User;
use Illuminate\Auth\Events\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function __construct(
        private LoginInterface $loginRepository
    ){}
    
    public function register(Request $request)
    {
      return $this->loginRepository->register(($request));
    }

    
    public function login(Request $request)
    {
      return $this->loginRepository->login($request);
    }
}
