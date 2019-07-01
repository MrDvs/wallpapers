@extends('layouts.default')

@section('content')
<h2 class="text-center" style="color: #fff">Welcome to AudiWallpapers.com</h2>


<div class="thumbnail-wrapper clearfix" style="">
    @foreach($wallpapers as $wallpaper)
        <a href="{{route('wallpaper.show', ['id' => $wallpaper->id])}}" class="thumbnail-overlay">
            <img src="{{asset($wallpaper->thumbnail_location)}}" class="wallpaper-thumbnail">
        </a>
    @endforeach
</div>

{{$wallpapers->links()}}


@endsection
