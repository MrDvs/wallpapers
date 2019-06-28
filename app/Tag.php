<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function wallpapers()
    {
    	return $this->belongsToMany('App\wallpapers')
    		->withTimestamps();
    }
}
