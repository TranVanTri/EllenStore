<?php
namespace App\Http\Controllers\AdminManager;
use App\Http\Requests\AdminEditRequest;
use Illuminate\Http\Request;
use App\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
class AdminController extends Controller
{   
    /*---------------Edit Item ----------------------------------*/
    public function getEdit($id)
    {
        $admin = Admin::find($id);        
        return view('admin.admininfo.edit',compact('admin'));
    }
    public function postEdit(AdminEditRequest $req, $id)
    {
        $admin = Admin::find($id);        
        $admin->name = $req->Ten;
        if($req->changepass == "on"){
           $admin->password = bcrypt($req->Password);
        }
        $admin->address = $req->DiaChi;
        $admin->phone = $req->SoDT;
        $admin->save();
       
        return redirect('admin/edit/'.$id)->with('thongbao','Sửa thành công!');
    }
    
}
