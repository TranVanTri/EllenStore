<?php

namespace App\Http\Controllers;
use Gloudemans\Shoppingcart\Facades\Cart;   
use Illuminate\Http\Request;
use App\Product;
use App\Quotation;
use Auth;
use DB;
use Illuminate\Support\Facades\Redirect;

use App\User; 

class CartController extends Controller
{
    public function index()
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
        if(Auth::id()){/*User  login vào hệ thống*/
            $id = Auth::id();

            /*store your cart instance into the database*/

            Cart::instance(Auth::user()->email)->store($id.time().uniqid(mt_rand(),true));
        }
        else /*User chưa login vào hệ thống*/
        {
            return redirect()->route('loginUser');
        }
          
        return Redirect::action('UserController\InCartController@xemgiohang');
         

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
    public function edit($id)
    {
        $product = DB::table('product')->where('id',$id)->first();
        Cart::add($id,$product->name,1,$product->price,['size'=>'M','avatar'=>$product->avatar]);

        if(Auth::id()){
            /*User  login vào hệ thống*/
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
}
