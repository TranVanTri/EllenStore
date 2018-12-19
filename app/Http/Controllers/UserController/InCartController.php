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
         $user = User::find($id);
         // $email = Auth::user()->email;
         // echo $email; 
         // echo "<br>";

         /*---------------Add new Bill into database ----------------------*/
          $bill = new Bill;
          $bill->idUser = $user->id;
          $bill->name = $user->name;
          $bill->email = $user->email;

          if($user->phone != null){
            $bill->phone = $user->phone;
          }
          else{
            $bill->phone = '0000000000';
          }
          
          if($user->address != null){
            $bill->addRess = $user->address;
          }
          else{
            $bill->address = '0000000000';
          }
          
          $bill->note = "Chưa note";
          $bill->save();
         foreach(Cart::content() as $row) 
         {
          echo 'You have ' . $row->qty . ' items of ' . $row->name . ' with description: "' . $row->price . '" in your cart.<br>';
          



          /*----------------------Add new BillDetail into database----------------------*/
          $billDetail = new BillDetail;
          $billDetail->idBill = $bill->id;
          $billDetail->idProduct =$row->id;
          $billDetail->nameProduct = $row->name;
          $billDetail->quantity = $row->qty;
          $billDetail->price = $row->price;
          $billDetail->save();
          

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
