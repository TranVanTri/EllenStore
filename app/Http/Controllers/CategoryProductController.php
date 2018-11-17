<?php
namespace App\Http\Controllers;
use App\Http\Requests\CategoryProductRequest;
use Illuminate\Http\Request;
use App\CategoryGroup;
use App\CategoryProduct;
use Illuminate\Database\QueryException;
class CategoryProductController extends Controller
{
    public function getList()
    {
        $catePro = CategoryProduct::all();
        return view('admin.categoryproduct.list',compact('catePro'));
    }

    /*-------------- Add new ------------------------------*/
    public function getAdd()
    {
        $catePro = CategoryProduct::all();
        $cateGroup = CategoryGroup::all();  
        return view('admin.categoryproduct.add',compact('catePro','cateGroup'));
    }
    public function postAdd(CategoryProductRequest $req)
    {
        $catePro = new CategoryProduct;
        $catePro->name = $req->Ten;
        $catePro->idCategoryGroup = $req->NhomDanhMuc;
        $catePro->save();
       
        return redirect('admin/categoryproduct/add')->with('thongbao','Thêm thành công!');
    }

    /*---------------Edit Item ----------------------------------*/
    public function getEdit($id)
    {
        $catePro = CategoryProduct::find($id);
        $cateGroup = CategoryGroup::all();

        return view('admin.categoryproduct.edit',compact('catePro','cateGroup'));
    }
    public function postEdit(CategoryProductRequest $req,$id)
    {
        $catePro = CategoryProduct::find($id);
        $catePro->name = $req->Ten;
        $catePro->idCategoryGroup = $req->NhomDanhMuc;
        $catePro->save();
       
        return redirect('admin/categoryproduct/edit/'.$id)->with('thongbao','Sửa thành công!');
    }
    public function getDelete($id)
    {
        $catePro= CategoryProduct::find($id);
        try {
            $check = $catePro->delete();
            if(!$check)
                throw new QueryException;
        } catch (QueryException $e) {
            return redirect('admin/categoryproduct/list')->with('loi','Không thể xóa!');
        }
        
        return redirect('admin/categoryproduct/list')->with('thongbao','Xóa thành công!');
    }
}
