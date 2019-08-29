<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Wallpaper;

class AdminController extends Controller
{
    public function index()
    {
    	if (Auth::user()) {
    		if(Auth::user()->isAdmin) {
    			$unapproved = Wallpaper::where('approved', 0)->SimplePaginate(24);
    			return view('admin', ['unapproved' => $unapproved]);
    		} else {
    			return redirect('/');
    		}
    	} else {
    		return redirect('/');
    	}
    }

    public function approve($id)
    {
    	if(Auth::user()->isAdmin) {
    		$wallpaper = wallpaper::find($id);
    		$wallpaper->approved = 1;
    		$wallpaper->save();

    		return redirect('/admin');
    	}
    }
}
