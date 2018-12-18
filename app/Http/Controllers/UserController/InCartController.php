<?php
namespace App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart; 
use App\User;
use DB;
use App\CategoryGroup;
use App\CategoryProduct;
use App\Product;
use Illuminate\Database\QueryException;
use App\Http\Controllers\Controller;
class InCartController extends Controller
{
    public function xoasanpham($id){
        Cart::remove($id);
        return redirect()->route('giohang');
    }

    public function capNhatGioHang(){
        // if(Request::ajax()){
        //     $id= Request::get('id');
        //     $qty = Request::get('qty');
        //     Cart::update($id,$qty);
        //     echo "oke";
        // }
        // else{
        //     echo "No";
        // }
    }
    
}
