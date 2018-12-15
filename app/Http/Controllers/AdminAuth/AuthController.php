<?php

namespace App\Http\Controllers\AdminAuth;

use App\Admin;
use Validator;
use Auth;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesUsers;
    
    protected function guard()
    {
      return Auth::guard('admin');
    }

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = 'admin/dashboard';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function getLogin () {
    	return view('admin.login');
    }

    protected function validateLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|string',
        ],
        [
            'email.required'=>'Bạn chưa nhập email',
            'email.email'=>'Email không hợp lệ',
            'password.required'=>'Bạn chưa nhập mật khẩu',
        ]
        );
    }

    public function postLogin(Request $request)
    {
       $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {            
            return $this->sendLoginResponse($request);                 
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    protected function attemptLogin(Request $request)
    {
        return $this->guard()->attempt(
            $this->credentials($request)
        );
    }

    protected function credentials(Request $request)
    {
        $credentials = $request->only('email', 'password');
        // Customization: validate if admin enable is active (1)
        $credentials['enable'] = 1;
        return $credentials;
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        $admin = Admin::where('email', $request->email)->first();

        if ( ! $admin ){
            return redirect()->back()
            ->withInput($request->only('email'))
            ->withErrors(['email' => trans('auth.email')]);//resources\lang\en\auth.php
        }
        if (! \Hash::check($request->password, $admin->password) ){
             return redirect()->back()
            ->withInput($request->only('email'))
            ->withErrors(['password' => trans('auth.password')]);//resources\lang\en\auth.php
        }
        if ( ! $admin->enable == 1){
            return redirect()->back()
            ->withInput($request->only('email'))
            ->withErrors(['email' => trans('auth.notactivated')]);//resources\lang\en\auth.php
        }

        $errors = [$this->username() => trans('auth.failed')];//resources\lang\en\auth.php
        if ($request->expectsJson()) {
            return response()->json($errors, 422);
        }

        return redirect()->back()
            ->withInput($request->only('email'))
            ->withErrors($errors);
    }

    	// public function getRegister() {
     //    	return view('admin.register');
     //    }

     //    public function postRegister(Request $request)
	    // {
	    //     $validator = $this->validator($request->all());

	    //     if ($validator->fails()) {
	    //         $this->throwValidationException(
	    //             $request, $validator
	    //         );
	    //     }

	    //     Auth::guard('admin')->login($this->create($request->all()));

	    //     return redirect($this->redirectPath());
	    // }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:admins',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return Admin::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}