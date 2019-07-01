@extends('layouts.default')

@section('title')
{{$wallpaper->title}} | Audiwallpapers.com
@endsection

@section('content')

<h2 class="text-center" style="color: #fff">{{$wallpaper->title}}</h2>

<div class="wallpaper-wrapper" style="border: 1px solid black">
    <img src="{{asset($wallpaper->file_location)}}" class="wallpaper" style="max-width: 100%; height: auto;">
</div>
<p style="color: #fff">Author: {{$wallpaper->author}}</p>


@endsection
