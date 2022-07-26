@extends('layouts.app')

@section('content')
<h1>詳細ページ</h1>
<table class="table table-striped">
    <tbody>
        <tr>
            <p>{{ $post->product_name }}</p>
            <img src="{{ Storage::url($post->image) }}" style="width:40%;"/>
            <p>{{ $post->explanation }}</p>
        </tr>
    </tbody>
</table>
<a href="{{ route('posts.index') }}">一覧に戻る</a>
<a href="{{ route('posts.edit', $post) }}">編集</a>
@endsection