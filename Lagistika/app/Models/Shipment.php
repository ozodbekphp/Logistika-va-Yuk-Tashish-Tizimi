<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Shipment extends Model
{
    /** @use HasFactory<\Database\Factories\ShipmentFactory> */
    use HasFactory;


    protected $fillable = ['shipment_id' , 'user_id', 'name', 'weight', 'size', 'yuk_olish_joyi', 'yuk_qabul_qilish_joyi'];

    protected $guarded = [];
    protected $primaryKey = 'shipment_id';
}
