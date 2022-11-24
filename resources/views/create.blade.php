<!-- create.blade.php -->
@extends('layouts.layout_tshirt')

@section('content')
    <style>
        .uper {
            margin-top: 20px;
        }
    </style>

    <div class="card uper">
        <div class="card-header text-center">
            <h1>Créer un nouveau t-shirt</h1>
        </div>

        <div class="card-body m-auto">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br/>
            @endif

            <div class="mx-5 mb-2">
                <h4 class="fw-light text-center text-lg-start mt-2 mb-0">Choisir votre modèle de t-shirt :</h4>
                <hr class="mt-2 mb-2">
                <form method="get" action="{{ route('tshirt.create') }}" enctype="multipart/form-data"
                      class="row d-flex d-inline mt-2 p-4">
                    <div class="col-6">
                        <h5 class="mx-2">Tailles :</h5>
                        <div class="mt-4">
                            <input type="radio" id="sizeS" class="form-check-input mx-2" name="size" value="S" checked>
                            <label class="form-check-label mx-2" for="sizeS">Small</label>
                            <input type="radio" id="sizeM" class="form-check-input mx-2" name="size" value="M">
                            <label class="form-check-label mx-2" for="sizeM">Medium</label>
                            <input type="radio" id="sizeL" class="form-check-input mx-2" name="size" value="L">
                            <label class="form-check-label mx-2" for="sizeL">Large</label>
                            <input type="radio" id="sizeXL" class="form-check-input mx-2" name="size" value="XL">
                            <label class="form-check-label mx-2" for="sizeXL">XtraLarge</label>
                        </div>
                    </div>
                    <div class="col-6">
                        <h5 class="mx-2">Couleur :</h5>
                        <div class="row d-flex d-inline mt-4">
                            @foreach($modelColor as $color)
                                    <?php
                                    $path_parts = pathinfo($color);
                                    ?>
                                <div class="col-lg-3 col-md-4 col-6">
                                    <input type="submit" name="model" id="img_{{basename($color, '/')}}"
                                           class="input-hidden" value="{{$path_parts['filename']}}"/>
                                    <label for="img_{{basename($color, '/')}}">
                                        <div class="mh-100">
                                            <img class="img-thumbnail" src="/storage/{{$color}}"
                                                 alt="{{basename($color, '/')}}">
                                        </div>
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </form>
            </div>
            @php

            @endphp
            @if($model)

                <div class="row d-flex d-inline mt-2 mx-5 mb-2">
                    <h4 class="fw-light text-center text-lg-start mt-2 mb-0">Choisir un design :</h4>
                    <hr class="mt-2 mb-4">
                    <div class="col-6 mt-2">
                        @php
                            $folder = 'predefinedPicturesGallery';
                        @endphp
                        @if(session()->get('file'))
                            {{ $imgSelected = session()->get('file') }}
                            {{ $folder = 'uploaded' }}
                        @endif
                        @if($model == 'tshirt-black')
                            @if($imgSelected)
                            @php
                                $mergeImg = route('mergeImages', [$model, $size, $folder, $imgSelected]);
                            @endphp
                            {{-- Mettre une route capable d'afficher mon rendu --}}
                                <img class="img-thumbnail" src="{{asset($mergeImg)}}"
                                     alt="T-shirt black - {{$imgSelected}} ">
                            @else
                                <img class="img-thumbnail" src="{{asset('storage/img/modelsTshirt/tshirt-black.png')}}"
                                     alt="T-shirt Homme">
                            @endif
                        @elseif($model == 'tshirt-white')
                            @if($imgSelected)
                                @php
                                    $mergeImg = route('mergeImages', [$model, $size, $folder, $imgSelected]);
                                @endphp
                                <img class="img-thumbnail" src="{{asset($mergeImg)}}"
                                     alt="T-shirt black - {{$imgSelected}} ">
                            @else
                            <img class="img-thumbnail" src="{{asset('storage/img/modelsTshirt/tshirt-white.png')}}"
                                 alt="T-shirt Femme">
                            @endif
                        @endif
                    </div>
                    <div class="col-6">
                        <h5 class="fw-light text-center text-lg-start mt-1 mb-4">Design proposés :</h5>
                        <form method="get" action="{{ route('tshirt.create') }}" enctype="multipart/form-data">
                            <div class="row">
                                <input type="hidden" name="model" value="{{$model}}">
                                <input type="hidden" name="size" value="{{$size}}">
                                @foreach($images as $image)
                                    <div class="col-lg-3 col-md-4 col-6">
                                        <input type="submit" name="imgSelected" id="img_{{basename($image, '/')}}"
                                               class="input-hidden"
                                               value="{{basename($image, 'predefinedPicturesGallery/')}}"/>
                                        <label for="img_{{basename($image, '/')}}">
                                            <div class="m-1">
                                                <img class="img-thumbnail" src="/storage/{{$image}}"
                                                     alt="{{basename($image, '/')}}">
                                            </div>
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </form>
                        <form action="{{route('upload')}}" method="post" enctype="multipart/form-data">
                            <h5 class="fw-light text-center text-lg-start mt-1 mb-4">Design custom</h5>
                            @csrf
                            <div class="custom-file">
                                <input type="file" name="uploaded_file" class="custom-file-input" id="chooseFile">
                                <label class="custom-file-label" for="chooseFile">Select file</label>
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary btn-block mt-4">
                                Télécharger l'image
                            </button>
                        </form>
                    </div>
                </div>
                @if($imgSelected)
                    <div class="mt-4">
                        <form method="post" action="{{ route('tshirt.store') }}" class="d-flex justify-content-center">
                            @csrf
                            <input type="hidden" name="model" value="{{$model}}">
                            <input type="hidden" name="size" value="{{$size}}">
                            <input type="hidden" name="folder" value="{{$folder}}">
                            <input type="hidden" name="img_selected" value="{{$imgSelected}}">
                            <input type="hidden" name="url_img" value="{{$mergeImg}}">
                            <button type="submit" class="btn btn-warning mt-2 col-3">Valider mon choix</button>
                        </form>
                    </div>
                @endif
            @endif
        </div>
@endsection
