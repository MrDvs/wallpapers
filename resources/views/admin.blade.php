@extends('layouts.default')

@section('title')
	Admin | Audiwallpapers.com
@endsection


@section('content')
<div class="container-fluid clearfix">
	<h2 class="text-center" style="color: #fff">Welcome, {{Auth::user()->name}}</h2>
	@foreach($unapproved as $wallpaper)
		<a href="{{route('wallpaper.show', ['id' => $wallpaper->id])}}" class="thumbnail-overlay">
            <img src="{{asset(Storage::url('public/'.$wallpaper->thumbnail_location))}}" class="wallpaper-thumbnail" alt="{{$wallpaper->title}}">
            <div class="hover-overlay">
                <div class="overlay-text">{{$wallpaper->title}}</div>
            </div>
        </a>
	@endforeach

</div>
@endsection
