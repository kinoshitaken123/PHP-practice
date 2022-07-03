<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CookingPost;

class UploadImageController extends Controller
{
    function show(){
		return view("uploads.upload_form");
	}

	function upload(Request $request){
	$request->validate([
		'image' => 'required|file|image|mimes:png,jpeg'
	]);
	$upload_image = $request->file('image');
	if($upload_image) {
		//アップロードされた画像を保存する
		$path = $upload_image->store('uploads',"public");
		//画像の保存に成功したらDBに記録する
		if($path){
			CookingPost::create([
				"product_name" => $request->product_name,
				"explanation" => $request->explanation,
				"user_id" => $path,
				"file_name" => $upload_image->getClientOriginalName(),
				"file_path" => $path
			]);
		}
	}
	return redirect("/list");
    }
}


// function upload(Request $request){
// 	$path = $request->path->store('public');
// 　　　　 // ②変数$imageのpathカラムに$pathのbasenameを代入
// 	$image = [
// 	'shop_name' => $request->shop_name,
// 	'spot'  => $request->spot,
// 	'path'  => basename($path)
// 	];
// 	\DB::table('images')->insert($image);

// 	$images = \App\Image::all();
// 	return view('user.home',compact('images'));
// }