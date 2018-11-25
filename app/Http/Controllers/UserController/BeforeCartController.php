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
    public function getViewProduct($id)
    {	
    	// need to change the id of the idCategoryProduct
    	$cateGroup = DB::table('category_group')->where('enable',1)->get();
    	$cateProduct = DB::table('category_product')->where('enable',1)->get();
    	$products = DB::table('product')->where([['idCategoryProduct','=',$id],['enable','=', 1]])->get();
    	$dirName = DB::table('category_product')->where('id',$id)->get();
    	return view('user/tatcasanpham',compact('products','cateGroup',
    		'cateProduct','dirName'));
    }

    public function viewDetailProduct($id){
    	$product = DB::table('product')->where('id',$id)->get();
    	return view('user/chitietsanpham',compact('product'));
    }
    
}
