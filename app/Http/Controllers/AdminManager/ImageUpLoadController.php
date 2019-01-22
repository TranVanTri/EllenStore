<?php

namespace App\Http\Controllers\AdminManager;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use File;
class ImageUpLoadController extends Controller
{

    public function upLoadFiles(Request $req)
    {
    	if($req->hasFile('files')){
    		$imageFiles = $req->file('files');
    		foreach($imageFiles as $imageFile){
    			$imageName = uniqid().$imageFile->getClientOriginalName();
    			$imageFile->move('upload/images/'.$req->category,$imageName);
    		}    		
    		echo "done";
    	}

    	// echo 'sss '.$req->category;

    }
     public function viewImage($category){
     	
     	$files = scandir('upload/images/'.$category);
     	$col = 4;
     	if($category == 'sanpham'){
     		$col = 2;
     	}
		$output = '<div class="row">';

		if($files !== false){
			foreach($files as $file){
			   	if('.' !=  $file && '..' != $file){
				   $output .= '
				   <div class="col-lg-'.$col.'">
		    			<div class="card">
							<img src="upload/images/'.$category.'/'.$file.'" alt="John" style="width:100% ; height: 130px" title="'.$file.'">
							<button class="btn btn-danger btn-block remove_image" id="'.$file.'" data="'.$category.'">Xóa</button>
						</div>
					</div>	
				   ';
				}
				
			}
		}
		 $output .= '</div>';
		echo $output;
	}

	public function removeImage(Request $req){
		unlink(public_path('/upload/images/'.$req->category.'/'.$req->name));
	}
}
