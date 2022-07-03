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

        return view('uploads.show', compact('CookingPost'));
    }
}
