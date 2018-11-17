<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillDetail extends Model
{
    protected $table = "bill_detail";
    public $timestamps = false;

    public function bill()
    {
    	return $this->belongsTo("App\Bill","idBill",'id');
    }

    public function product()
    {
    	return $this->belongsTo("App\Product","idProduct",'id');
    }
}
