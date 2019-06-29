@extends('layouts.default')

@section('content')
<h2 class="text-center">Upload a wallpaper!</h2>

@if ($errors->any())
	<div class="alert alert-danger text-center">
		<ul>
			@foreach ($errors->all() as $error)
				<h5>{{ $error }}</h5>
			@endforeach
		</ul>
	</div>
@endif

<form method="POST" action="{{ route('upload.store') }}">
	@csrf
  <div class="form-group">
    <label for="WallpaperFile">Upload your wallpaper *</label>
    <input type="file" class="form-control-file" id="WallpaperFile" name="wallpaper">
  </div>	
  <div class="form-group">
    <label for="TitleInput">Title</label>
    <input type="text" class="form-control" id="TitleInput" aria-describedby="TitleHelp" placeholder="Title" name="title">
    <small id="TitleHelp" class="form-text text-muted">The title is optional.</small>
  </div>
  <div class="form-group">
    <label for="AuthorInput">Author</label>
    <input type="text" class="form-control" id="AuthorInput" aria-describedby="AuthorHelp" placeholder="Author" name="author">
    <small id="AuthorHelp" class="form-text text-muted">Who is the author of this file? (Reddit user: /u/username Instagram user: @username)</small>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection
