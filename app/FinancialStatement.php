<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FinancialStatement extends Model
{
    
    protected $fillable=['entry_date','voucher_no','bank','cheque','exchange','book_type','settlement_no','transaction_date','description_narration','dr_amount','cr_amount','final_dr_cr','fyear','posted_to'];

    public function postedTo()
    {
        return $this->belongsTo(User::class, 'posted_to', 'id');
    }
}
