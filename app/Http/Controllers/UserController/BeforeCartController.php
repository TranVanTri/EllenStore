<?php
namespace App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart; 
use App\User;
use DB;
use App\CategoryGroup;
use App\CategoryProduct;
use App\Product;
use App\Promotion;
use App\Slide;
use Illuminate\Database\QueryException;
use App\Http\Controllers\Controller;
use Auth;
class BeforeCartController extends Controller
{

    public function getTrangChu(){
        $prohighLight = Product::where([['enable',1], ['highLight',1]])->get();
        $promotion = Promotion::where('enable',1)->get();
        $slide = Slide::where('enable',1)->get();

        
        return view('user.trangchu',compact('promotion','prohighLight','slide'));
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

        // khi khách hàng đăng nhập rồi
        if(Auth::id()){
            $id = Auth::id();
            $user = User::find($id);
            return view('cart.home',compact('content','total','user'));
        }
        // khi khách hàng chưa đăng nhập
        else
        {
            return view('cart.home',compact('content','total'));
        }
        
    }
    
}
