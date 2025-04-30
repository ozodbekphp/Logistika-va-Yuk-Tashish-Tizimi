<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {

        $user = User::where('email', $request->email)->first();

        if ($user) {
            return response()->json(["message" => "Bunday email ro'yxatdan o'tgan login qiling"]);
        }
        User::create([
            'first_name' => $request->first_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone
        ]);


        return response()->json(["message" => "Muvaffaqiyatli ro'yxatdan o'tdingiz"]);
    }




    public function login(Request $request)
    {
        $user_login = $request->only('email', 'password');
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return response()->json(["message" => "Bunday email topilmadi"]);
        }

        if (password_verify($user_login['password'], $user->password)) {
            $token = $user->createToken('auth-token')->plainTextToken;
            return response()->json([
                "message" => "Foydalanuvchi topildi",
                'token' => $token
            ]);
        }else{
            return response()->json(["message" => "Parol xato"]);
        }
    }
}
