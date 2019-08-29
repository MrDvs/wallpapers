<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Wallpaper;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $wallpapers = Wallpaper::where('approved', '1')->SimplePaginate(24);
        return view('home', ['wallpapers' => $wallpapers]);
    }

    // public function test()
    // {
    //     $wallpapers = Wallpaper::paginate(20);
    //     return view('test', ['wallpapers' => $wallpapers]);
    // }
}
