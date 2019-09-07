<?php

namespace App\Http\Controllers;

use Image;
use App\Tag;
use App\Wallpaper;
use Carbon\Carbon;
use App\Mail\NewWallpaper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class WallpaperController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('wallpapers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'wallpaper' => 'required|image',
            'title' => 'required|String',
            'email' => 'Nullable|email',
            'author' => 'Nullable|String',
            'url' => 'Nullable|String',
            'agree' => 'required',
            // 'tags' => 'Nullable|String',
        ]);

        // Request the uploaded wallpaper, save it to the public disk and split the filename+extension with the folder
        $wallpaper = $request->file('wallpaper');
        $path = explode('/', $wallpaper->store('public'));

        // Get the original image, make it smaller and save it as the thumbnail
        $thumbnail = Image::make(Storage::get('public/'.$path[1]));
        $thumbnail->fit(293, 165);
        $thumbnail->save('../storage/app/public/thumbnails/t'.$path[1], 90);

        // Get the width and height of the image
        $imageFormat = getimagesize('../storage/app/public/'.$path[1]);

        // Check if the height is bigger then the width (to define if it's a mobile wallpaper)
        if ($imageFormat[1] > $imageFormat[0]) {
            $resolution = 'mobile';
        } else {
            // Pick the resolution
            $resolutions = [720, 1080 ,1440, 2160];
            $resolution = null;
            foreach ($resolutions as $item) {
                if ($resolution === null || abs($imageFormat[1] - $resolution) > abs($item - $imageFormat[1])) {
                    $resolution = $item;
                }
            }
            if ($resolution == 2160) {
                $resolution = '4K';
            } else {
                $resolution = $resolution.'p';
            }
        }

        $wallpaper = new Wallpaper;
        $wallpaper->title = request('title');
        $wallpaper->author = request('author');
        $wallpaper->author_url = request('url');
        $wallpaper->file_location = $path[1];
        $wallpaper->thumbnail_location = 'thumbnails/t'.$path[1];
        $wallpaper->format = $imageFormat[0].'x'.$imageFormat[1];
        $wallpaper->resolution = $resolution;
        if (null !== request('email')) {
            $wallpaper->email = request('email');
        }
        $wallpaper->created_at = Carbon::now();
        $wallpaper->updated_at = Carbon::now();
        $wallpaper->save();

        Mail::to('1998dennis@live.nl')
            ->send(new NewWallpaper($wallpaper));

        return redirect('/wallpaper/'.$wallpaper->id);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Wallpaper  $wallpaper
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $wallpaper = Wallpaper::find($id);
        $recommended = Wallpaper::where('approved', 1)->inRandomOrder()->take(4)->get();

        return view('wallpapers.show', ['wallpaper' => $wallpaper, 'recommended' => $recommended]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Wallpaper  $wallpaper
     * @return \Illuminate\Http\Response
     */
    public function edit(Wallpaper $wallpaper)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Wallpaper  $wallpaper
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Wallpaper $wallpaper)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Wallpaper  $wallpaper
     * @return \Illuminate\Http\Response
     */
    public function destroy(Wallpaper $wallpaper)
    {
        //
    }
}
