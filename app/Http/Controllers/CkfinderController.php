<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
