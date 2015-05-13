<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class ImageController extends Controller {

    public function __construct()
    {
        Image::configure(array(
            'driver' => extension_loaded('imagick') ? 'imagick' : 'gd'
        ));
    }

    public function showSizes($dimensions, $filters = '')
    {
        $imageSizes = $this->parseDimensions($dimensions);
        $filePath = $this->fetchImage();

        $image = Image::cache(function($image) use($filePath, $imageSizes, $filters)
        {
            $image->make($filePath)->fit($imageSizes['x'], $imageSizes['y']);

            if(env('IMAGE_FILTERS', false) === true)
            {
                switch($filters) {
                    case 'greyscale':
                        $image->greyscale();
                        break;
                    case 'invert':
                        $image->invert();
                        break;
//                    case 'blur':
//                        $image->blur(env('IMAGE_BLUR', 5));
//                        break;
                    case 'pixelate':
                        $image->pixelate(env('IMAGE_PIXEL', 10));
                        break;
                    default:
                        break;
                }
            }

        }, 3600, true);

        return $image->response();
    }

    public function showCategory($dimensions, $category, $filters = '')
    {

    }

    private function parseDimensions($dimensions)
    {
        $sizes = array();

        $sizes = explode('x', $dimensions);
        $width = (int) isset($sizes[0]) ? $sizes[0] : 800;
        $height = (int) isset($sizes[1]) ? $sizes[1] : 600;

        return array(
            'x' => $width,
            'y' => $height
        );
    }

    private function fetchImage($category = '*')
    {
        $imagebankPath = storage_path('app/' . ltrim(env('IMAGES_PATH'), '/'));
        $files = array();

        if($category === '*')
        {
            $files = glob($imagebankPath . '/**/*.{jpg,gif,png}', GLOB_BRACE);
        }

        return $files[array_rand($files, 1)];
    }

}
