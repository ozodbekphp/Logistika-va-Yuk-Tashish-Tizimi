<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Psy\CodeCleaner\FunctionReturnInWriteContextPass;

class UserController extends Controller
{
    public function index()
    {
        $user =  auth()->user();
        if ($user) {
            return auth()->user();
        } else {
            return response()->json(["message" => "Token xato"]);
        }
    }
    public function update(UpdateUserRequest $request, $id)
    {
        $user  = auth()->user();
        if (!$user) {
            return response()->json(['message' => "Siz hali ro'yxatdan o'tmagansiz"]);
        }
        if ($user->id != $id) {
            return response()->json(["message" => "Siz faqat o'z profilingizni yangilay olasiz iltimos o'zingini idingizni kiriting"]);
        } else {



            try {

                $existingUser = User::where('email', $request->email)->first();
                if ($existingUser) {
                    return response()->json(['message' => 'Bunday Email Bor'], 400);
                } else {
                    $user = User::findOrFail($id);
                    $user->update($request->validated());
                    return response()->json(["message" => "Muvaffaqiyatli yangilandi"]);
                }
            } catch (ModelNotFoundException $e) {
                return response()->json(['message' => 'Bunday id egasi topilmadi']);
            }
        }
    }

    public function show_user_all()
    {
        return User::all();
    }
}
