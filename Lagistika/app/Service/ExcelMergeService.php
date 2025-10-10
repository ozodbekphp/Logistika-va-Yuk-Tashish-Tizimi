<?php

namespace App\Serivece;

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class ExcelMergeService
{
    public static function mergeReports(array $files , string $output)
    {
    $finalSpreadsheet = new Spreadsheet();
        $finalSheet = $finalSpreadsheet->getActiveSheet();
        $row = 1;

        foreach ($files as $file) {
            $spreadsheet = IOFactory::load($file);
            $sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);

            foreach ($sheetData as $line) {
                $col = 1;
                foreach ($line as $value) {
                    $finalSheet->setCellValueByColumnAndRow($col, $row, $value);
                    $col++;
                }
                $row++;
            }
            $row++; // bo'sh qatordan keyingi fayl
        }

        $writer = IOFactory::createWriter($finalSpreadsheet, 'Xlsx');
        $writer->save($output);
    }
}