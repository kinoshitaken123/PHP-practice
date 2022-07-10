@extends('layouts.app')

@section('content')
<h1>詳細ページ</h1>
<table class="table table-striped">
    <tbody>
        <tr>
            <p>{{ $CookingPost->product_name }}</p>
            <img src="{{ Storage::url($CookingPost->file_path) }}" style="width:40%;"/>
            <p>{{ $CookingPost->explanation }}</p>
        </tr>
    </tbody>
</table>
@endsection