<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Wallpaper;
use Illuminate\Http\Request;

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
            'author' => 'Nullable|String',
            'tags' => 'Nullable|String',
        ]);

        echo 'goed gedaan mien jong';

        $wallpaper = new Wallpaper;
        $wallpaper->title = request('title');
        $wallpaper->file_location = request('title');
        $wallpaper->fthumbnail_location = request('title');
        $wallpaper->save();



        $imageFormat = getimagesize('img/'.$data[2].'.jpg');

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

        // 720p = 1280 x 720
        // 1080p = 1920 x 1080
        // 1440p = 2560 x 1440
        // 4K = 3840 x 2160

        echo "<br><br>";

        // $img = Image::make('img/'.$data[2].'.jpg');
        // $img->fit(293, 165);
        // $img->save('img/thumbnail/t'.$data[2].'.jpg', 90);

        $wallpaper = new Wallpaper;
        $wallpaper->title = utf8_encode(str_replace('_', ' ', $data[0]));
        $wallpaper->author = $data[1];
        $wallpaper->file_location = 'img/'.$data[2].'.jpg';
        $wallpaper->thumbnail_location = 'img/thumbnail/t'.$data[2].'.jpg';
        $wallpaper->format = $imageFormat[0].'x'.$imageFormat[1];
        $wallpaper->resolution = $resolution;
        $wallpaper->created_at = Carbon::now();
        $wallpaper->updated_at = Carbon::now();
        $wallpaper->save();
        
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

        return view('wallpapers.test', ['wallpaper' => $wallpaper]);
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
