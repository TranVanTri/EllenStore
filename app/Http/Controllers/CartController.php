<?php

namespace App\Http\Controllers;
use Gloudemans\Shoppingcart\Facades\Cart;   
use Illuminate\Http\Request;
use App\Product;
use App\Quotation;
use Auth;
use DB;
use Illuminate\Support\Facades\Redirect;
class CartController extends Controller
{
    public function index()
    {
        $id     =   Auth::id();
        Cart::instance('list1')->store($id );
    }

    public function create($productId)
    {
        
    }

    public function store(Request $request)
    {
        $user   =   Auth::user();
        $id     =   Auth::id();
        print_r($id);
        //Cart::instance('list1')->store("username");
        
    }

    public function show($id)
    {
        //
         $id     =   Auth::id();
        Cart::restore('username');
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
