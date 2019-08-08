@extends('layouts.default')

@section('content')
<div class="container-fluid clearfix">
	<h2 class="text-center" style="color: #fff">Welcome to AudiWallpapers.com</h2>

	<div class="thumbnail-wrapper clearfix" style="">
	    @foreach($wallpapers as $wallpaper)
	        <a href="{{route('wallpaper.show', ['id' => $wallpaper->id])}}" class="thumbnail-overlay">
	            <span class="wallpaper-badge badge-{{$wallpaper->resolution}}">{{$wallpaper->resolution}}</span>
	            <img src="{{asset(Storage::url('public/'.$wallpaper->thumbnail_location))}}" class="wallpaper-thumbnail" alt="{{$wallpaper->title}}">
	            <div class="hover-overlay">
	                <div class="overlay-text">{{$wallpaper->title}}</div>
	            </div>
	        </a>
	    @endforeach
	</div>

	{{$wallpapers->links()}}
</div>
@endsection
