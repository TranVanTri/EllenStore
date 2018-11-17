<?php
namespace App\Http\Controllers;
use App\Http\Requests\SlideRequest;
use Illuminate\Http\Request;

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
    public function postAdd(SlideRequest $req)
    {
        $slide = new Slide;
        $slide->title = $req->tieude;
        $slide->des = $req->des;
        $slide->image = $req->img;
        $slide->save();
       
        return redirect('admin/slide/add')->with('thongbao','Thêm thành công!');
    }
    public function getEdit($id)
    {
        $slide = Slide::find($id);

        return view('admin.slide.edit',compact('slide'));
    }
    public function postEdit(SlideRequest $req, $id)
    {
        $slide = Slide::find($id);
        $slide->title = $req->tieude;
        $slide->des = $req->des;
        $slide->image = $req->img;
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
}
