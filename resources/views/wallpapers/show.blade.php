@extends('layouts.default')

@section('title')
{{ utf8_decode($wallpaper->title) }} | Audiwallpapers.com
@endsection

@section('content')

<div class="wallpaper-wrapper">
	<img src="{{asset($wallpaper->file_location)}}" class="wallpaper">
</div>

<div class="container-fluid">
	<div class="download-btn-wrapper">
		<a download="{{str_replace(' ', '_', $wallpaper->title) . 'wallpaper'}}" href="{{asset($wallpaper->file_location)}}" class="btn btn-primary" id="download-btn"><i class="fas fa-download"></i> Download</a>​​​​​​​​​​​​​​​​​​​​​​​​​​​
	</div>
	<h4 class="wallpaper-title">{{$wallpaper->title}}</h4>

	<p class="wallpaper-info">Author: <span class="bold">{{$wallpaper->author}}</span></p>
	@if($wallpaper->author_url)
		<p class="wallpaper-info">URL: <a href="{{$wallpaper->author_url}}" target="_blank"><span class="bold">{{$wallpaper->author_url}}</span></a></p>
	@endif
	<p class="wallpaper-info">Resolution: <span class="bold">{{$wallpaper->format}}</span></p>

	<div class="recommended-wallpapers">
		<h3 class="text-center" style="color: #fff">Recommended wallpapers</h3>
		<div class="recommended-wrapper" style="columns: 1;">
			<div style="margin: auto;">
			@foreach($recommended as $img)
				<img src="{{asset($img->file_location)}}" alt="{{$img->title}}" style="width: 100%; height: auto;">
			@endforeach
			</div>
		</div>
	</div>
	
</div>
@endsection
