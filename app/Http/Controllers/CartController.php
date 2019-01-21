<?php
namespace App\Http\Controllers;
use Gloudemans\Shoppingcart\Facades\Cart;   
use Illuminate\Http\Request;
use App\Product;
use App\Quotation;
use Auth;
use DB;

use Illuminate\Support\Facades\Redirect;
use App\Promotion;
use App\User; 
use App\Bill;

use App\BillDetail;
use App\CategoryGroup;
use App\CategoryProduct;
use App\Slide;
use Illuminate\Database\QueryException;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    public function index(Request $request)
    {
/*
            $id.time().uniqid(mt_rand(),true)
            **** This function is used as:
            uniqid() - this will generate the 13 character uniqid

            mt_rand() - generates random number by using Mersenne Twister algorithim and is 4 times more fast then rand()

            uniqid(mt_rand()) - prefixing the random generate number with uniqueid

            uniqid(mt_rand(), true) - to get more strong random i am enabling entropy of uniqid by setting second parameter to 'true'

            $id.time().uniqid(mt_rand(), true) - here $id may be userid, time() will generate current unix time stamp, lastly i will append with my uniqid(...)

            *********************************************************************************

            instance(Auth::user()->email)
            *** lấy email của user đã login, sau đó lưu vào shoppingcart với giá trị email đó
*/
        if(Auth::id())
        {
            /*User  login vào hệ thống*/
            $id = Auth::id();
            $user = User::find($id);
            /*store your cart instance into the database*/

            Cart::instance(Auth::user()->email)->store($id.time().uniqid(mt_rand(),true));

            

        }
        else /*User chưa login vào hệ thống*/
        {
            return redirect()->route('loginUser');
        }
          
        if(Cart::content()){
            $bill = new Bill;
            $bill->idUser = $user->id;
            
            
            if(isset($request->name))
            {
                $bill->name = $request->name;
            }
            else
            {
                $bill->name = $user->name;
            }

            if(isset($request->email))
            {
                $bill->email = $request->email;
            }
            else
            {
                $bill->email = $user->email;
            }

            if(isset($request->phone))
            {
                $bill->phone = $request->phone;
            }
            elseif($user->phone != null)
            {
                $bill->phone = $user->phone;
            }
            else{
                $bill->phone = '00';
            }

            if(isset($request->address))
            {
                $bill->addRess = $request->address;
            }
            elseif($user->address != null)
            {
                $bill->addRess = $user->address;
            }
            else{
                $bill->address = '00';
            }


            if(isset($request->note))
            {
                $bill->note = $request->note;
            }
            else{
                $bill->note = "Không note";
            }
            
            $bill->save();

            
            
        }
        else{
            print_r("None content");
        }


        return Redirect::action('UserController\InCartController@xemgiohang');
         

    }


    public function edit(Request $request,$id)
    {
        if ($request->has('numberBuy'))
        {
            $amount = $request->numberBuy;
        } 
        else 
        {
            $amount = 1;
        }

        if ($request->has('kichthuoc'))
        {
            $size = $request->kichthuoc;
        } 
        else 
        {
            $size = "None";
        }


        //$product = DB::table('product')->where('id',$id)->first();
        $product = Product::find($id);

        if($product->promotion->per_decr != 0)
        {
            $money = ($product->price - ($product->price*$product->promotion->per_decr)/100);
        }
        else{
            $money = $product->price;
        }

        Cart::add($id,$product->name,$amount,$money,['size'=>$size,'avatar'=>$product->avatar]);

        if(Auth::id()){
            /*User  login vào hệ thống*/

            /* redirect đến tran giỏ hàng co khách xem sp đã chọn*/
            return Redirect::action('UserController\BeforeCartController@giohang');
        }
        else
        {
            /*User chưa login vào hệ thống*/
            return redirect()->route('loginUser');
        }

        // $product = DB::table('product')->where('id',$id)->first();
        // Cart::add($id,$product->name,1,$product->price,['size'=>'M','avatar'=>$product->avatar]);
        // return Redirect::action('UserController\BeforeCartController@giohang');
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
    public function create($productId)
    {
        
    }

    public function store(Request $request)
    {
        
        
    }

    public function show($id)
    {
       
       
    }
}
