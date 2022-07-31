@extends('layouts.app')

@section('content')
    <h1>詳細ページ</h1>
        <table class="table table-striped">
            <tbody>
                <tr>
                    <p>料理名:{{ $post->product_name }}</p>
                    <img src="{{ Storage::url($post->image) }}" style="width:40%;"/>
                    <p>説明:{{ $post->explanation }}</p>
                </tr>
            </tbody>
        </table>
        <div id="comment-post-{{ $post->id }}">
            @include('posts.comment_list')
        </div>
        <div class="row actions" id="comment-form-post-{{ $post->id }}">
            <form class="w-100" id="new_comment" action="/posts/{{ $post->id }}/comments" accept-charset="UTF-8" data-remote="true" method="post">
                <input name="utf8" type="hidden" value="&#x2713;" />
                {{csrf_field()}}
                <input value="{{ Auth::user()->id }}" type="hidden" name="user_id" />
                <input value="{{ $post->id }}" type="hidden" name="post_id" />
                <input class="form-control comment-input" placeholder="コメント ..." autocomplete="off" type="text" name="comment" />
            </form>
        </div>
        <a href="{{ route('posts.index') }}" class="btn btn-primary">一覧に戻る</a>
        <a href="{{ route('posts.edit', $post) }}" class="btn btn-success">編集</a>
@endsection