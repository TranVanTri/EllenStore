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


class InCartController extends Controller
{
    public function xoasanpham($id){
        Cart::remove($id);
        return redirect()->route('giohang');
    }

    public function xemgiohang()
    {      
      if(Auth::id())
      {
         $id = Auth::id();
         $email = Auth::user()->email;
         echo $email; 
         echo "<br>";

         foreach(Cart::content() as $row) 
         {
          echo 'You have ' . $row->qty . ' items of ' . $row->name . ' with description: "' . $row->price . '" in your cart.<br>';
          }
      }
      else{
        return redirect()->route('loginUser');
      }

    }

    public function xemTatCaGioHang()
    {
        
    }



}
