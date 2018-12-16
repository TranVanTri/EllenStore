<?php

namespace App\Http\Controllers;
use Gloudemans\Shoppingcart\Facades\Cart;   
use Illuminate\Http\Request;
use App\Product;
use App\Quotation;
use DB;
use Illuminate\Support\Facades\Redirect;
class CartController extends Controller
{
    public function index()
    {
        // $cartItems = Cart::content();
        // return view('cart.index',compact('cartItems'));
        $content = Cart::content();
        print_r($content);
    }

    public function create($productId)
    {
        
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
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
