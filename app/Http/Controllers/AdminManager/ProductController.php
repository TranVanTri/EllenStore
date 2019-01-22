<?php
namespace App\Http\Controllers\AdminManager;
use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;
use App\Product;
use App\Promotion;
use App\Size;
use App\CategoryProduct; 
use Illuminate\Database\QueryException;
use App\Http\Controllers\Controller;
class ProductController extends Controller
{
    public function getList()
    {
        $product = Product::all();
        return view('admin.product.list',compact('product'));
    }
    public function getAdd()
    {
        $danhmuc = CategoryProduct::where('enable',1)->get();
        $sizes = Size::all();
        $promotions = Promotion::all();
        return view('admin.product.add',compact('danhmuc','sizes','promotions'));
    }

    public function createArrayData(Product $pro)
    {
        $actor = array(
            'id' => Auth('admin')->user()->id,
            'name' => Auth('admin')->user()->name,
            'phone' => Auth('admin')->user()->phone,
            'date' => date("d-m-Y H:i:s"),
        );

        $sizename = array();
        foreach ($pro->sizes as $value) {
            array_push($sizename, $value->name);
        }
        $data = array(            
            'name' => $pro->name,
            'status' => $pro->enable,  
            'price' => $pro->price,
            // 'sale' => $pro->sale,          

            'quantity' => $pro->quantity,
            'avatar' => $pro->avatar,
            'describe' => $pro->describe,
            'detail' => $pro->detail,
            'highLight' => $pro->highLight,
            'idcategoryproduct' => $pro->idCategoryProduct,
            'namecategoryproduct' => $pro->category_product->name,
            'idPromotion' => $pro->idPromotion,
            'namePromotion' => $pro->promotion->name,
            'per_decr' => $pro->promotion->per_decr, 
            'size' => $sizename,

            'otherImg' => $pro->otherImg,            
        );
        $temp = array(
            'actor' => $actor, 
            'data' => $data,
        );
        $result = array();
        array_push($result, $temp);
            
        return $result;
    }

    public function postAdd(ProductRequest $req)
    {
        $product = new Product;
        $product->name = $req->name;
        $product->price=$req->price;

        //$product->sale=$req->sale;  
        $product->idPromotion = $req->idPromotion;
        $product->quantity=$req->quantity;
        
        $product->describe=$req->describe;
        $product->detail=$req->detail;
        $product->highLight=$req->highLight;
        $product->idCategoryProduct=$req->idCategoryProduct;  
        $product->enable=$req->enable;                   
        $otherimg = $req->otherimg;
        $dulieuOtherimg= array();
        foreach ($otherimg as $value) {
             array_push($dulieuOtherimg, $value);
        }
        $product->avatar=$dulieuOtherimg[0];
       // var_dump( $dulieujson);
        $dulieuOtherimg = json_encode($dulieuOtherimg);

        $product->otherImg = $dulieuOtherimg;       
        
        $product->save();
        $product->sizes()->attach($req->size);

        $arrayData = $this->createArrayData($product);    
        
        $arrayData = json_encode($arrayData);
        
        $product->history = $arrayData;
        $product->save();
        return redirect('admin/product/add')->with('thongbao','Thêm thành công!');
    }
    public function getEdit($id)
    {
        $danhmuc = CategoryProduct::all();
        $product = Product::find($id);
        $otherimg = json_decode($product->otherImg);
        $sizes = Size::all();
        $promotions = Promotion::all();
        return view('admin.product.edit',compact('danhmuc','product','otherimg', 'sizes','promotions'));
    }

    public function editArrayData(Product $pro)
    {
        $actor = array(
            'id' => Auth('admin')->user()->id,
            'name' => Auth('admin')->user()->name,
            'phone' => Auth('admin')->user()->phone,
            'date' => date("d-m-Y H:i:s"),
        );

        $sizename = array();
        foreach ($pro->sizes as $value) {
            array_push($sizename, $value->name);
        }

        $data = array(            
            'name' => $pro->name,
            'status' => $pro->enable,  
            'price' => $pro->price,
            // 'sale' => $pro->sale,            
            'quantity' => $pro->quantity,
            'avatar' => $pro->avatar,
            'describe' => $pro->describe,
            'detail' => $pro->detail,
            'highLight' => $pro->highLight,
            'idcategoryproduct' => $pro->idCategoryProduct,
            'namecategoryproduct' => $pro->category_product->name,
            'idPromotion' => $pro->idPromotion,
            'namePromotion' => $pro->promotion->name,
            'per_decr' => $pro->promotion->per_decr,
            'size' => $sizename,
            'otherImg' => $pro->otherImg,        
        );
        $temp = array(
            'actor' => $actor, 
            'data' => $data,
        );                   
        return $temp;
    }



    public function postEdit(ProductRequest $req,$id)
    {
        $product = Product::find($id);
        $product->name = $req->name;
        $product->price=$req->price;

        // $product->sale=$req->sale;        
        $product->idPromotion = $req->idPromotion;
        $product->quantity=$req->quantity;
        
        $product->describe=$req->describe;
        $product->detail=$req->detail;
        $product->highLight=$req->highLight;
        $product->idCategoryProduct=$req->idCategoryProduct;    
        $product->enable=$req->enable;    
        $otherimg = $req->otherimg;
    

        $dulieujson= array();
        foreach ($otherimg as $value) {
             array_push($dulieujson, $value);
        }
        $product->avatar=$dulieujson[0];
        $dulieujson = json_encode($dulieujson);
        $product->otherImg = $dulieujson;

        $product->sizes()->detach();
        $product->sizes()->attach($req->size);


        $oldData = json_decode($product->history, true);
        
        $newData = $this->editArrayData($product);
        array_push($oldData, $newData);
        $oldData = json_encode($oldData);

        $product->history = $oldData;

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

    public function getHistory($id)
    {
        $pro= Product::find($id);
        $data =  json_decode($pro->history, true);
        $flag = true;
        foreach ($data as $key => $value) { 
            if($flag == true){
                $thaotac = "<td style='color: blue'>Tạo mới</td>";
            } else{
                $thaotac = "<td style='color: green'>Chỉnh sửa</td>";
            }      
            if($value['data']['status'] == 1){
                $status = "<td style='color: blue'>Đang bán</td>";
            } else{
                $status = "<td style='color: red'>Ngưng bán</td>";
            }  
            if($value['data']['highLight'] == 1){
                $highLight = "<td style='color: blue'>Nổi bật</td>";
            } else{
                $highLight = "<td style='color: red'>Không</td>";
            } 

            //Xử lý size chuyên json ->array
            $size = $value['data']['size'];
            
            $dl='';
            
            foreach ($size as $val) {
                if($val === end($size)){//kiểm tra là phần tử cuối cùng chưa
                    $dl .=$val;
                }else{
                    $dl .=$val.', ';
                }                                        
            } 
            echo "<tr class='odd gradeX' align='center'>
                        <td>".$value['actor']['id']."</td>
                        <td style='font-weight: bold;'>".$value['actor']['name']."</td>          
                        <td>".$value['actor']['phone']."</td>
                        ".$thaotac."           
                        <td>".$value['data']['name']."</td>
                        <td>".$value['data']['price']."</td>                        
                        <td>".$value['data']['namePromotion']."</td>                        
                        <td>".$value['data']['per_decr']."</td>                        
                        <td>".$dl."</td>                        
                        <td>".$value['data']['quantity']."</td>
                        <td>
                            <a target='_blank' href='".$value['data']['avatar']."'>
                              <img class='img-avatar' src='".$value['data']['avatar']."'> <i class='fa fa-external-link' aria-hidden='true'></i>
                            </a>                            
                        </td>
                        ".$status."
                        ".$highLight."                        
                        <td>".$value['data']['namecategoryproduct']."</td>
                        <td>".$value['actor']['date']."</td>               
                    </tr>";
            $flag = false; 
        }      
    }

   

}
