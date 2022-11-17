<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ImageInterventionController extends Controller
{
    public function mergeImages(string $model, string $imgSelected)
    {
        $img = Image::make('storage/img/modelsTshirt/' . $model . '.png');
        $imgResize = Image::make('storage/img/predefinedPicturesGallery/'.$imgSelected);
        $imgResize->resize(550, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        $img->insert($imgResize, 'top-left',1200,520);
        return $img->response('png');
    }
}