@extends('layouts.default')

@section('title')
{{ utf8_decode($wallpaper->title) }} wallpaper | Audiwallpapers.com
@endsection

@section('content')

<h2 class="text-center" style="color: #fff">{{$wallpaper->title}} wallpaper</h2>

<div class="row">
	
	<div class="col-md-9 wallpaper-col">
		<div class="wallpaper-wrapper" style="border: 1px solid black">
		    <img src="{{asset($wallpaper->file_location)}}" class="wallpaper" style="max-width: 100%; height: auto;">
		</div>
	</div>

	<div class="col-md-3 info-col">
		<div class="info-item">
			<h4 style="color: #fff; font-weight: bold;">Title:</h4>
			<h4 style="color: #fff">{{$wallpaper->title}}</h4>
		</div>
		<div class="info-item">
			<h4 style="color: #fff; font-weight: bold;">Author:</h4>
			<h4 style="color: #fff">{{$wallpaper->author}}</h4>
		</div>
		<div class="info-item">
			<h4 style="color: #fff; font-weight: bold;">Format:</h4>
			<h4 style="color: #fff">{{$wallpaper->format}}</h4>
		</div>
		<div class="info-item">
			<h4 style="color: #fff; font-weight: bold;">Resolution:</h4>
			<h4 style="color: #fff">{{$wallpaper->resolution}}</h4>
		</div>
		<div class="info-item">
			<h4 style="color: #fff; font-weight: bold;">Tags:</h4>
			{{-- <h4 style="color: #fff">{{$wallpaper->resolution}}</h4> --}}
		</div>
	</div>

</div>




@endsection
