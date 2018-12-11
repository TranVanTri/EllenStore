<?php
namespace App\Http\Controllers\AdminManager;
use App\Http\Requests\CategoryGroupRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CategoryGroup;

use Illuminate\Database\QueryException;
use Auth;
class CategoryGroupController extends Controller
{
    public function getList()
    {
        $cateGroup = CategoryGroup::all();
        return view('admin.categorygroup.list',compact('cateGroup'));
    }
    public function getAdd()
    {
        return view('admin.categorygroup.add');
    }


    public function createArrayData(CategoryGroup $cate)
    {
        $actor = array(
            'id' => Auth('admin')->user()->id,
            'name' => Auth('admin')->user()->name,
            'phone' => Auth('admin')->user()->phone,
            'date' => date("d-m-Y H:i:s"),
        );

        $data = array(            
            'name' => $cate->name,
            'status' => $cate->enable,            
        );
        $temp = array(
            'actor' => $actor, 
            'data' => $data,
        );
        $result = array();
        array_push($result, $temp);
            
        return $result;
    }
    public function postAdd(CategoryGroupRequest $req)
    {
        $cateGroup = new CategoryGroup;
        $cateGroup->name = $req->Ten;
        $cateGroup->enable = $req->enable;

        $arrayData = $this->createArrayData($cateGroup);
        $arrayData = json_encode($arrayData);

        $cateGroup->history = $arrayData;
        $cateGroup->save();              
        return redirect('admin/categorygroup/add')->with('thongbao','Thêm thành công!');
    }
    public function getEdit($id)
    {
        $cateGroup = CategoryGroup::find($id);

        return view('admin.categorygroup.edit',compact('cateGroup'));
    }

    public function editArrayData(CategoryGroup $cate)
    {
        $actor = array(
            'id' => Auth('admin')->user()->id,
            'name' => Auth('admin')->user()->name,
            'phone' => Auth('admin')->user()->phone,
            'date' => date("d-m-Y H:i:s"),
        );

        $data = array(            
            'name' => $cate->name,
            'status' => $cate->enable,            
        );
        $temp = array(
            'actor' => $actor, 
            'data' => $data,
        );                   
        return $temp;
    }
    public function postEdit(CategoryGroupRequest $req,$id)
    {
        $cate = CategoryGroup::find($id);
        $cate->name = $req->Ten;
        $cate->enable = $req->enable;
        $oldData = json_decode($cate->history, true);
        
        $newData = $this->editArrayData($cate);
        array_push($oldData, $newData);
        $oldData = json_encode($oldData);

        $cate->history = $oldData;
        $cate->save();       
        return redirect('admin/categorygroup/edit/'.$id)->with('thongbao','Sửa thành công!');
    }
    public function getDelete($id)
    {
        $cate= CategoryGroup::find($id);
        try {
            $check = $cate->delete();
            if(!$check)
                throw new QueryException;
        } catch (QueryException $e) {
            return redirect('admin/categorygroup/list')->with('loi','Không thể xóa!');
        }
        
        return redirect('admin/categorygroup/list')->with('thongbao','Xóa thành công!');
    }

    public function getHistory($id)
    {
        $cate= CategoryGroup::find($id);
        $data =  json_decode($cate->history, true);
        $flag = true;
        foreach ($data as $key => $value) { 
            if($flag == true){
                $temp = "<td style='color: blue'>Tạo mới</td>";
            } else{
                $temp = "<td style='color: green'>Chỉnh sửa</td>";
            }      
            if($value['data']['status'] == 1){
                $temp2 = "<td style='color: blue'>Đang hoạt động...</td>";
            } else{
                $temp2 = "<td style='color: red'>Ngưng hoạt động</td>";
            }   
            echo "<tr class='odd gradeX' align='center'>
                        <td>".$value['actor']['id']."</td>
                        <td style='font-weight: bold;'>".$value['actor']['name']."</td>          
                        <td>".$value['actor']['phone']."</td>
                        ".$temp."           
                        <td>".$value['data']['name']."</td>
                        ".$temp2."   
                        <td>".$value['actor']['date']."</td>               
                    </tr>";
            $flag = false; 
        }      
    }
}
