<?php

namespace App\Imports;

use App\FinancialStatement;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Validators\Failure;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Illuminate\Validation\Rule;

class FinancialStatementImport implements ToModel, WithStartRow, WithValidation, SkipsOnFailure, WithBatchInserts, WithChunkReading
{
    use Importable;
    private $fyear;
    private $posted_to;

    public function __construct($fyear, $posted_to)
    {
        $this->fyear = $fyear;
        $this->posted_to = $posted_to;
    }

    public function startRow(): int
    {
        return 11;
    }

    public function batchSize(): int
    {
        return 100;
    }

    public function chunkSize(): int
    {
        return 100;
    }

    public function rules(): array
    {
        return [
            '*.0' => ['required'],
            '*.1' => ['required'],
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

    public function transformdate($date)
    {
        if ($date == null) {
            return $date;
        }
        $e_date = str_replace('/', '-', $date);
        $e_date = date('Y-m-d', strtotime($e_date));
        return $e_date;
    }


    public function model(array $row)
    {

        return new FinancialStatement([
            'entry_date' => $this->transformdate($row[0]),
            'voucher_no' => (string)$row[1],
            'bank' => (string)$row[2],
            'cheque' => (string)$row[3],
            'exchange' => (string)$row[4],
            'book_type' => (string)$row[5],
            'settlement_no' => (string)$row[6],
            'transaction_date' => $this->transformdate($row[7]),
            'description_narration' => $row[8],
            'dr_amount' => (float)$row[9],
            'cr_amount' => (float)$row[10],
            'final_dr_cr' => (float)$row[11],
            'fyear' => $this->fyear,
            'posted_to' => $this->posted_to,

        ]);
    }
}
