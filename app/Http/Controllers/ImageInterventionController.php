<?php

namespace App\Http\Controllers;

use App\Services\ImageInterventionService;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ImageInterventionController extends Controller
{
    public function mergeImages(string $model, string $imgSelected, string $size, ImageInterventionService $imgInterService)
    {
        return $imgInterService->mergedImage($model, $imgSelected, $size , 'predefinedPicturesGallery');
    }

    public function saveMergedImages(string $model, string $imgSelected,  string $size, ImageInterventionService $imgInterService){
        return $imgInterService->mergedImage($model, $imgSelected, $size, 'predefinedPicturesGallery', true);
    }

    public function upload(string $model, string $imgSelected,  string $size, ImageInterventionService $imgInterService){
        return $imgInterService->mergedImage($model, $imgSelected, $size, 'predefinedPicturesGallery', true);
    }

}
