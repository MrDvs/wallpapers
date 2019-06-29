@extends('layouts.default')

@section('content')
<h2>Welcome to AudiWallpapers.com</h2>
@foreach($wallpapers as $wallpaper)
<img src="{{asset($wallpaper->file_location)}}" style="max-width: 60%; height: auto;">
<p>{{$wallpaper->title}}</p>
<p>@ {{$wallpaper->author}}</p>

@endforeach

@endsection
