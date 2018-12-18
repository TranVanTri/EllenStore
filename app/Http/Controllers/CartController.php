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
        $id     =   Auth::id();
        $user = Auth::user();
        $email = $user->email;
        Cart::instance($email)->store();

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
        return Redirect::action('UserController\BeforeCartController@giohang');
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
