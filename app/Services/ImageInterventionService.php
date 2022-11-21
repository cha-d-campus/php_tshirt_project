<?php

namespace App\Services;

use Intervention\Image\Facades\Image;

class ImageInterventionService
{
        public function mergedImage(string $model, string $imgSelected, string $size = 'L', bool $isSaved = false){
            $path = 'storage/img/modelsTshirt/' . $model . '.png';
            if($isSaved){
                $path = 'storage/img/merged/' . $model . '.png';
            }
            $img = Image::make($path);
            $imgResize = Image::make('storage/img/predefinedPicturesGallery/'.$imgSelected);
            $imgResize->resize(550, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->insert($imgResize, 'top-left',1200,520);
            if($isSaved){
                $img->save('storage/img/merged/'.$model.'_'.substr(basename($imgSelected),0,-4).'_'.$size.'_merged.png');
            }
            return $img->response('png');
        }
}
