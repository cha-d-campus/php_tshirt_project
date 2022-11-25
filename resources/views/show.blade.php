<!-- index.blade.php -->

@extends('layouts.layout_tshirt')

@section('content')

    <style>
        .uper {
            margin-top: 40px;
        }
    </style>

    <div class="uper">
        <div class="d-flex justify-content-center">
            <div class="card d-flex" style="width: 54rem;">
                <div class="card-header">
                    <h1 class="text-center">T-shirt n° {{$tshirt->id}} </h1>
                </div>
                <div>
                    <img src="{{asset($tshirt->url_img)}}" class="card-img-top" alt="{{$tshirt->id}}_{{$tshirt->name_img}}">
                    <div class="card-body">
                        <h5>Couleur : {{substr($tshirt->model, 7)}} | Taille : {{$tshirt->size}}</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
