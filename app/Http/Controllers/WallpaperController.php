<?php

namespace App\Http\Controllers;

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
        // $request->validate([
        //     'wallpaper' => 'required|image',
        //     'title' => 'Nullable|String',
        //     'author' => 'Nullable|String',
        // ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Wallpaper  $wallpaper
     * @return \Illuminate\Http\Response
     */
    public function show(Wallpaper $wallpaper)
    {
        //
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
