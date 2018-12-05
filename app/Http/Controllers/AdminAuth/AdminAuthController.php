<?php

namespace App\Http\Controllers\AdminAuth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests;
use Auth;

class AdminAuthController extends Controller
{
    
    public function __construct() {
    	$this->middleware('adminCheckLogout',['except' => 'getLogout']);
    }
    public function getIndex()
    {   
    	return redirect('admin/product/list');
    }
    public function getLogout() {
    	Auth::guard('admin')->logout();
    	return redirect('authadmin/login');
    }
 }