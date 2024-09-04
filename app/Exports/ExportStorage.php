<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithColumnWidths;

class ExportStorage implements FromView, WithColumnWidths
{
    protected $storage;

    public function __construct($storage)
    {
        $this->storage = $storage;
    }

    public function view(): View
    {
        return view('page.exports.story-storage', [
            'listStorage' => $this->storage
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
}
