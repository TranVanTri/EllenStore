<?php

namespace App\Http\Controllers\AdminManager;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class CkfinderController extends Controller
{
    // public function getConnector()
    // {
    // 	require_once public_path() . '/ckfinder/core/connector/php/connector.php';
    // }

    public function getCkfinder()
    {
    	return view('admin.ckfinder');
    }
}
