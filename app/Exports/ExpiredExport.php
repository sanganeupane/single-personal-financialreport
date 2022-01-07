<?php

namespace App\Exports;

use App\ClientExpired;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithColumnWidths;

class ExpiredExport implements FromView,WithStyles,WithColumnWidths
{ private $report=[];

    public function __construct($report)
    {
        $this->report = $report;
        $reports=$this->report;
        // dd($reports);

    }
    public function columnWidths(): array
    {
        return [
            'A' => 12, 
            'B' => 12, 
            'C' => 12, 
            'D' => 12, 
            'E' => 12, 
            'F' => 12, 
            'G' => 12, 
            'H' => 12, 
            'I' => 12, 
            'J' => 12, 
            'K' => 12, 
            'M' => 12,
            'N' => 12, 
            'O' => 12,
            'P' => 12, 
            'Q' => 12, 
            'R' => 12, 



        ];
    }
    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            1    => ['font' => ['bold' => true]],
            2    => ['font' => ['bold' => true]],
            4    => ['font' => ['bold' => true]],
            5    => ['font' => ['bold' => true]],
            6    => ['font' => ['bold' => true]],
            7    => ['font' => ['bold' => true]],
            8    => ['font' => ['bold' => true]],
            10    => ['font' => ['bold' => true]],
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('exports.Derivative.exexpired', [
            'statement' => $this->report[0],
            'p_value'=>$this->report[1],
            's_value'=>$this->report[2],
           'net'=>$this->report[3],
           'm_value'=>$this->report[4],
           'pl'=>$this->report[5],

        ]);
     }
}
