<?php
namespace App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart; 
use App\User;
use DB;
use Auth;
use models\Cart as CartModel;
use App\CategoryGroup;
use App\CategoryProduct;
use App\Product;
use Illuminate\Database\QueryException;
use App\Http\Controllers\Controller;
use App\Quotation;
use App\Bill;
use App\BillDetail;

class RecentProduct extends Controller
{
    public function xoasanpham($id){
        Cart::remove($id);
        return redirect()->route('giohang');
    }

    
    
}
