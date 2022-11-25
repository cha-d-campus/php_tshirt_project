<?php

namespace App\Http\Controllers;

use App\Http\Requests\TshirtFormRequest;
use App\Jobs\ProcessPDF;
use App\Providers\TshirtCreated;
use App\Services\GeneratorPDFService;
use App\Services\ImageInterventionService;
use Illuminate\Http\Request;
use App\Models\Tshirt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class TshirtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tshirts = Tshirt::all();
        return view('index', compact('tshirts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $images = Storage::disk('public')->allFiles('img/predefinedPicturesGallery');
        $modelColor = Storage::disk('public')->allFiles('img/modelsTshirt');
        $imgUploaded = Storage::disk('public')->allFiles('img/uploaded');
        $data = [
            'modelColor' => $modelColor,
            'model' => $request->input('model'),
            'size'  => $request->input('size'),
            'images' => $images,
            'imgSelected' => $request->input('imgSelected'),
            'url_img' => $request->input('url_img')
        ];

        return view('create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TshirtFormRequest $request, ImageInterventionService $imgInterService, GeneratorPDFService $generatorPDFService)
    {
        $model = $request->validated('model');
        $size = $request->validated('size');
        $folder = $request->validated('folder');
        $img = $request->validated('img_selected');
        Storage::copy('public/img/modelsTshirt/'.$model.'.png','public/img/merged/'.$model.'.png');
        $imgInterService->mergedImage($model, $size, $folder, $img, true);
        $tshirt = new Tshirt();
        $tshirt -> model = $model;
        $tshirt -> size = $size;
        $tshirt -> url_img ='storage/img/merged/'.$model.'_'.$size.'_merged_'.substr(basename($img),0,-4).'.png';
        $tshirt -> name_img = $img;
        $tshirt ->save();
        ProcessPDF::dispatch($tshirt, $generatorPDFService)->delay(now()->addSecond(10));
        return redirect('/tshirt')->with('success', 'Votre t-shirt a été créé avec succèss !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('show', ['tshirt' => Tshirt::where('id',$id)->first()]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $tshirt = Tshirt::findOrFail($id);
        $images = Storage::disk('public')->allFiles('img/predefinedPicturesGallery');
        $modelColor = Storage::disk('public')->allFiles('img/modelsTshirt');
        $model =$request->has('model') ? $request->get('model') : $tshirt->model;
        $size = $request->has('size') ? $request->get('size') : $tshirt->size;
        $img = $request->has('imgSelected') ? $request->get('imgSelected') :$tshirt->name_img;
        if ($request){
            $data = [
                'tshirt' => $tshirt,
                'modelColor' => $modelColor,
                'model' => $model,
                'size'  => $size,
                'folder' => $request->input('folder'),
                'images' => $images,
                'imgSelected' => $img,
                'url_img' => $request->input('url_img')
            ];
        }

        return view('edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TshirtFormRequest $request, $id, ImageInterventionService $imgInterService)
    {
        $tshirt = Tshirt::findOrFail($id);
        $model = $request->validated('model');
        $size = $request->validated('size');
        $folder = $request->validated('folder');
        $img = $request->validated('img_selected');
        Storage::copy('public/img/modelsTshirt/'.$model.'.png','public/img/merged/'.$model.'.png');
        $imgInterService->mergedImage($model, $size, $folder, $img, true);
        $tshirt -> model = $model;
        $tshirt -> size = $size;
        $tshirt -> url_img ='storage/img/merged/'.$model.'_'.$size.'_merged_'.substr(basename($img),0,-4).'.png';
        $tshirt -> name_img = $img;
        $tshirt->update();
        return redirect('/tshirt')->with('success', 'Votre t-shirt a été modifié avec succèss !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tshirt::where('id', $id)->delete();
        return back();
    }
}
