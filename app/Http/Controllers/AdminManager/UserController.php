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
use Illuminate\Support\Facades\Redirect;
use Gloudemans\Shoppingcart\Facades\Cart; 

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
        $user->name = $req->Ten;
        $user->email = $req->Email;
        $user->password = bcrypt($req->Password);
        $user->address = $req->DiaChi;
        $user->phone = $req->SoDT;  
        $user->provider = 'Null';
        $user->provider_id = 'Null';  
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
        $user->name = $req->Ten;
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
                return Redirect::action('UserController\BeforeCartController@giohang');
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

    public function userregister(){
        return view('user.register');
    }

    public function postUserRegister(Request $req){

        $this->validate($req,
            [
                'name'=>'required|max:50',
                'email'=>'required|unique:users,email|email',
                'password'=>'required|min:6|max:50|regex: /^[a-zA-Z\d]+$/i',
                'repassword'=>'required|same:password|regex: /^[a-zA-Z\d]+$/i',
                'phone'=>'required|numeric|min:9',
                'address'=>'required'
            ],
            [
                'name.required'=>'Bạn chưa nhập Tên.',
                'name.max'=> 'Tên có độ dài không quá 50 ký tự.',
                'email.required'=>'Bạn chưa nhập Email.',
                'email.unique'=>'Email đã tồn tại. Bạn vui lòng đăng nhập nhé.',
                'email.email'=>'Email không hợp lệ.',
                'password.min' => 'Mật khẩu có độ dài từ 6-50 ký tự.',
                'password.max'=> 'Mật khẩu có độ dài từ 6-50 ký tự.',
                'password.required' => 'Bạn chưa nhập mật khẩu',
                'password.regex'=> 'Mật khẩu chỉ bao gồm chữ thường, chữ hoa không dấu và số.',

                'repassword.same' => 'Mật khẩu chưa trùng khớp.',
                'repassword.required' => 'Bạn chưa nhập lại mật khẩu',
                'repassword.regex'=>'Mật khẩu chỉ bao gồm chữ thường, chữ hoa không dấu và số.',
                'phone.required' => 'Bạn chưa nhập số điện thoại liên hệ',
                'phone.numeric' => 'Vui lòng chỉ nhập ký tự số',
                'phone.min' => 'Số điện thoại không ít hơn 10 số',
                'address.required'=> 'Vui lòng điền địa chỉ của bạn.'

            ]);
        $user = new User;
        $user->name= $req->name;
        $user->email = $req->email;
        $user->password = bcrypt($req->password);
        $user->address = $req->address;
        $user->phone = $req->phone;    

        $user->provider = 'Null';
        $user->provider_id = 'Null';

        $user->save();
        
        
        return redirect('/login')->with('thongbao','Thêm thành công!');

    }




}
