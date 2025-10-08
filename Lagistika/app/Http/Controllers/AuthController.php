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

        $user = User::where('email', $request->email)->first();

        if ($user) {
            return response()->json(["message" => "Bunday email ro'yxatdan o'tgan login qiling"]);
        }
        $user = User::create([
            'first_name' => $request->first_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone
        ]);
  
        # Queue emailga xabar yuborish
        SendWelcomeEmail::dispatch($user);


        return response()->json(["message" => "Muvaffaqiyatli ro'yxatdan o'tdingiz"]);
    }




    public function login(Request $request)
    {
      return $this->loginRepository->login($request);
    }
}
