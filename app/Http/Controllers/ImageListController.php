<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;

class ImageListController extends Controller
{
    public function __construct()
    {
        // ログインしていなかったらログインページに遷移する
        $this->middleware('auth');
    }

    /**
     * 画面投稿
     */
    public function store(Request $request)
    {
        // 商品をデータベースに登録
        $request->validate([
            'image' => 'required|file|image|mimes:png,jpeg'
        ]);

        $upload_image = $request->file('image');
        //アップロードされた画像を保存する
        $path = $upload_image->store('uploads',"public");
        //画像の保存に成功したらDBに記録する
        Post::create([
            "product_name" => $request->product_name,
            "explanation" => $request->explanation,
            "image" => $path,
        ]);

        return redirect()->route('posts.index');
    }

	/**
     * 一覧画面
     */
    public function index(Request $request)
    {
        //検索用クエリ発行
        $query = Post::query();
        //パラメータの取得
        $value = $request->input('search');

        if (!empty($value)) {
            $query->where('product_name', 'like', '%' . $value . '%')
                ->orWhere('explanation', 'like', '%' . $value . '%');
        }

        $posts = $query->orderBy('created_at', 'desc')->paginate(10);

        return view('posts.index', ['posts' => $posts]);
	}

	/**
     * 詳細画面の表示
     */
	public function show(Post $post)
    {
        return view('posts.show', ['post'=>$post]);
    }

	/**
     * 編集画面の表示
     */
	public function edit(Post $post)
    {
        return view('posts.edit', ['post'=>$post]);
    }

	/**
     * 更新実行
     */
    public function update(Request $request, Post $post)
    {
        // 画像ファイルインスタンス取得
        $image = $request->file('image');
        // 現在の画像へのパスをセット
        $path = $post->image;
        if (isset($image)) {
            // 現在の画像ファイルの削除
            \Storage::disk('public')->delete($path);
            // 選択された画像ファイルを保存してパスをセット
            $path = $image->store('posts', 'public');
        }
        // データベースを更新
        $post->update([
            "product_name" => $request->product_name,
            "explanation" => $request->explanation,
            "image" => $path,
        ]);
        return redirect()->route('posts.index', $post);
    }
}
