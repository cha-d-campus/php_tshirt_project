<?php

namespace App\Services;

use Intervention\Image\Facades\Image;

class ImageInterventionService
{
        public function mergedImage(string $model, string $imgSelected, string $size = 'L', string $folder, bool $isSaved = false){
            $pathModel = 'storage/img/modelsTshirt/' . $model . '.png';
            if($isSaved){
                $pathModel = 'storage/img/merged/' . $model . '.png';
            }
            $img = Image::make($pathModel);
            $pathImage = 'storage/img/'.$folder.'/'.$imgSelected;
            if($folder == 'upload'){

            }
            $imgResize = Image::make('storage/img/predefinedPicturesGallery/'.$imgSelected);
            $imgResize->resize(550, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->insert($imgResize, 'top-left',1200,520);
            if($isSaved){
                $img->save('storage/img/merged/'.$model.'_'.$size.'_merged_'.substr(basename($imgSelected),0,-4).'.png');
            }
            return $img->response('png');
        }
}
