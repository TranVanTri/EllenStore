<?php
namespace App\Http\Controllers;
use App\Http\Requests\CategoryGroupRequest;
use Illuminate\Http\Request;

use App\CategoryGroup;
use App\CategoryProduct;
use Illuminate\Database\QueryException;
class CategoryGroupController extends Controller
{
    public function getList()
    {
        $cateGroup = CategoryGroup::all();
        return view('admin.categorygroup.list',compact('cateGroup'));
    }
    public function getAdd()
    {
        $cateGroup = CategoryGroup::all();
        return view('admin.categorygroup.add',compact('cateGroup'));
    }
    public function postAdd(CategoryGroupRequest $req)
    {
        $cateGroup = new CategoryGroup;
        $cateGroup->name = $req->Ten;

        $cateGroup->save();
       
        return redirect('admin/categorygroup/add')->with('thongbao','Thêm thành công!');
    }
    public function getEdit($id)
    {
        $cateGroup = CategoryGroup::find($id);

        return view('admin.categorygroup.edit',compact('cateGroup'));
    }
    public function postEdit(CategoryGroupRequest $req,$id)
    {
        $cate = CategoryGroup::find($id);
        $cate->name = $req->Ten;
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
}
