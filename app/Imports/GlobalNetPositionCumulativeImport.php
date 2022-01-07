<?php

namespace App\Imports;

use App\GlobalNetPositionCumulative;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Validators\Failure;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;


class GlobalNetPositionCumulativeImport implements ToModel,WithStartRow,WithValidation,SkipsOnFailure,WithBatchInserts,WithChunkReading
{

    use Importable;
    private $posted_to;

    public function __construct($posted_to)
    {
        $this->posted_to = $posted_to;
    }

    public function startRow(): int
    {
        return 11;
    }
    
    public function batchSize(): int
    {
        return 10;
    }
    public function chunkSize(): int
    {
        return 10;
    }
    public function rules(): array
    {
        return [
           '*.0'=>['required'],
           '*.1'=>['required']

        ];
    }
    public function onFailure(Failure ...$failures)
    {
        
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {   
        return new GlobalNetPositionCumulative([
            'scrip_code'=>(string)$row[0],
            'scrip_name'=>(string)$row[1],
            'plus_qty'=>(float)$row[2],
            'plus_avg'=>(float)$row[3],
            'purchase_value'=>(float)$row[4],
            'minus_qty'=>(float)$row[5],
            'minus_avg'=>(float)$row[6],
            'sales_value'=>(float)$row[7],
            'net_qty'=>(float)$row[8],
            'net_avg'=>(float)$row[9],
            'net_value'=>(float)$row[10],
            'market'=>(float)$row[11],
            'market_value'=>(float)$row[12],
            'today_pl'=>(float)$row[13],
            'p_l'=>(float)$row[14],
            'posted_to' => $this->posted_to,

        ]);
    }
}
