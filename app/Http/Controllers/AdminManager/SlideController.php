<?php
namespace App\Http\Controllers\AdminManager;
use App\Http\Requests\SlideRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Slide;
use Illuminate\Database\QueryException;
class SlideController extends Controller
{
    public function getList()
    {
        $slides = Slide::all();
        return view('admin.slide.list',compact('slides'));
    }
    public function getAdd()
    {    
        return view('admin.slide.add');
    }

    public function createArrayData(Slide $slide)
    {
        $actor = array(
            'id' => Auth('admin')->user()->id,
            'name' => Auth('admin')->user()->name,
            'phone' => Auth('admin')->user()->phone,
            'date' => date("d-m-Y H:i:s"),
        );

        $data = array(            
            'title' => $slide->title,
            'link' => $slide->link,
            'image' => $slide->image,            
            'status' => $slide->enable,            
        );
        $temp = array(
            'actor' => $actor, 
            'data' => $data,
        );
        $result = array();
        array_push($result, $temp);
            
        return $result;
    }


    public function postAdd(SlideRequest $req)
    {
        $slide = new Slide;
        $slide->title = $req->tieude;
        $slide->link = $req->link;
        $slide->image = $req->image;
        $slide->enable = $req->enable;

        $arrayData = $this->createArrayData($slide);        
        $arrayData = json_encode($arrayData);

        $slide->history = $arrayData;

        $slide->save();
       
        return redirect('admin/slide/add')->with('thongbao','Thêm thành công!');
    }
    public function getEdit($id)
    {
        $slide = Slide::find($id);

        return view('admin.slide.edit',compact('slide'));
    }

    public function editArrayData(Slide $slide)
    {
        $actor = array(
            'id' => Auth('admin')->user()->id,
            'name' => Auth('admin')->user()->name,
            'phone' => Auth('admin')->user()->phone,
            'date' => date("d-m-Y H:i:s"),
        );

        $data = array(            
            'title' => $slide->title,
            'link' => $slide->link,
            'image' => $slide->image,            
            'status' => $slide->enable,            
        );
        $temp = array(
            'actor' => $actor, 
            'data' => $data,
        );                   
        return $temp;
    }


    public function postEdit(SlideRequest $req, $id)
    {
        $slide = Slide::find($id);
        $slide->title = $req->tieude;
        $slide->link = $req->link;
        $slide->image = $req->image;
        $slide->enable = $req->enable;

        $oldData = json_decode($slide->history, true);
        
        $newData = $this->editArrayData($slide);
        array_push($oldData, $newData);
        $oldData = json_encode($oldData);

        $slide->history = $oldData;

        $slide->save();       
        return redirect('admin/slide/edit/'.$id)->with('thongbao','Sửa thành công!');
    }
    public function getDelete($id)
    {
        $slide= Slide::find($id);
        try {
            $check = $slide->delete();
            if(!$check)
                throw new QueryException;
        } catch (QueryException $e) {
            return redirect('admin/slide/list')->with('loi','Không thể xóa!');
        }
        
        return redirect('admin/slide/list')->with('thongbao','Xóa thành công!');
    }

    public function getHistory($id)
    {
        $slide= Slide::find($id);
        $data =  json_decode($slide->history, true);
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
                        <td>".$value['data']['title']."</td>
                        <td>".$value['data']['link']."</td>
                        <td>
                            <a target='_blank' href='".$value['data']['image']."'>
                                <img class='img-avatar' src='".$value['data']['image']."' alt='".$value['data']['title']."'> <i class='fa fa-external-link' aria-hidden='true'></i>
                            </a>  
                        </td>
                        ".$temp2."   
                        <td>".$value['actor']['date']."</td>               
                    </tr>";
            $flag = false; 
        }      
    }
}
