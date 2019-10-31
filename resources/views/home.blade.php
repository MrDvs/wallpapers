@extends('layouts.default')

@section('title')
	Home | Audiwallpapers.com
@endsection


@section('content')
<div class="container-fluid clearfix">
	<div class="thumbnail-wrapper clearfix" style="padding-top: 15px">
	    @foreach($wallpapers as $wallpaper)
	        <a href="{{route('wallpaper.show', ['id' => $wallpaper->id])}}" class="thumbnail-overlay">
	            <span class="wallpaper-badge badge-{{$wallpaper->resolution}}">{!! ($wallpaper->resolution == 'mobile') ? '<i class="fas fa-mobile-alt"></i>' : $wallpaper->resolution !!}</span>
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
