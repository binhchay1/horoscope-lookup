<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithDrawings;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

class ExportBuildPC implements FromView, WithColumnWidths, WithDrawings
{
    protected $products;
    protected $total;

    public function __construct($products, $total)
    {
        $this->products = $products;
        $this->total = $total;
    }

    public function view(): View
    {
        return view('page.exports.build-pc-excel', [
            'products' => $this->products,
            'total' => $this->total,
        ]);
    }

    public function columnWidths(): array
    {
        $alphas = range('A', 'Z');
        $arrColumn = array();
        foreach ($alphas as $character) {
            if ($character == 'A') {
                $arrColumn[$character] = 5;
            }

            if ($character == 'B') {
                $arrColumn[$character] = 10;
            }

            if ($character == 'C') {
                $arrColumn[$character] = 60;
            }

            if ($character == 'D') {
                $arrColumn[$character] = 20;
            }

            if ($character == 'E') {
                $arrColumn[$character] = 20;
            }

            if ($character == 'F') {
                $arrColumn[$character] = 20;
            }

            if ($character == 'G') {
                $arrColumn[$character] = 20;
            }
        }

        return $arrColumn;
    }

    public function drawings()
    {
        $drawing = new Drawing();
        $drawing->setName('Logo');
        $drawing->setDescription('Kattech PC Logo');
        $drawing->setPath(public_path('/images/logo/logo.png'));
        $drawing->setHeight(200);
        $drawing->setOffsetX(40);
        $drawing->setCoordinates('F2');

        return $drawing;
    }
}
