<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "product";
    public $timestamps = false;

    public function category_product()
    {
    	return $this->belongsTo("App\CategoryProduct","idCategoryProduct",'id');
    }

    public function bill_detail()
    {
    	return $this->hasMany("App\BillDetail","idProduct",'id');
    }
    
}
