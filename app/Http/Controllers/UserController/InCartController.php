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

    public function xemgiohang(Request $request)
    {      
      if(Auth::id())/* User đã login vào hệ thống*/
      {
       $id = Auth::id();
       $user = User::find($id);

       /*---------------Add new Bill into database ----------------------*/

       foreach(Cart::content() as $row) 
       {
        /*----------------------Add new BillDetail into database----------------------*/
        $billDetail = new BillDetail;

        /*Vì 1 lý do nào đó mà không thể để đoạn code này trong file CartController. không thể lấy dươc
        id của Bill vừa dc tạo nên đành để ở đây!
        Câu query lấy id của Bill của khách hàng, sắp xếp giảm dần dể lấy cái id cuối cùng
        */
        $getBill = Bill::where('idUser','=',$id)->orderBy('id', 'desc')
               ->take(1)
               ->first();

        $billDetail->idBill = $getBill->id;
        $billDetail->idProduct = $row->id;
        $billDetail->nameProduct = $row->name;
        $billDetail->size =   $row->options->has('size') ? $row->options->size : 'None';
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
