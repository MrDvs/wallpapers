<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Wallpaper;
use Carbon\Carbon;
use Image;
use Illuminate\Support\Facades\Storage;

class ImportController extends Controller
{
    public function importToDB()
    {
    // 	$images = scandir('img');

    // 	foreach ($images as $key => $image) {
    // 		if ($image != '.' && $image != '..') {
    // 			echo $image;
    // 			echo "<br>";

				// $imageTitle = str_replace('_', ' ', implode('_', explode('_', $image, -1)));
				// echo $imageTitle;
				// echo "<br><br>";
    // 		}
    // 	}

    	// header("Content-Type: text/html; charset=ISO-8859-1");
	    
    	$row = 1;
    	if (file_exists("../python/img_data.csv")) {
			if (($handle = fopen("../python/img_data.csv", "r")) !== FALSE) {
			  while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
			    $num = count($data);

			    for ($c=0; $c < $num; $c++) {
			        echo $data[$c] . "<br />\n";
			    }

			    echo utf8_encode(str_replace('_', ' ', $data[0]));
			    echo "<br>";
			    $imageFormat = getimagesize('../storage/app/public/'.$data[2].'.jpg');

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


			    echo "<br><br>";

			    $thumbnail = Image::make('../storage/app/public/'.$data[2].'.jpg');
			    $thumbnail->fit(293, 165);
			    // $img->save('img/thumbnail/t'.$data[2].'.jpg', 90);
			    $thumbnail->save('../storage/app/public/thumbnails/t'.$data[2].'.jpg', 90);

			    $wallpaper = new Wallpaper;
			    $wallpaper->title = utf8_encode(str_replace('_', ' ', $data[0]));
			    $wallpaper->author = $data[1];
			    $wallpaper->file_location = $data[2].'.jpg';
			    $wallpaper->thumbnail_location = 'thumbnails/t'.$data[2].'.jpg';
			    $wallpaper->format = $imageFormat[0].'x'.$imageFormat[1];
			    $wallpaper->resolution = $resolution;
			    $wallpaper->created_at = Carbon::now();
			    $wallpaper->updated_at = Carbon::now();
			    $wallpaper->save();

			  }
			  fclose($handle);
			  // unlink("../python/img_data.csv");
			  echo 'klaar';
			}
		} else {
			echo 'deze file bestaat niet';
		}
    }
}
