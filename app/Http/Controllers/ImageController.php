<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller {

    public function showSizes($dimensions)
    {
        // Process Sizes (defaults if none set)
        $sizes = array();

        $sizes = explode('x', $dimensions);
        $width = (int) isset($sizes[0]) ? $sizes[0] : 800;
        $height = (int) isset($sizes[1]) ? $sizes[1] : 600;

        var_dump($this->fetchImage());
    }

    private function fetchImage($category = '*')
    {
        $imagebankPath = 'imagebank';
        $files = array();

        if($category === '*')
        {
            $files = Storage::allFiles($imagebankPath);
        }

        return $files[array_rand($files, 1)];
    }

}
