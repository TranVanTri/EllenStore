<?php
namespace App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart; 
use App\User;
use DB;
use App\CategoryGroup;
use App\CategoryProduct;
use App\Product;
use Illuminate\Database\QueryException;
use App\Http\Controllers\Controller;
class BeforeCartController extends Controller
{

    public function __construct(){
        $cateGroup = CategoryGroup::where('enable',1)->get();
        view()->share('cateGroup', $cateGroup);
        $cateProduct = CategoryProduct::where('enable',1)->get();
        view()->share('cateProduct', $cateProduct);
    }

    public function getViewProduct($name, $id)
    {	
    	// need to change the id of the idCategoryProduct
    	
    	$products = Product::where([['idCategoryProduct','=',$id],['enable','=', 1]])->get();

        // get the Name of the Category_Product
    	$dirName = CategoryProduct::where('id',$id)->get();

    	return view('user/tatcasanpham',compact('products', 'dirName'));
    }

    public function viewDetailProduct($name, $id){
    	$product = Product::where('id',$id)->get();
    	return view('user/chitietsanpham',compact('product'));
    }


    public function giohang(){
        $content = Cart::content();
        $total = Cart::total();
        return view('cart.home',compact('content','total'));
    }
    
}
