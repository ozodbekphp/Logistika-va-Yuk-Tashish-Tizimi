<?php


namespace App\Repositories;

use App\Interfaces\LoginInterface;
use App\Models\User;
use Illuminate\Http\Request;

class LoginRepositories implements LoginInterface
{
    public function __construct(protected User $user) {}
    public function login(Request $request)
    {
        $user_login = $request->only('email', 'password');
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return response()->json(["message" => "Bunday email topilmadi"]);
        }

        if (password_verify($user_login['password'], $user->password)) {
            $token = $user->createToken('auth_token')->plainTextToken;
            return response()->json([
                "message" => "Muvaffaqiyatli tizmga kirdingiz",
                'token' => $token
            ]);
        } else {
            return response()->json(["message" => "Parol xato"]);
        }
    }
}
