<?php

namespace App\Http\Controllers;

use App\Http\Requests\TshirtFormRequest;
use Illuminate\Http\Request;
use App\Models\Tshirt;
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
    public function store(TshirtFormRequest $request)
    {
        $tshirt = new Tshirt();
        $tshirt -> model = $request->validated('model');
        $tshirt -> size = $request->validated('size');
        $tshirt -> url_img = $request->validated('url_img');
        $tshirt ->save();
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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

    }
}
