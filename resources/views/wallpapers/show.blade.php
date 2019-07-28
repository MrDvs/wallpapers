@extends('layouts.default')

@section('title')
{{ utf8_decode($wallpaper->title) }} | Audiwallpapers.com
@endsection

@section('content')

<h2 class="text-center" style="color: #fff; word-break: break-word;">{{$wallpaper->title}}</h2>

<a style="width: 100%; margin-top: 10px;" download="{{str_replace(' ', '_', $wallpaper->title) . 'wallpaper'}}" href="{{asset($wallpaper->file_location)}}" class="btn btn-primary"><i class="fas fa-download"></i> Download</a>​​​​​​​​​​​​​​​​​​​​​​​​​​​

<div class="wallpaper-wrapper" style="border: 1px solid black">
    <img src="{{asset($wallpaper->file_location)}}" class="wallpaper">
</div>

<p style="color: #fff">Author: {{$wallpaper->author}}</p>

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

@endsection
