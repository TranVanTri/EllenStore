<?php

namespace App\Http\Controllers\AdminAuth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests;
use Auth;

class AdminAuthController extends Controller
{
    
    public function __construct() {
    	$this->middleware('adminCheckLogin',['except' => 'getLogout']);
    }
    public function getIndex()
    {   echo "string";
    	//return redirect('admin/categoryproduct/list');
    }
    public function getLogout() {
    	Auth::guard('admin')->logout();
    	return redirect('authadmin/login');
    }
 }