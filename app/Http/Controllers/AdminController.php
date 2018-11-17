<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;

class AdminController extends Controller
{
    
    public function __construct() {
    	$this->middleware('adminLogin',['except' => 'getLogout']);
    }
    public function getIndex()
    {
    	return redirect('admin/product/list');
    }
    public function getLogout() {
    	Auth::guard('admin')->logout();
    	return redirect('admin/login');
    }
 }