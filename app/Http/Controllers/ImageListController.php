<?php

namespace App\Http\Controllers;
use App\Models\CookingPost;

use Illuminate\Http\Request;

class ImageListController extends Controller
{
	/**
     * 一覧画面
     */
    function index(){
		//アップロードした画像を取得
		$uploads = CookingPost::orderBy("id", "desc")->get();

		return view("uploads.image_list",[
			"images" => $uploads,
		]);
	}
	/**
     * 詳細画面の表示
     */
	public function show($id)
    {
        $CookingPost = CookingPost::find($id);
		// compactで指定してあげないと変数をビューに渡すことができない
        return view('uploads.show', compact('CookingPost'));
    }
	/**
     * 編集画面の表示
     */
	public function edit($id)
    {
        $CookingPost = CookingPost::find($id);
		// compactで指定してあげないと変数をビューに渡すことができない
        return view('uploads.edit', compact('CookingPost'));
    }
	/**
     * 更新実行
     */
	public function update(Request $request,$id)
    {
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
