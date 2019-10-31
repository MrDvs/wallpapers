@extends('layouts.default')

@section('title')
{{ utf8_decode($wallpaper->title) }} | Audiwallpapers.com
@endsection

@if(!$wallpaper->approved) 
<style>
	#download-btn:hover {
		cursor: not-allowed;
	}
</style>
@endif

@section('content')

@if(!$wallpaper->approved)
<div class="alert alert-danger text-center">
	<h5>This wallpaper has not been approved. This wallpaper is not visible to the public yet and can't be downloaded.</h5>
</div>
@endif

<div class="wallpaper-wrapper">
	<img src="{{asset(Storage::url('public/'.$wallpaper->file_location))}}" class="wallpaper">
</div>

<div class="container-fluid">
	<div class="download-btn-wrapper">
		<a download="{{str_replace(' ', '_', $wallpaper->title) . 'wallpaper'}}" @if($wallpaper->approved) href="{{asset('storage/'.$wallpaper->file_location)}}" @endif class="btn btn-primary" id="download-btn"><i class="fas fa-download"></i> Download</a>​​​​​​​​​​​​​​​​​​​​​​​​​​​
	</div>
	<h4 class="wallpaper-title">{{$wallpaper->title}}</h4>

	<p class="wallpaper-info">Author: <span class="bold">{{$wallpaper->author}}</span></p>
	@if($wallpaper->author_url)
		<p class="wallpaper-info">URL: <a href="{{$wallpaper->author_url}}" target="_blank"><span class="bold">{{$wallpaper->author_url}}</span></a></p>
	@endif
	<p class="wallpaper-info">Resolution: <span class="bold">{{$wallpaper->format}}</span></p>

	<div class="recommended-wallpapers">
		<h3 style="color: #fff">Recommended Wallpapers</h3>
			@foreach($recommended as $img)
				<a href="{{route('wallpaper.show', ['id' => $img->id])}}" class="recommended-overlay">
					<img src="{{asset(Storage::url('public/'.$img->file_location))}}" alt="{{$img->title}}">
				</a>
			@endforeach
	</div>

	@if(!$wallpaper->approved)
	<script
	  src="https://code.jquery.com/jquery-3.4.1.min.js"
	  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
	  crossorigin="anonymous"></script>

	<script>
		(function($){
		  $(document).on('contextmenu', 'img', function() {
		      return false;
		  })
		})(jQuery);
	</script>
	@endif

	
</div>
@endsection
