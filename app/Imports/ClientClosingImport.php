<?php

namespace App\Imports;

use App\ClientClosing;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Validators\Failure;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;


class ClientClosingImport implements ToModel,WithStartRow,WithValidation,SkipsOnFailure,WithBatchInserts, WithChunkReading
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
        // Handle the failures how you'd like.
    }
    
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function transformdate($date){
        if($date==null){
            return $date;
        }
        $e_date = str_replace('/', '-', $date);
        $e_date= date('Y-m-d', strtotime($e_date));
        return $e_date;
    }



    public function model(array $row)
    {
        return new ClientClosing([
            'scrip_code'=>(string)$row[0],
            'scrip_name'=>(string)$row[1],
            'ast'=>(int)$row[2],
            'price'=>(int)$row[3],
            'ot'=>(string)$row[4],
            'expiry_date'=> $this->transformdate($row[5]),
            'purchase_qty'=>(float)$row[6],
            'purchase_value'=>(float)$row[7],
            'purchase_avg'=>(float)$row[8],
            'sales_qty'=>(float)$row[9],
            'sales_value'=>(float)$row[10],
            'sales_avg'=>(float)$row[11],
            'net_qty'=>(float)$row[12],
            'net_value'=>(float)$row[13],
            'net_avg'=>(float)$row[14],
            'market_rate'=>(float)$row[15],
            'market_value'=>(float)$row[16],
            'today_pl'=>(float)$row[17],
            'p_l'=>(float)$row[18],
            'cross_currency'=>(float)$row[19],
            'posted_to' => $this->posted_to


        ]);
    }
}
