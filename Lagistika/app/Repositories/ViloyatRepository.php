<?php


namespace App\Repositories;

use App\Interface\ViloyatInterface;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class ViloyatRepository implements ViloyatInterface
{
      public function getUsersByViloyat(string $viloyat)
    {
        return DB::table('users')
            ->join('viloyats', 'viloyats.user_id', '=', 'users.id')
            ->where('viloyats.viloyat', $viloyat) // yoki agar ustun `title` bo‘lsa — ->where('viloyatlar.title', $viloyat)
            ->select('users.id', 'users.first_name', 'users.phone')
            ->get();
    }
}