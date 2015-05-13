<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;

class ImageController extends Controller {

    public function showSizes($dimensions)
    {
        // Process Sizes (defaults if none set)
        $sizes = array();

        $sizes = explode('x', $dimensions);
        $width = (int) isset($sizes[0]) ? $sizes[0] : 800;
        $height = (int) isset($sizes[1]) ? $sizes[1] : 600;

        $filePath = $this->fetchImage();

        $manager = new ImageManager(array(
            'driver' => extension_loaded('imagick') ? 'imagick' : 'gd'
        ));

        $image = $manager->make($filePath)->fit($width, $height);
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
