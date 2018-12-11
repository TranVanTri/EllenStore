<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    protected $table = "promotion";
    public $timestamps = false;


    public function product()
    {
    	return $this->hasMany("App\Product","idPromotion",'id');
    }
}
