<?php

namespace App\Exports;

use App\GlobalNetPositionCumulative;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;


class CumulativeChargeExport implements FromView,WithStyles,WithColumnWidths,WithEvents
{
    private $report=[];

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
        return view('exports.Net.excumu', [
            'statement' => $this->report[0],
            'p_value'=>$this->report[1],
            'net'=>$this->report[2],
            'm_value'=>$this->report[3],
            'pl'=>$this->report[4],

        ]);
    }
        
     public function registerEvents(): array
     {
         return [
             AfterSheet::class    => function(AfterSheet $event) {
    
                 $event->sheet->getDelegate()->freezePane('A11');
    
             },
         ];
     }
}

