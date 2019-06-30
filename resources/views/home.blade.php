@extends('layouts.default')
<style>
    .thumbnail-overlay {
        display: block;
        float: left;
        overflow: hidden;
        position: relative;
        width: 292.5px;
        margin-right: 10px;
        margin-bottom: 10px;
        border-radius: 3px;
    }

    .thumbnail-overlay:nth-child(4n) {
        margin-right: 0;
    }

    .wallpaper-thumbnail {
        width: 100%;
        height: 165px;
    }

    .thumbnail-overlay:hover
    {
        -moz-box-shadow: 0 0 10px #ccc;
        -webkit-box-shadow: 0 0 10px #ccc;
        box-shadow: 0 0 10px #ccc;
    }

</style>
@section('content')
<h2 class="text-center" style="color: #fff">Welcome to AudiWallpapers.com</h2>


<div class="thumbnail-wrapper clearfix" style="width: 100%; margin: 0px auto 20px">
    @foreach($wallpapers as $wallpaper)
        <a href="{{route('wallpaper.show', ['id' => $wallpaper->id])}}" class="thumbnail-overlay">
            <img src="{{asset($wallpaper->thumbnail_location)}}" class="wallpaper-thumbnail">
        </a>
    @endforeach
</div>

{{-- <div class=""> --}}
    {{$wallpapers->links()}}
{{-- </div> --}}

@endsection
