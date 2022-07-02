@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="UTF-8">
		<title>Document</title>
	</head>
	<body>
		@foreach($images as $image)
		<div style="width: 18rem; float:left; margin: 16px;">
			<img src="{{ Storage::url($image->file_path) }}" style="width:100%;"/>
			<p>{{ $image->file_name }}</p>
		</div>
		@endforeach
	</body>
</html>
@endsection