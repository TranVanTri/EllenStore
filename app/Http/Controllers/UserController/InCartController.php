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
use Mail;

class InCartController extends Controller
{
  public function xoasanpham($id){
    Cart::remove($id);
    return redirect()->route('giohang');
  }

  public function sendMail(Bill $bill, $billDetailByIdBill){

    $data = array(
      'bill'=> $bill,
      'billDetail' => $billDetailByIdBill,
    );
    Mail::send('user.ordermail', $data, function ($message) use ($data) {    
     
      $message->to($data['bill']->email);
      
      $message->bcc('tvtri1997document1@gmail.com', 'Quản trị');
        // $message->cc('john@johndoe.com', 'John Doe');
      
        // $message->replyTo('john@johndoe.com', 'John Doe');
      
      $message->subject('HÓA ĐƠN ĐẶT HÀNG');
      
        // $message->priority(3);
      
        // $message->attach('pathToFile');
    });
  }

  public function xemgiohang()
  {      
    if(Auth::id())/* User đã login vào hệ thống*/
    {
     $id = Auth::id();
     $user = User::find($id);
     $getBill = Bill::where('idUser','=',$id)->orderBy('id', 'desc')
     ->take(1)
     ->first();

     /*---------------Add new Bill into database ----------------------*/

     foreach(Cart::content() as $row) 
     {
      /*----------------------Add new BillDetail into database----------------------*/
      $billDetail = new BillDetail;

        /*Vì 1 lý do nào đó mà không thể để đoạn code này trong file CartController. không thể lấy dươc
        id của Bill vừa dc tạo nên đành để ở đây!
        Câu query lấy id của Bill của khách hàng, sắp xếp giảm dần dể lấy cái id cuối cùng
        */
        

        $billDetail->idBill = $getBill->id;
        $billDetail->idProduct = $row->id;
        /* xử lý sp khuyến mãi.
          Nếu là sp km thì ghi thêm %km của sp đó
        */
          $product = Product::find($row->id);
          if($product->promotion->per_decr != 0)
          {
            $sale_percent = ($product->promotion->per_decr);
          }
          else{
            $sale_percent = 0;
          }

          if($sale_percent != 0){
            $billDetail->nameProduct = $row->name."<br>Khuyến mãi <mark>".$sale_percent."%</mark>";
          }
          else{
            $billDetail->nameProduct = $row->name;
          }
          
          $billDetail->size =   $row->options->has('size') ? $row->options->size : 'None';
          $billDetail->quantity = $row->qty;
          $billDetail->price = $row->price;

          $billDetail->save();              
        }
        $billDetailByIdBill = BillDetail::where('idBill','=',$getBill->id)->get();
        $this->sendMail($getBill, $billDetailByIdBill);
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
          return redirect()->back()->with('thongbao','Đặt hàng thành công. Vui lòng kiểm tra email của bạn');
      } // end if Auth::user
      else{ /*User chưa login vào hệ thống*/
        return redirect()->route('loginUser');
      }

    }

    

  }
