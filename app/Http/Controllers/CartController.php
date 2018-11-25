<?php

namespace App\Http\Controllers;
use Gloudemans\Shoppingcart\Facades\Cart;   
use Illuminate\Http\Request;
use App\Product;
class CartController extends Controller
{
    public function index()
    {
        $cartItems = Cart::content();
        return view('cart.index',compact('cartItems'));
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
        // pass value 27, sản phẩm có id=27
        $product = Product::find($id);
        Cart::add($id,$product->name,1,$product->price,['size'=>'M','avatar'=>$product->avatar]);
        $cartItems = Cart::content();
        return view('cart.index',compact('cartItems'));
        //return back(); quay trở lại cho khách hàng lựa chọn
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
