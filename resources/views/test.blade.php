@extends('layouts.default')

@section('content')
<h2 class="text-center" style="color: #fff">Welcome to AudiWallpapers.com</h2>

<div class="clearfix" style="columns: 4">
    @foreach($wallpapers as $wallpaper)

        <a href="{{route('wallpaper.show', ['id' => $wallpaper->id])}}" class="thumbnail-overlay" style="width: 100% !important">
            <span class="wallpaper-badge badge-{{$wallpaper->resolution}}">{{$wallpaper->resolution}}</span>
            <img src="{{asset($wallpaper->thumbnail_location)}}" class="wallpaper-thumbnail">
            <div class="hover-overlay">
                <div class="overlay-text">{{$wallpaper->title}}</div>
            </div>
        </a>

    @endforeach
</div>

{{$wallpapers->links()}}

@endsection
