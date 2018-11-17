<?php
namespace App\Http\Controllers;
use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;
use App\Product;
use App\CategoryProduct;
use Illuminate\Database\QueryException;
class ProductController extends Controller
{
    public function getList()
    {
        $product = Product::all();
        return view('admin.product.list',compact('product'));
    }
    public function getAdd()
    {
        $danhmuc = CategoryProduct::all();
        return view('admin.product.add',compact('danhmuc'));
    }
    public function postAdd(ProductRequest $req)
    {
        $product = new Product;
        $product->name = $req->name;
        $product->price=$req->price;
        $product->sale=$req->sale;      
        $product->color=$req->color;
        $product->avatar=$req->avatar;
        $product->describe=$req->describe;
        $product->detail=$req->detail;
        $product->highLight=$req->highLight;
        $product->idCategoryProduct=$req->idCategoryProduct;  
        $product->enable=$req->enable;      
        if ($req->has('size')) {
            $size = $req->size;  
            $dulieuSize= array();          
            foreach ($size as $value) {
                 array_push($dulieuSize, $value);
            }
            $dulieuSize = json_encode($dulieuSize);
            //var_dump( $dulieuSize);
            $product->size = $dulieuSize;
        }else {
            $product->size = "Chưa nhập";
        }

        
        $otherimg = $req->otherimg;
        $dulieuOtherimg= array();
        foreach ($otherimg as $value) {
             array_push($dulieuOtherimg, $value);
        }
       // var_dump( $dulieujson);
        $dulieuOtherimg = json_encode($dulieuOtherimg);
        $product->otherImg = $dulieuOtherimg;
        $product->save();
       
        return redirect('admin/product/add')->with('thongbao','Thêm thành công!');
    }
    public function getEdit($id)
    {
        $danhmuc = CategoryProduct::all();
        $product = Product::find($id);
        $otherimg = json_decode($product->otherImg);
       
        return view('admin.product.edit',compact('danhmuc','product','otherimg'));
    }
    public function postEdit(ProductRequest $req,$id)
    {
        $product = Product::find($id);
        $product->name = $req->name;
        $product->price=$req->price;
        $product->sale=$req->sale;
        $product->color=$req->color;
        $product->avatar=$req->avatar;
        $product->describe=$req->describe;
        $product->detail=$req->detail;
        $product->highLight=$req->highLight;
        $product->idCategoryProduct=$req->idCategoryProduct;    
        $product->enable=$req->enable;    
        $otherimg = $req->otherimg;
        if ($req->has('size')) {
            $size = $req->size;  
            $dulieuSize= array();          
            foreach ($size as $value) {
                 array_push($dulieuSize, $value);
            }
            $dulieuSize = json_encode($dulieuSize);
            //var_dump( $dulieuSize);
            $product->size = $dulieuSize;
        }else {
            $product->size = "Chưa nhập";
        }

        $dulieujson= array();
        foreach ($otherimg as $value) {
             array_push($dulieujson, $value);
        }
       // var_dump( $dulieujson);
        $dulieujson = json_encode($dulieujson);
        $product->otherImg = $dulieujson;
        $product->save();
       
        return redirect('admin/product/edit/'.$id)->with('thongbao','Sửa thành công!');
    }
    public function getDelete($id)
    {
        $product= Product::find($id);
        try {
            $check = $product->delete();
            if(!$check)
                throw new QueryException;
        } catch (QueryException $e) {
            return redirect('admin/product/list')->with('loi','Không thể xóa!');
        }
        
        return redirect('admin/product/list')->with('thongbao','Xóa thành công!');
    }
}
