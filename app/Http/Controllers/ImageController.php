<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class ImageController extends Controller {

    private $imagesPath;

    /**
     * Set up Image Editing Environment
     */
    public function __construct()
    {
        Image::configure(array(
            'driver' => extension_loaded('imagick') ? 'imagick' : 'gd'
        ));

        $this->imagesPath = storage_path('app/' . ltrim(env('IMAGES_PATH'), '/'));
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
     *
     * @todo move private methods to own classes
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
     *
     * @todo move private methods to own classes
     */
    private function parseDimensions($dimensions)
    {
        $sizes = array();

        $sizes = explode('x', $dimensions);
        $width = (int) isset($sizes[0]) ? $sizes[0] : env('IMAGES_DEFAULT_X', 600);
        $height = (int) isset($sizes[1]) ? $sizes[1] : env('IMAGES_DEFAULT_y', 400);

        if($width < 1 || $width > env('IMAGES_MAX_X', 600))
        {
            $width = env('IMAGES_DEFAULT_X', 600);
        }

        if($height < 1 || $height > env('IMAGES_MAX_Y', 600))
        {
            $height = env('IMAGES_DEFAULT_Y', 400);
        }

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
     *
     * @todo move private methods to own classes
     */
    private function fetchImage($category = '*')
    {
        switch($category)
        {
            case '*':
                $file = $this->fetchImagesFromAll();
                break;
            default:
                $file = $this->fetchImagesFromCategory($category);
                break;
        }

        if(!$file)
        {
            abort(404);
        }

        return $file;
    }

    /**
     * Fetch Images From All
     *
     * Returns a random image out of all the images in the storage area
     *
     * @return bool / string
     *
     * @todo move private methods to own classes
     */
    private function fetchImagesFromAll()
    {
        $files = glob($this->imagesPath . '/**/*.{jpg,gif,png}', GLOB_BRACE);

        if(empty($files))
        {
            return false;
        }

        return $files[array_rand($files, 1)];
    }

    /**
     * Fetch Images From Category
     *
     * Returns a random image from a specific folder in the storage area
     *
     * @param $category
     * @return bool / string
     *
     * @todo move private methods to own classes
     */
    private function fetchImagesFromCategory($category)
    {
        $files = glob($this->imagesPath .'/'. $category . '/*.{jpg,gif,png}', GLOB_BRACE);

        if(empty($files))
        {
            return false;
        }

        return $files[array_rand($files, 1)];
    }

}
