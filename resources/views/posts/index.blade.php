@extends('layouts.app')

@section('content')
  <h1>商品一覧・入力</h1>
  <form method="post" action="{{ route('posts.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <td align="right"><b> 料理名</b></td>
      <input type="text" name="product_name" size="30" maxlength="20" required>
    </div>
    <div class="form-group">
      <td align="right"><b> 内容</b></td>
      <input type="text" name="explanation" size="30" maxlength="20" required>
    </div>
    <input type="file" name="image" accept="image/png, image/jpeg" required>
      <div class="mt-4">
          <a class="btn btn-secondary btn-sm" href="/posts" role="button">キャンセル</a>
          <button type="submit" class="btn btn-primary btn-sm">投稿</button>
      </div>
  </form>
  {{-- 商品データ・画像表示 --}}
  @foreach ($posts as $post)
  <div style="width: 18rem; float:left; margin: 16px;">
      <a href="{{route('posts.show', $post) }}"><p>{{ $post->product_name }}</p></a>
      <img src="{{ Storage::url($post->image) }}" style="width:100%;"/>
      <p>{{ $post->explanation }}</p>
      <a href="{{ route('posts.edit', $post) }}">内容編集</a>
  </div>
  @endforeach
  @endsection
