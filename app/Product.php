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

    public function sizes()
    {
        return $this->belongsToMany('App\Size', 'product_size','product_id','size_id');
    }

    public function promotion()
    {
        return $this->belongsTo("App\Promotion","idPromotion",'id');
    }
    
    
}
