<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wallpaper extends Model
{
    public function tags()
    {
    	$this->belongsToMany('App\Tag')
    		->withTimestamps();
    }
}
