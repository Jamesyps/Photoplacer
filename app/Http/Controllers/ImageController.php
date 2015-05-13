<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class ImageController extends Controller {

    public function showSizes($dimensions)
    {
        // Process Sizes (defaults if none set)
        $sizes = array();

        $sizes = explode('x', $dimensions);
        $width = (int) isset($sizes[0]) ? $sizes[0] : 800;
        $height = (int) isset($sizes[1]) ? $sizes[1] : 600;

        $filePath = $this->fetchImage();

        Image::configure(array(
            'driver' => extension_loaded('imagick') ? 'imagick' : 'gd'
        ));

        $image = Image::cache(function($image) use($filePath, $width, $height)
        {
            $image->make($filePath)->fit($width, $height);
        }, 3600, true);

        return $image->response();
    }

    private function fetchImage($category = '*')
    {
        $imagebankPath = storage_path('app/imagebank');
        $files = array();

        if($category === '*')
        {
            $files = glob($imagebankPath . '/**/*.{jpg,gif,png}', GLOB_BRACE);
        }

        return $files[array_rand($files, 1)];
    }

}
