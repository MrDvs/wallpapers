@extends('layouts.default')

@section('content')

@if ($errors->any())
	<div class="alert alert-danger text-center">
		<ul>
			@foreach ($errors->all() as $error)
				<h5>{{ $error }}</h5>
			@endforeach
		</ul>
	</div>
@endif

<div class="container-fluid">
  <form method="POST" action="{{ route('upload.store') }}" enctype="multipart/form-data" id="upload-form">
    <h2 class="text-center" style="color: #fff">Upload a wallpaper!</h2>
    <p class="text-center">Got a nice Audi wallpaper you want to share with the community? Upload it here!</p>
  	@csrf
    <div class="form-group">
      <label for="WallpaperFile">Upload your wallpaper *</label>
      <input type="file" class="form-control-file" id="WallpaperFile" name="wallpaper">
    </div>	
    <div class="form-group">
      <label for="TitleInput">Title *</label>
      <input type="text" class="form-control" id="TitleInput" aria-describedby="TitleHelp" placeholder="Awesome RS6" name="title" value="{{old('title')}}" maxlength="90">
      {{-- <h6 id="TitleHelp" class="form-text text-muted" style="color: #fff !important">The title is optional</h6> --}}
    </div>
    <div class="form-group">
      <label for="AuthorInput">Author / username (optional)</label>
      <input type="text" class="form-control" id="AuthorInput" aria-describedby="AuthorHelp" placeholder="@username" name="author" value="{{old('author')}}">
      <h6 id="AuthorHelp" class="form-text text-muted" style="color: #fff !important">Who is the author of this file?</h6>
    </div>
    <div class="form-group">
      <label for="UrlInput">Author URL (optional)</label>
      <input type="text" class="form-control" id="UrlInput" aria-describedby="UrlHelp" placeholder="www.instagram.com/author" name="url"  value="{{old('url')}}">
      <h6 id="UrlHelp" class="form-text text-muted" style="color: #fff !important">Does the author have a website?</h6>
    </div>
    <div class="form-group">
      <label for="AuthorInput">E-mail (optional)</label>
      <input type="text" class="form-control" id="EmailInput" aria-describedby="EmailHelp" placeholder="avarage@joe.com" name="email" value="{{old('email')}}">
      <h6 id="EmailHelp" class="form-text text-muted" style="color: #fff !important">Enter your E-mail if you want to get notified when your wallpaper gets aproved. Your E-mail will never be shared with or seen by a third party.</h6>
    </div>
    {{-- <div class="form-group">
      <input type="checkbox" name="email-notify" value="1" {{ (! empty(old('email-notify')) ? 'checked' : '') }}> Notify me by mail when this wallpaper gets uploaded.
    </div> --}}
    {{-- <div class="form-group">
      <label for="TagInput">Tags (optional)</label>
      <input type="text" class="form-control" id="AuthorInput" aria-describedby="TagHelp" placeholder="RS6, V8, Turbo, TFSI" name="tags">
      <h6 id="TagHelp" class="form-text text-muted" style="color: #fff !important">You can add multiple tags, seperated by a comma (RS6, V8, Turbo, TFSI)</h6>
    </div> --}}
    <div class="form-group">
      <input type="checkbox" name="agree"  value="1" {{ (! empty(old('agree')) ? 'checked' : '') }}> I agree that this image is mine, copyright free or that I have listed the rightfull author/owner of this image and that this image may be shared on third party services (Instagram, Reddit etc.).
    </div>
    <button type="submit" class="btn btn-primary" id="upload-form-submit">Submit</button>
  </form>
</div>

@endsection
