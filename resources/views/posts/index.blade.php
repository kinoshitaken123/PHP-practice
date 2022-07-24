
<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>商品一覧・入力</title>
  </head>
  <body>
    <h1>商品一覧・入力</h1>
    <div class="col-sm-4" style="padding:20px 0; padding-left:0px;">
      <form class="form-inline my-2 my-lg-0 ml-2" action="{{ route('posts.index') }}">
        <input type="search" class="form-control mr-sm-2" name="search"  value="{{request('search')}}" placeholder="キーワードを入力" aria-label="検索...">
        <input type="submit" value="検索" class="btn btn-info">
      </form>
    </div>

    <form method="post" action="{{ route('posts.store') }}" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
        <td align="right"><b> 料理名</b></td>
        <input type="text" name="product_name" size="30" maxlength="20">
      </div>
      <div class="form-group">
        <td align="right"><b> 内容</b></td>
        <input type="text" name="explanation" size="30" maxlength="20">
      </div>
      <input type="file" name="image" accept="image/png, image/jpeg">
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
</body>
</html>