@extends('layouts.default')

@section('title')
	Admin | Audiwallpapers.com
@endsection


@section('content')
<div class="container-fluid clearfix">
	<h2 class="text-center" style="color: #fff">Welcome, {{Auth::user()->name}}</h2>
	@foreach($unapproved as $wallpaper)
        <div class="card" style="width: 18rem; float: left; margin: 10px">
		  <a href="{{route('wallpaper.show', ['id' => $wallpaper->id])}}">
		  	<img src="{{asset(Storage::url('public/'.$wallpaper->thumbnail_location))}}" class="card-img-top" >
		  </a>
		  <div class="card-body">
		    <h5 class="card-title">{{$wallpaper->title}}</h5>
		    <p class="card-text">ID: {{$wallpaper->id}} <br> Author: {{$wallpaper->author}} <br> URL: {{$wallpaper->author_url}} <br> Email: {{$wallpaper->email}}</p>

		    <a href="#" class="btn btn-success" onclick="event.preventDefault(); document.getElementById('approve-{{$wallpaper->id}}').submit();">Approve</a>

		    <form id="approve-{{$wallpaper->id}}" action="{{url('/approve/'.$wallpaper->id)}}" method="POST" style="display: none;">
				@csrf
				@method('PUT')
			</form>

		  </div>
		</div>
	@endforeach

</div>
@endsection
