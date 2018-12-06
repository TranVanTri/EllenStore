<?php
namespace App\Http\Controllers\AdminManager;
use App\Http\Requests\SizeRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Size;
use Illuminate\Database\QueryException;
use Auth;
class SizeController extends Controller
{
    public function getList()
    {
        $sizes = Size::all();
        return view('admin.size.list',compact('sizes'));
    }
    public function getAdd()
    {
        return view('admin.size.add');
    }

    public function createArrayData(Size $size)
    {
        $actor = array(
            'id' => Auth('admin')->user()->id,
            'name' => Auth('admin')->user()->name,
            'phone' => Auth('admin')->user()->phone,
            'date' => date("d-m-Y H:i:s"),
        );

        $data = array(            
            'name' => $size->name,          
        );
        $temp = array(
            'actor' => $actor, 
            'data' => $data,
        );
        $result = array();
        array_push($result, $temp);
            
        return $result;
    }
    public function postAdd(SizeRequest $req)
    {
        $size = new Size;
        $size->name = $req->Ten;

        $arrayData = $this->createArrayData($size);
        $arrayData = json_encode($arrayData);

        $size->history = $arrayData;
        $size->save();              
        return redirect('admin/size/add')->with('thongbao','Thêm thành công!');
    }
    public function getEdit($id)
    {
        $size = Size::find($id);

        return view('admin.size.edit',compact('size'));
    }

    public function editArrayData(Size $size)
    {
        $actor = array(
            'id' => Auth('admin')->user()->id,
            'name' => Auth('admin')->user()->name,
            'phone' => Auth('admin')->user()->phone,
            'date' => date("d-m-Y H:i:s"),
        );

        $data = array(            
            'name' => $size->name,          
        );
        $temp = array(
            'actor' => $actor, 
            'data' => $data,
        );                   
        return $temp;
    }
    public function postEdit(SizeRequest $req,$id)
    {
        $size = Size::find($id);
        $size->name = $req->Ten;
        $oldData = json_decode($size->history, true);
        
        $newData = $this->editArrayData($size);
        array_push($oldData, $newData);
        $oldData = json_encode($oldData);

        $size->history = $oldData;
        $size->save();       
        return redirect('admin/size/edit/'.$id)->with('thongbao','Sửa thành công!');
    }
    public function getDelete($id)
    {
        $size= Size::find($id);
        try {
            $check = $size->delete();
            if(!$check)
                throw new QueryException;
        } catch (QueryException $e) {
            return redirect('admin/size/list')->with('loi','Không thể xóa!');
        }
        
        return redirect('admin/size/list')->with('thongbao','Xóa thành công!');
    }

    public function getHistory($id)
    {
        $size= Size::find($id);
        $data =  json_decode($size->history, true);
        $flag = true;
        foreach ($data as $key => $value) { 
            if($flag == true){
                $temp = "<td style='color: blue'>Tạo mới</td>";
            } else{
                $temp = "<td style='color: green'>Chỉnh sửa</td>";
            }      
            
            echo "<tr class='odd gradeX' align='center'>
                        <td>".$value['actor']['id']."</td>
                        <td style='font-weight: bold;'>".$value['actor']['name']."</td>          
                        <td>".$value['actor']['phone']."</td>
                        ".$temp."           
                        <td>".$value['data']['name']."</td>                           
                        <td>".$value['actor']['date']."</td>               
                    </tr>";
            $flag = false; 
        }      
    }
}
