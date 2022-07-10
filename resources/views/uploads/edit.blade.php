@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h1>編集ページ</h1>
            <form  method="post" action="{{ route('upload_form') }}" class="form-horizontal">
            @csrf
            <div class="form-group row">
                <label class="col-md-2" for="title">料理名</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="product_name" value="{{ $CookingPost->product_name }}">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-10">
                    <img src="{{ Storage::url($CookingPost->file_path) }}" style="width:40%;"/>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-2" for="title">内容</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="explanation" value="{{ $CookingPost->explanation }}">
                </div>
            </div>
            <input type="submit" value="決定" class="btn btn-primary">
            <input type="submit" value="キャンセル" class="btn btn-secondary" onclick="window.history.back(-1);">
            <input type="hidden" name="product_name" value= "{{ $CookingPost['product_name']}}" >
            <input type="hidden" name="my_number" value= "{{ $CookingPost['explanation']}}" >
            </form>
    </div>
</div>
@endsection