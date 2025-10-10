<?php

namespace App\Jobs;

use Illuminate\Bus\Batchable;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Shuchkin\SimpleXLSXGen;

class GenerateViloyatExcel implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, Batchable;

    protected string $viloyat;

    public function __construct(string $viloyat)
    {
        $this->viloyat = $viloyat;
    }

    public function handle(): void
    {
        // ✅ To'g'rilandi: 'viloyats.viloyat' ustuni ishlatilmoqda
        $users = DB::table('viloyats')
            ->join('users', 'viloyats.user_id', '=', 'users.id')
            ->where('viloyats.viloyat', $this->viloyat)
            ->select('users.id', 'users.first_name', 'users.phone')
            ->get();

        // Excel uchun ma'lumot tayyorlash
        $data = [
            ['ID', 'Ism', 'Telefon'],
        ];

        foreach ($users as $user) {
            // ✅ To'g'rilandi: $user->first_name ishlatilmoqda (name emas)
            $data[] = [$user->id, $user->first_name, $user->phone];
        }

        // Fayl nomi va yo'li
        $fileName = str_replace("'", '', $this->viloyat) . '_users.xlsx';
        $filePath = storage_path('app/reports/' . $fileName);

        // Katalog mavjud bo'lmasa — yaratamiz
        if (!file_exists(dirname($filePath))) {
            mkdir(dirname($filePath), 0777, true);
        }

        // Excel generatsiya qilish
        SimpleXLSXGen::fromArray($data)->saveAs($filePath);

        Log::info("✅ {$this->viloyat} viloyati uchun Excel yaratildi: {$filePath}");
    }
}