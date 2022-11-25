<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Tshirt;
use App\Services\ImageInterventionService;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ImageApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Tshirt::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model = $request->input('model');
        $size = $request->input('size');
        $imgSelected = $request->input('imgSelected');
        $width = 520;
        $x = 1200;
        $y = 520;
        $pathModel = 'storage/img/modelsTshirt/' . $model . '.png';
        $img = Image::make($pathModel);
        $imgResize = Image::make($imgSelected);
        $imgResize->resize($width, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        $img->insert($imgResize, 'top-left',$x,$y);
        $path = 'storage/img/merged/'.$model.'_'.$size.'_merged_'.substr(basename($imgSelected),0,-4).'.png';
        $img->save($path);
        $thirt = Tshirt::create([
            'model' => $model,
            'size' => $size,
            'url_img' => asset($path),
            'name_img' => 't-shirt'
        ]);
        return $thirt;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Tshirt::where('id',$id)->get();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
