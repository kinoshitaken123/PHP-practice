@extends('layouts.app')

@section('content')
<h1>TOPページ</h1>
	<body>
		@foreach($images as $image)
		<div style="width: 18rem; float:left; margin: 16px;">
			<a href="{{route('image_show', $image) }}"><p>{{ $image->product_name }}</p></a>
			<img src="{{ Storage::url($image->file_path) }}" style="width:100%;"/>
			<p>{{ $image->explanation }}</p>
		</div>
		@endforeach
	</body>
@endsection