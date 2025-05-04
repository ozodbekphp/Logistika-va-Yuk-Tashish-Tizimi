<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Shipment extends Model
{
    /** @use HasFactory<\Database\Factories\ShipmentFactory> */
    use HasFactory, Notifiable;



    protected $fillable = ['user_id', 'name', 'weight', 'size', 'yuk_olish_joyi', 'yuk_qabul_qilish_joyi'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }



    protected $hidden = [
        'user_id',
        'created_at',
        'updated_at'
    ];
}
