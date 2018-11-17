<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class CategoryGroup extends Model
{
    protected $table = "category_group";
    public $timestamps = false;
    public function category_product()
    {
    	return $this->hasMany("App\CategoryProduct","idCategoryGroup",'id');
    }

    public function product()//noi bang thong qua bang trung gian
    {
    	return $this->hasManyThrough('App\Product','App\CategoryProduct','idCategoryGroup','idCategoryProduct','id');
    }
}
