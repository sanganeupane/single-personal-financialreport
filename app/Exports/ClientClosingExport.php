<?php

namespace App\Exports;

use App\ClientClosing;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class ClientClosingExport implements FromView,WithStyles,WithColumnWidths,WithEvents
{
    private $report=[];

    public function __construct($report)
    {
        $this->report = $report;
        // $reports=$this->report;
//         dd($report);

    }
    public function columnWidths(): array
    {
        return [
            'A' => 15, 
            'B' => 15, 
            'C' => 15, 
            'D' => 15, 
            'E' => 15, 
            'F' => 15, 
            'G' => 15, 
            'H' => 15, 
            'I' => 15, 
            'J' => 15, 
            'K' => 15, 
            'M' => 15,
            'N' => 15, 
            'O' => 15,
            'P' => 15, 
            'Q' => 15, 
            'R' => 15, 
            'S' => 15, 
            'T' => 15, 



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
            9    => ['font' => ['bold' => true]],
//            10    => ['font' => ['bold' => true]],
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('exports.Derivative.exclosing', [
            'statement' => $this->report[0],
             'p_value'=>$this->report[1],
             's_value'=>$this->report[2],
            'net'=>$this->report[3],
            'm_value'=>$this->report[4],
            'pl'=>$this->report[5],
            'fnet'=>$this->report[6],
            'fm_value'=>$this->report[7],
            'onlyloss'=>$this->report[8],
            'fpl'=>$this->report[9],
            'tpl'=>$this->report[10],
//            's_value'=>$this->report[11],

        ]);
     }
     public function registerEvents(): array
     {
         return [
             AfterSheet::class    => function(AfterSheet $event) {
    
                 $event->sheet->getDelegate()->freezePane('A11');
                 $event->sheet->styleCells(
                    'A10:T10',
                    [
                        //Set border Style
                        // 'borders' => [ 
                        //     'outline' => [
                        //         'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                        //         'color' => ['argb' => 'EB2B02'],
                        //     ],
    
                        // ],
    
                        //Set font style
                        'font' => [
                            // 'name'      =>  'Calibri',
                            // 'size'      =>  15,
                            // 'bold'      =>  true,
                            'color' => ['rgb' => 'F8FAFC'],
                        ],
    
                        //Set background style
                        'fill' => [
                            'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                            'startColor' => [
                                'rgb' => '326DA6',
                             ]           
                        ],
    
                    ]
                    );
          
    
             },
         ];
     }
}
