<?php


namespace App\Repositories;

use App\Interfaces\LoginInterface;
use App\Jobs\SendWelcomeEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginRepositories implements LoginInterface
{
    public function __construct(protected User $user) {}
    public function login(Request $request)
    {
        if (!isset($request->email) || !isset($request->password)) {
            return response()->json(["messsage" => "Bo'sh bo'lishi mumkin emas"]);
        }
        $user_login = $request->only('email', 'password');
       
        $user = User::where('email', $request->email)->first();
        
        if ($user) {
            if (password_verify($user_login['password'], $user->password)) {
                $token = $user->createToken('auth_token')->plainTextToken;
                return response()->json([
                    "message" => "Muvaffaqiyatli tizmga kirdingiz",
                    'token' => $token
                ]);
            }
        }

        return response()->json(["message" => "Xatolik yuz berdi email yoki parol xato!"], 401);
    }
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
}
