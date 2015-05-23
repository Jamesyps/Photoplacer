<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class ImageController extends Controller {

    /**
     * Set up Image Editing Environment
     */
    public function __construct()
    {
        Image::configure(array(
            'driver' => extension_loaded('imagick') ? 'imagick' : 'gd'
        ));
    }

    /**
     * Show Sizes
     *
     * Returns an image of the requested dimensions, optionally with a filter
     *
     * @param $dimensions
     * @param string $filters
     * @return mixed
     */
    public function showSizes($dimensions, $filters = '')
    {
        $imageSizes = $this->parseDimensions($dimensions);
        $filePath = $this->fetchImage();

        return $this->renderImage($filePath, $imageSizes, $filters)->response();
    }

    /**
     * Show Category
     *
     * Returns an image from a category, optionally with a filter
     *
     * @param $dimensions
     * @param $category
     * @param string $filters
     * @return mixed
     */
    public function showCategory($dimensions, $category, $filters = '')
    {
        $imageSizes = $this->parseDimensions($dimensions);
        $filePath = $this->fetchImage($category);

        return $this->renderImage($filePath, $imageSizes, $filters)->response();
    }

    /**
     * Render Image
     *
     * Returns an Intervention/Image Object after being manipulated with the defined parameters
     *
     * @param $filePath
     * @param $imageSizes
     * @param $filters
     * @return mixed
     */
    private function renderImage($filePath, $imageSizes, $filters)
    {
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
                    case 'blur':
                        $image->blur(env('IMAGE_FILTERS_BLUR', 5));
                        break;
                    case 'pixelate':
                        $image->pixelate(env('IMAGE_FILTERS_PIXELATE', 10));
                        break;
                    default:
                        break;
                }
            }

        }, 3600, true);

        return $image;
    }

    /**
     * Parse Dimensions
     *
     * Returns workable values from a dimensions string (width x height)
     *
     * @param $dimensions
     * @return array
     */
    private function parseDimensions($dimensions)
    {
        $sizes = array();

        $sizes = explode('x', $dimensions);
        $width = (int) isset($sizes[0]) ? $sizes[0] : env('IMAGES_DEFAULT_X', 600);
        $height = (int) isset($sizes[1]) ? $sizes[1] : env('IMAGES_DEFAULT_y', 400);

        return array(
            'x' => $width,
            'y' => $height
        );
    }

    /**
     * Fetch Image
     *
     * Returns a randomly selected image from the imagebank, can be narrowed by category
     *
     * @param string $category
     * @return mixed
     */
    private function fetchImage($category = '*')
    {
        $imagebankPath = storage_path('app/' . ltrim(env('IMAGES_PATH'), '/'));
        $files = array();

        if($category === '*')
        {
            $files = glob($imagebankPath . '/**/*.{jpg,gif,png}', GLOB_BRACE);
        }
        else
        {
            if(!file_exists($imagebankPath .'/'. $category))
            {
                abort(404);
            }

            $files = glob($imagebankPath .'/'. $category . '/*.{jpg,gif,png}', GLOB_BRACE);
        }

        return $files[array_rand($files, 1)];
    }

}
