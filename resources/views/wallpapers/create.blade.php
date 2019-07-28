@extends('layouts.default')

@section('content')
<h2 class="text-center" style="color: #fff">Upload a wallpaper!</h2>

@if ($errors->any())
	<div class="alert alert-danger text-center">
		<ul>
			@foreach ($errors->all() as $error)
				<h5>{{ $error }}</h5>
			@endforeach
		</ul>
	</div>
@endif

<form method="POST" action="{{ route('upload.store') }}" enctype="multipart/form-data" style="background-color: #3A3F44; color: #fff; padding: 15px; border-radius: 10px">
  <p class="text-center">Got a nice Audi wallpaper you want to share with the community? Upload it here!</p>
	@csrf
  <div class="form-group">
    <label for="WallpaperFile">Upload your wallpaper *</label>
    <input type="file" class="form-control-file" id="WallpaperFile" name="wallpaper">
  </div>	
  <div class="form-group">
    <label for="TitleInput">Title</label>
    <input type="text" class="form-control" id="TitleInput" aria-describedby="TitleHelp" placeholder="Awesome RS6" name="title">
    {{-- <h6 id="TitleHelp" class="form-text text-muted" style="color: #fff !important">The title is optional</h6> --}}
  </div>
  <div class="form-group">
    <label for="AuthorInput">Author</label>
    <input type="text" class="form-control" id="AuthorInput" aria-describedby="AuthorHelp" placeholder="@username" name="author">
    <h6 id="AuthorHelp" class="form-text text-muted" style="color: #fff !important">Who is the author of this file? <br> Instagram user: @username <br> Reddit user: /u/username</h6>
  </div>
  <div class="form-group">
    <label for="TagInput">Tags</label>
    <input type="text" class="form-control" id="AuthorInput" aria-describedby="TagHelp" placeholder="RS6, V8, Turbo, TFSI" name="tags">
    <h6 id="TagHelp" class="form-text text-muted" style="color: #fff !important">You can add multiple tags, seperated by a comma (RS6, V8, Turbo, TFSI)</h6>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection
