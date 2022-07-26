@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h1>編集ページ</h1>
            <form  method="post" action="{{ route('posts.update', $post) }}" class="form-horizontal" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="form-group row">
                <label class="col-md-2" for="title">料理名</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="product_name" value="{{ $post->product_name }}">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-10">
                    <img src="{{ Storage::url($post->image) }}" style="width:40%;"/>
                </div>
            </div>
            <div class="form-group">
                <input type="file" name="image">
            </div>
            <div class="form-group row">
                <label class="col-md-2" for="title">内容</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="explanation" value="{{ $post->explanation }}">
                </div>
            </div>
            <input type="submit" value="更新" class="btn btn-primary">
            </form>
            <a href="{{ route('posts.index') }}">一覧に戻る</a>
    </div>
</div>
@endsection