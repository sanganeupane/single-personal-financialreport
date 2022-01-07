<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientClosing extends Model
{
    protected $fillable=['scrip_code','scrip_name','ast','price','ot','expiry_date','purchase_qty','purchase_value','purchase_avg','sales_qty','sales_value','sales_avg','net_qty','net_value','net_avg','net_value','market_rate','market_value','today_pl','p_l','cross_currency','posted_to'];

    public function postedTo()
    {
        return $this->belongsTo(User::class, 'posted_to', 'id');
    }
}
