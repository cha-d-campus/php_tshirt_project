<?php

namespace App\Services;

use Intervention\Image\Facades\Image;

class ImageInterventionService
{
        public function mergedImage(string $model, string $size = 'L', string $folder, string $imgSelected, bool $isSaved = false){
            $width = 520;
            $x = 1200;
            $y = 520;
            $pathModel = 'storage/img/modelsTshirt/' . $model . '.png';
            if($isSaved){
                $pathModel = 'storage/img/merged/' . $model . '.png';
            }
            $img = Image::make($pathModel);
            $pathImage = 'storage/img/'.$folder.'/'.$imgSelected;
//            dd($pathImage);
            $imgResize = Image::make($pathImage);
            $imgResize->resize($width, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->insert($imgResize, 'top-left',$x,$y);
            if($isSaved){
                $img->save('storage/img/merged/'.$model.'_'.$size.'_merged_'.substr(basename($imgSelected),0,-4).'.png');
            }
            return $img->response('png');
        }

}
