<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Wallpaper;
use Carbon\Carbon;

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

    	$row = 1;
    	if (file_exists("../python/img_data.csv")) {
			if (($handle = fopen("../python/img_data.csv", "r")) !== FALSE) {
			  while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
			    $num = count($data);

			    for ($c=0; $c < $num; $c++) {
			        echo $data[$c] . "<br />\n";
			    }

			    $replace = array("’", "_");
			    $newValues = array(" ", " ");

			    $wallpaper = new Wallpaper;
			    $wallpaper->title = str_replace($replace, $newValues, $data[0]);
			    $wallpaper->author = $data[1];
			    $wallpaper->file_location = 'img/'.$data[2].'.jpg';
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
