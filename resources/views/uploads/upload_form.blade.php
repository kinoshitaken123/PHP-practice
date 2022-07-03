@extends('layouts.app')

@section('content')
	@if (count($errors) > 0)
	<div class="alert alert-danger">
		<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
	@endif
	<form method="post" action="{{ route('upload_image') }}" enctype="multipart/form-data">
		@csrf
		<div class="form-group">
			<td align="right"><b> 料理名</b></td>
			<td><input type="text" name="product_name" size="30" maxlength="20"></td>
        </div>
		<div class="form-group">
			<td align="right"><b> 内容</b></td>
			<td><input type="text" name="explanation" size="30" maxlength="20"></td>
        </div>
		<input type="file" name="image" accept="image/png, image/jpeg">
		<div class="mt-4">
			<a class="btn btn-secondary btn-sm" href="/list" role="button">キャンセル</a>
			<button type="submit" class="btn btn-primary btn-sm">投稿</button>
        </div>
	</form>
@endsection