@extends('layouts.default')

@section('title')
{{ utf8_decode($wallpaper->title) }} wallpaper | Audiwallpapers.com
@endsection

@section('content')

<h2 class="text-center wallpaper-title">{{$wallpaper->title}} wallpaper</h2>

<div class="row">
	
	<div class="col-md-9 wallpaper-col">
		<div class="wallpaper-wrapper">
		    <img src="{{asset($wallpaper->file_location)}}" class="wallpaper" style="max-width: 100%; height: auto;">
		    <a style="width: 100%; margin-top: 10px;" download="{{str_replace(' ', '_', $wallpaper->title) . 'wallpaper'}}" href="{{asset($wallpaper->file_location)}}" class="btn btn-primary"><i class="fas fa-download"></i> Download</a>​​​​​​​​​​​​​​​​​​​​​​​​​​​
		</div>

	</div>

	<div class="col-md-3 info-col">
		<div class="info-item">
			<h3>Title:</h3>
			<h4>{{$wallpaper->title}}</h4>
		</div>
		<div class="info-item">
			<h3>Author:</h3>
			<h4>{{$wallpaper->author}}</h4>
			@if($wallpaper->author_url)
			<h4><i class="fas fa-globe"></i> {{$wallpaper->author_url}}</h4>
			@endif
		</div>
		<div class="info-item">
			<h3>Format:</h3>
			<h4>{{$wallpaper->format}}</h4>
		</div>
		<div class="info-item">
			<h3>Resolution:</h3>
			<h4>{{$wallpaper->resolution}}</h4>
		</div>
		<div class="info-item">
			<h3>Tags:</h3>
		</div>
	</div>

</div>




@endsection
