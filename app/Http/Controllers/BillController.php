<?php

namespace App\Http\Controllers;

use App\Http\Requests\BillRequest;
use Illuminate\Http\Request;

use App\Bill;
use App\BillDetail;
use App\User;



class BillController extends Controller
{
    public function getList()
    {
    	$bills = Bill::all();
    	return view('admin.bill.list',compact('bills'));
    }

    // public function getAdd()
    // {
    //     $danhmuc = CategoryProduct::all();
    // 	return view('admin.product.add',compact('danhmuc'));
    // }
    // public function postAdd(Request $req)
    // {
    //     $product = new Product;
    //     $product->name = $req->name;
    //     $product->price=$req->price;
    //     $product->sale=$req->sale;
    //     $product->size=$req->size;
    //     $product->color=$req->color;
    //     $product->avatar=$req->avatar;
    //     $product->describe=$req->describe;
    //     $product->detail=$req->detail;
    //     $product->highLight=$req->highLight;
    //     $product->idCategoryProduct=$req->idCategoryProduct;
        
    //     $otherimg = $req->otherimg;
    //     $dulieujson= array();
    //     foreach ($otherimg as $value) {
    //          array_push($dulieujson, $value);
    //     }
    //     var_dump( $dulieujson);
    //     $dulieujson = json_encode($dulieujson);
    //     $product->otherImg = $dulieujson;
    //     $product->save();
       
    //     return redirect('admin/product/add')->with('thongbao','Thêm thành công!');

    // }

    public function getEdit($id)   
    {        
        $bill = Bill::find($id);
        $billdetail = BillDetail::select('idProduct','quantity')->where('idBill',$id)->get();
        return view('admin.bill.edit',compact('bill','billdetail'));
    }
    public function postEdit(BillRequest $req,$id)
    {
        $bill = Bill::find($id);
        $bill->email= $req->email;
        $bill->phone= $req->phone;
        $bill->addRess= $req->addRess;
        $bill->billStatus= $req->billStatus;
        $bill->save();
       
        return redirect('admin/bill/edit/'.$id)->with('thongbao','Sửa thành công!');

    }

    public function getBillDetail($id)
    {
        $billdetail = BillDetail::select('idProduct','quantity')->where('idBill',$id)->get();
        foreach ($billdetail as $bd) {
            echo "<strong style='color: #337ab7;'>Sản phẩm: </strong>".$bd->product->name." -<strong style='color: #337ab7;'>Số lượng: </strong>".$bd->quantity."</br>";
        }
    }

    // public function getDelete($id)
    // {
    //     $product= Product::find($id);
    //     try {
    //         $check = $product->delete();
    //         if(!$check)
    //             throw new QueryException;
    //     } catch (QueryException $e) {
    //         return redirect('admin/product/list')->with('loixoa','Không thể xóa thể loại này!');
    //     }
        
    //     return redirect('admin/product/list')->with('thongbao','Xóa thành công!');
    // }

}
