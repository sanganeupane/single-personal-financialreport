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

class CumulativeExport implements FromView, WithStyles, WithColumnWidths, WithEvents
{
    private $report = [];

    public function __construct($report)
    {
        $this->report = $report;
        $reports = $this->report;

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


        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            1 => ['font' => ['bold' => true]],
            2 => ['font' => ['bold' => true]],
            4 => ['font' => ['bold' => true]],
            5 => ['font' => ['bold' => true]],
            6 => ['font' => ['bold' => true]],
            7 => ['font' => ['bold' => true]],
            8 => ['font' => ['bold' => true]],
            9 => ['font' => ['bold' => true]],
            10 => ['font' => ['bold' => true]],
        ];
    }

    public function view(): View
    {
        return view('exports.Net.excumu', [
            'statement' => $this->report[0],
            'p_value' => $this->report[1],
            'net' => $this->report[2],
            'm_value' => $this->report[3],
            'pl' => $this->report[4],
            'fnet' => $this->report[5],
            'fm_value' => $this->report[6],
            'onlyloss' => $this->report[7],
            'fpl' => $this->report[8],
            'tpl' => $this->report[9],
            's_value' => $this->report[10],


        ]);
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $event->sheet->getDelegate()->freezePane('A11');
                $event->sheet->styleCells(
                    'A10:O10',
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
