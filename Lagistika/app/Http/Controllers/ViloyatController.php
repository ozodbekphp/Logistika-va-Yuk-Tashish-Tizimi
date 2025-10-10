<?php

namespace App\Http\Controllers;

use App\Exports\ViloyatExport;
use App\Jobs\GenerateViloyatExcel;
use App\Serivece\ExcelMergeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Bus;
use Maatwebsite\Excel\Facades\Excel;


class ViloyatController extends Controller
{


    public function generateAll()
    {
        // 3 ta viloyat uchun job’ni parallel tarzda Queue’ga tashlaymiz
        $batch = Bus::batch([
            new GenerateViloyatExcel('Andijon'),
            new GenerateViloyatExcel("Farg'ona"),
            new GenerateViloyatExcel('Namangan'),
        ])->then(function ($batch) {
            // 3 ta fayl tugaganda ularni bitta qilib birlashtiramiz
            ExcelMergeService::mergeReports([
                storage_path('app/reports/Andijon.xlsx'),
                storage_path('app/reports/Fargona.xlsx'),
                storage_path('app/reports/Namangan.xlsx'),
            ], storage_path('app/reports/Viloyatlar.xlsx'));
        })->dispatch();

        return response()->json([
            'message' => 'Viloyat hisobotlari generatsiya qilinmoqda...',
            'batch_id' => $batch->id
        ]);
    }
}
