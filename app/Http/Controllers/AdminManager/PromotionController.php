<?php
namespace App\Http\Controllers\AdminManager;
use App\Http\Requests\PromotionRequest;
use Illuminate\Http\Request;
use App\Promotion; 
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
class PromotionController extends Controller
{
    public function getList()
    {
        $prom = Promotion::all();
        return view('admin.promotion.list',compact('prom'));
    }

    /*-------------- Add new ------------------------------*/
    public function getAdd()
    {        
        return view('admin.promotion.add');
    }

    public function createArrayData(Promotion $prom)
    {
        $actor = array(
            'id' => Auth('admin')->user()->id,
            'name' => Auth('admin')->user()->name,
            'phone' => Auth('admin')->user()->phone,
            'date' => date("d-m-Y H:i:s"),
        );

        $data = array(            
            'name' => $prom->name,
            'status' => $prom->enable,
            'per_decr' => $prom->per_decr, 
            'start_date_sale' =>  date ("d-m-Y H:i:s", strtotime($prom->start_date_sale)), 
            'end_date_sale' => date ("d-m-Y H:i:s", strtotime($prom->start_date_sale)),
            'image' => $prom->image, 

        );
        $temp = array(
            'actor' => $actor, 
            'data' => $data,
        );
        $result = array();
        array_push($result, $temp);
            
        return $result;
    }

    public function postAdd(PromotionRequest $req)
    {
        $prom = new Promotion;
        $prom->name = $req->Ten;
        $prom->per_decr = $req->per_decr;
        $prom->start_date_sale = date ("Y-m-d H:i:s", strtotime($req->start_date_sale));
        $prom->end_date_sale = date ("Y-m-d H:i:s", strtotime($req->end_date_sale));
        $prom->image = $req->image;
        // $prom->idPromotion = 1;
        $prom->enable = $req->enable;

        $arrayData = $this->createArrayData($prom);    
        $arrayData = json_encode($arrayData);
        
        $prom->history = $arrayData;
        $prom->save();
        return redirect('admin/promotion/add')->with('thongbao','Thêm thành công!');
    }

    /*---------------Edit Item ----------------------------------*/
    public function getEdit($id)
    {
        $prom = Promotion::find($id); 

        return view('admin.promotion.edit',compact('prom'));
    }

    public function editArrayData(Promotion $prom)
    {
        $actor = array(
            'id' => Auth('admin')->user()->id,
            'name' => Auth('admin')->user()->name,
            'phone' => Auth('admin')->user()->phone,
            'date' => date("d-m-Y H:i:s"),
        );

        $data = array(            
            'name' => $prom->name,
            'status' => $prom->enable,
            'per_decr' => $prom->per_decr, 
            'start_date_sale' =>  date ("d-m-Y H:i:s", strtotime($prom->start_date_sale)), 
            'end_date_sale' => date ("d-m-Y H:i:s", strtotime($prom->start_date_sale)),
            'image' => $prom->image,            
        );
        $temp = array(
            'actor' => $actor, 
            'data' => $data,
        );                   
        return $temp;
    }

    public function postEdit(PromotionRequest $req,$id)
    {
        $prom = promotion::find($id);
        $prom->name = $req->Ten;
        $prom->enable = $req->enable;
        $prom->per_decr = $req->per_decr;
        $prom->start_date_sale = date ("Y-m-d H:i:s", strtotime($req->start_date_sale));
        $prom->end_date_sale = date ("Y-m-d H:i:s", strtotime($req->end_date_sale));
        $prom->image = $req->image;

        $oldData = json_decode($prom->history, true);
        
        $newData = $this->editArrayData($prom);
        array_push($oldData, $newData);
        $oldData = json_encode($oldData);

        $prom->history = $oldData;
        $prom->save();
       
        return redirect('admin/promotion/edit/'.$id)->with('thongbao','Sửa thành công!');
    }
    public function getDelete($id)
    {
        $catePro= promotion::find($id);
        try {
            $check = $catePro->delete();
            if(!$check)
                throw new QueryException;
        } catch (QueryException $e) {
            return redirect('admin/promotion/list')->with('loi','Không thể xóa!');
        }
        
        return redirect('admin/promotion/list')->with('thongbao','Xóa thành công!');
    }


    public function getHistory($id)
    {
        $cate= Promotion::find($id);
        $data =  json_decode($cate->history, true);
        $flag = true;
        foreach ($data as $key => $value) { 
            if($flag == true){
                $thaotac = "<td style='color: blue'>Tạo mới</td>";
            } else{
                $thaotac = "<td style='color: green'>Chỉnh sửa</td>";
            }      
            if($value['data']['status'] == 1){
                $trangthai = "<td style='color: blue'>Đang hoạt động...</td>";
            } else{
                $trangthai = "<td style='color: red'>Ngưng hoạt động</td>";
            }   
            echo "<tr class='odd gradeX' align='center'>
                        <td>".$value['actor']['id']."</td>
                        <td style='font-weight: bold;'>".$value['actor']['name']."</td>          
                        <td>".$value['actor']['phone']."</td>
                        ".$thaotac."           
                        <td>".$value['data']['name']."</td>
                        <td>".$value['data']['per_decr']."</td>
                        <td>".$value['data']['start_date_sale']."</td>
                        <td>".$value['data']['end_date_sale']."</td>
                        <td>
                            <a target='_blank' href='".$value['data']['image']."'>
                              <img class='img-avatar' src='".$value['data']['image']."'> <i class='fa fa-external-link' aria-hidden='true'></i>
                            </a>                            
                        </td>
                        ".$trangthai."   
                        <td>".$value['actor']['date']."</td>               
                    </tr>";
            $flag = false; 
        }      
    }
}
