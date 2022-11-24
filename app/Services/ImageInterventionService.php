<?php

namespace App\Services;

use Intervention\Image\Facades\Image;

class ImageInterventionService
{
        public function mergedImage(string $model, string $size = 'L', string $folder, string $imgSelected, bool $isSaved = false){
            $pathModel = 'storage/img/modelsTshirt/' . $model . '.png';
//            dd($folder);
            if($isSaved){
                $pathModel = 'storage/img/merged/' . $model . '.png';
            }
            $img = Image::make($pathModel);
            $pathImage = 'storage/img/'.$folder.'/'.$imgSelected;
            $imgResize = Image::make($pathImage);

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
