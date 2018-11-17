<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryProduct extends Model
{
    protected $table = "category_product";
    public $timestamps = false;
    
    public function category_group()
    {
    	return $this->belongsTo('App\CategoryGroup','idCategoryGroup','id');
    }

    public function product()
    {
    	return $this->hasMany("App\Product","idCategoryProduct",'id');
    }
}
