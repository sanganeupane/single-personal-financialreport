<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GlobalNetPositionCumulative extends Model
{
    protected $fillable=['scrip_code','scrip_name','plus_qty','plus_avg','purchase_value','minus_qty','minus_avg','sales_value','net_qty','net_avg','net_value','market','market_value','today_pl','p_l','posted_to'];
    public function postedTo()
    {
        return $this->belongsTo(User::class, 'posted_to', 'id');
    }
}
