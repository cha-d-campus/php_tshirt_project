<?php

namespace App\Http\Controllers;

use App\Services\ImageInterventionService;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Symfony\Component\Console\Input\Input;

class ImageInterventionController extends Controller
{
    public function mergeImages(string $model, string $imgSelected, string $folder, string $size, ImageInterventionService $imgInterService)
    {
        return $imgInterService->mergedImage($model, $imgSelected, $folder, $size);
    }

//    public function saveMergedImages(string $model, string $imgSelected, string $folder, string $size, ImageInterventionService $imgInterService){
//        return $imgInterService->mergedImage($model, $imgSelected, $size, true);
//    }

    public function upload(){
        $filename = 'uploadedImg-'.random_int(0,50).'.png';
        $img = Image::make(request()->file('uploaded_file'))->save('storage/img/uploaded/'.$filename);
        $img->response('png');
        return  back()
                ->with('success','Votre image a bien été téléchargé .')
                ->with('file', $filename);
    }
}
