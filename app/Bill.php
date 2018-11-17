<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $table = "bill";
    public $timestamps = false;

    public function bill_detail()
    {
    	return $this->hasMany("App\BillDetail","idBill",'id');
    }

    public function user()
    {
    	return $this->belongsTo("App\User","idUser",'id');
    }
}
