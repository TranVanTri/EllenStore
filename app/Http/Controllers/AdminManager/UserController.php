<?php
namespace App\Http\Controllers\AdminManager;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserEditRequest;
use App\Http\Requests\UserLoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
class UserController extends Controller
{
    public function getList()
    {
        $user = User::all();
        return view('admin.user.list',compact('user'));
    }

    /*-------------- Add new ------------------------------*/
    public function getAdd()
    {
        return view('admin.user.add');
    }   
    public function postAdd(UserRequest $req)
    {
        $user = new User;
        $user->fullName = $req->Ten;
        $user->email = $req->Email;
        $user->password = bcrypt($req->Password);
        $user->address = $req->DiaChi;
        $user->phone = $req->SoDT;    
        $user->save();
       
        return redirect('admin/user/add')->with('thongbao','Thêm thành công!');
    }

    /*---------------Edit Item ----------------------------------*/
    public function getEdit($id)
    {
        $user = User::find($id);
        
        return view('admin.user.edit',compact('user'));
    }
    public function postEdit(UserEditRequest $req, $id)
    {
        $user = User::find($id);        
        $user->fullName = $req->Ten;
        if($req->changepass == "on"){
           $user->password = bcrypt($req->Password);
        }
        $user->address = $req->DiaChi;
        $user->phone = $req->SoDT;
        $user->enable = $req->enable;    
        $user->save();
       
        return redirect('admin/user/edit/'.$id)->with('thongbao','Sửa thành công!');
    }
    public function getDelete($id)
    {
        $user= User::find($id);
        try {
            $check = $user->delete();
            if(!$check)
                throw new QueryException;
        } catch (QueryException $e) {
            return redirect('admin/user/list')->with('loi','Không thể xóa!');
        }
        
        return redirect('admin/user/list')->with('thongbao','Xóa thành công!');
    }

    public function getDangNhap()
    {
        return view('user/userlogin');
    }

    public function postDangNhap(UserLoginRequest $req)
    {
        if(Auth::attempt(['email'=>$req->email,'password'=>$req->password])){
            //kiểm tra ngdung có bị khóa hay không
            if(Auth::user()->enable == 1) 
            {                
                return redirect('/tatcasanpham/9');
            }
            // người dùng bị khóa
            else
            {
                return redirect('/login')->with('loi','Đăng nhập không thành công. Kiểm tra lại thông tin.');
            }
        }else {
            return redirect('/login')->with('loi','Đăng nhập không thành công. Kiểm tra lại thông tin.');
        }
    }

    // public function getLogoutAdmin()
    // {
    //     Auth::logout();
    //     return redirect('admin/login');
    // }
    
    public function getUserLogout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
