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
                <button type="submit" class="btn btn-primary">Sélectionner</button>
            </form>

            @if($model)
                @if($model == 'homme')
                        <img src="/img/t-shirt_men.png" alt="T-shirt Homme">
                @elseif($model == 'femme')
                        <img src="/img/t-shirt_woman.png" alt="T-shirt Femme">
                @endif
            @endif


        </div>
    </div>
@endsection
