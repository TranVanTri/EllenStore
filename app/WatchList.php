<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WatchList extends Model
{
    //
    protected $table = "watchlist";
    protected $fillable = ['idUser', 'idProduct'];
    public $timestamps = false;

    public function product()
    {
    	return $this->belongsTo("App\Product","idProduct",'id');
    }

    // public function user()
    // {
    // 	return $this->belongsTo("App\User","idUser",'id');
    // }
}
