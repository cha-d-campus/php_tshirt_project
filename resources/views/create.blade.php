<!-- create.blade.php -->
@extends('layouts.layout_tshirt')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>

    <div class="card uper">
        <div class="card-header text-center">
            <h3>Créer un nouveau t-shirt</h3>
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
                <h4 class="fw-light text-center text-lg-start mt-4 mb-0">Choisir votre modèle de t-shirt :</h4>

                <hr class="mt-2 mb-5 ">

            <form method="get" action="{{ route('tshirt.create') }}">
                @csrf
                <div class="form-group d-flex">
                    <h5 class="mx-2">Modèles :</h5>
                    <div class="d-flex">
                        <input type="radio" id="man" class="form-check-input mx-2" name="model" value="homme">
                        <label class="form-check-label mx-2" for="man">Homme</label>
                        <input type="radio" id="woman" class="form-check-input mx-2" name="model" value="femme">
                        <label class="form-check-label mx-2" for="woman">Femme</label>
                    </div>
                </div>
                <div class="form-group d-flex">
                    <h5 class="mx-2">Tailles :</h5>
                    <div class="d-flex">
                        <input type="radio" id="sizeS" class="form-check-input mx-2" name="size" value="S">
                        <label class="form-check-label mx-2" for="sizeS">Small</label>
                        <input type="radio" id="sizeM" class="form-check-input mx-2" name="size" value="M">
                        <label class="form-check-label mx-2" for="sizeM">Medium</label>
                        <input type="radio" id="sizeL" class="form-check-input mx-2" name="size" value="L">
                        <label class="form-check-label mx-2" for="sizeL">Large</label>
                        <input type="radio" id="sizeXL" class="form-check-input mx-2" name="size" value="XL">
                        <label class="form-check-label mx-2" for="sizeXL">XtraLarge</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-warning mt-2">Sélectionner</button>
            </form>

            @if($model)
                <div class="row d-flex d-inline mt-4">
                    <div class="col-6">
                        @if($model == 'homme')
                            <img class="img-thumbnail" src="/img/modelsTshirt/t-shirt_men.png" alt="T-shirt Homme">
                        @elseif($model == 'femme')
                            <img class="img-thumbnail" src="/img/modelsTshirt/t-shirt_woman.png" alt="T-shirt Femme">
                        @endif
                    </div>
                    <div class="col-6">
                        <h4 class="fw-light text-center text-lg-start mt-4 mb-0">Choisir un design :</h4>

                        <hr class="mt-2 mb-5">

                        <form method="get" action="{{ route('tshirt.create') }}">
                            <div class="row">
                                <input type="hidden" name="model" value="{{$model}}">
                                <input type="hidden" name="size" value="{{$size}}">
                            @foreach($images as $image)
                                <div class="col-lg-3 col-md-4 col-6">
                                    <input type="submit" name="imgSelected" id="img_{{basename($image, '/')}}" class="input-hidden" value="{{basename($image, 'predefinedPicturesGallery/')}}"/>
                                    <label for="img_{{basename($image, '/')}}">
                                        <div class="mh-100">
                                            <img class="img-thumbnail" src="/storage/{{$image}}" alt="{{basename($image, '/')}}">
                                        </div>
                                    </label>
                                </div>
                            @endforeach
                            </div>
                        </form>
                    </div>






            @endif


        </div>
    </div>
@endsection
