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
      if(Auth::id())/* User đã login vào hệ thống*/
      {
         $id = Auth::id();
         $user = User::find($id);

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

          /*----------------------Add new BillDetail into database----------------------*/
          $billDetail = new BillDetail;
          $billDetail->idBill = $bill->id;
          $billDetail->idProduct = $row->id;
          $billDetail->nameProduct = $row->name;
          $billDetail->quantity = $row->qty;
          $billDetail->price = $row->price;
          $billDetail->save();

          
        }
        /*
          -lưu thành công giỏ hàng
          -tạo hóa đơn thành công
          -tạo chi tiết hóa đơn
          -xóa bỏ session của giò hàng
          */
          //remove the content of a cart
          Cart::destroy();
          /*Thêm vào db thành công, redirect về trang chủ*/
          $redirect_to = 'tatcasanpham';
          return redirect()->route($redirect_to,['id' => 9,'name' => 'ao-thun']);
      } // end if Auth::user
      else{ /*User chưa login vào hệ thống*/
        return redirect()->route('loginUser');
      }

    }

}
