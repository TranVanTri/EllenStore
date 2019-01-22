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
use App\WatchList;
use Illuminate\Database\QueryException;
use App\Http\Controllers\Controller;
use Auth;
class BeforeCartController extends Controller
{

    public function getTrangChu(){
        $prohighLight = Product::where([['enable',1], ['highLight',1]])->get();
        $promotion = Promotion::where('enable',1)->get();
        $slide = Slide::where('enable',1)->get();
        $idProBuyMany = DB::select('select bill_detail.idProduct as id from product, bill_detail where product.id = bill_detail.idProduct and ((select count(bill_detail.idProduct) from bill_detail) >= ?) group by bill_detail.idProduct', [4]);
        $arrayid = array();
        foreach($idProBuyMany as $key){
            array_push($arrayid, $key->id);
        }
        $productBuyMany = Product::find($arrayid);     
       
        return view('user.trangchu',compact('promotion','prohighLight','slide','productBuyMany'));
    }

    public function getViewProduct($name, $id)
    {	
    	// need to change the id of the idCategoryProduct
    	
    	$products = Product::where([['idCategoryProduct','=',$id],['enable','=', 1]])->paginate(9);

        // get the Name of the Category_Product
    	$dirName = CategoryProduct::where('id',$id)->get();

    	return view('user/tatcasanpham',compact('products', 'dirName'));
    }

    public function getViewProductPromotion($name, $id)
    {   
        
        
        $products = Product::where([['idPromotion','=',$id],['enable','=', 1]])->paginate(9);

        
        $dirName = Promotion::where('id',$id)->get();

        return view('user/tatcasanpham',compact('products', 'dirName'));
    }

    public function getAllPromotion()//lấy tất cả san phẩm khuyến mãi
    {   
        
        $products = Product::join('promotion', 'promotion.id', '=', 'product.idPromotion')->where([['promotion.enable','=', 1],['product.enable','=', 1]])->paginate(9);

       
        $dirName = 'Sản phẩm khuyến mãi';

        return view('user/tatcasanpham',compact('products', 'dirName'));
    }

    public function getAllProduct()
    {   
        
        $products = Product::where('enable','=', 1)->paginate(9);

      
        $dirName = 'Tất cả sản phẩm';
        
        return view('user/tatcasanpham',compact('products', 'dirName'));
    }

    public function getPriceSort($name)
    {   
        $dirName = 'Tất cả sản phẩm';
        switch($name){
            case 'smaller':
                $products = Product::where([['price','<',200000],['enable','=', 1]])->paginate(9);
                return view('user/tatcasanpham',compact('products', 'dirName'));
            case 'both':
                $products = Product::where([['price','>=',200000], ['price','<=',300000], ['enable','=', 1]])->paginate(9);
                return view('user/tatcasanpham',compact('products', 'dirName'));
            case 'bigger':
                $products = Product::where([['price','>',300000],['enable','=', 1]])->paginate(9);
                return view('user/tatcasanpham',compact('products', 'dirName'));
            default:
                return redirect()->back();
        }        

        return view('user/tatcasanpham',compact('products', 'dirName'));
    }




    public function viewDetailProduct($name, $id){
    	$product = Product::find($id);

        $randomProducts=Product::all()->random(5);

    	return view('user/chitietsanpham',compact('product','randomProducts'));
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

    public function chuyendengiohang(){
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
    }
    
}
