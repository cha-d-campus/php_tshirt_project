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
            @if(session()->get('success'))
                <div class="alert alert-success w-75">
                    {{ session()->get('success') }}
                </div><br/>
            @endif
            @if($tshirts->isEmpty())
                <div class="alert alert-danger w-75" role="alert">
                    Votre liste de t-shirt est vide !! :(
                </div>
            @endif
        </div>
        <div class="d-flex justify-content-center">
            <table class="table table-striped w-75">
                <thead>
                <tr>
                    <td>ID</td>
                    <td>Model</td>
                    <td>Taille</td>
                    <td>Visuel</td>
                    <td colspan="2">Action</td>
                </tr>
                </thead>
                <tbody>

                @foreach($tshirts as $tshirt)
{{--                    @dd($tshirts)--}}
                    <tr class="h-25">
                        <td class="align-middle">{{$tshirt->id}}</td>
                        <td class="align-middle">{{$tshirt->model}}</td>
                        <td class="align-middle">{{$tshirt->size}}</td>
                        <td><img src="{{$tshirt->url_img}}" alt="img-tshirt" class="img-thumbnail"
                                 style="width: 10rem;"></td>
                        <td class="align-middle">
                            <div class="d-flex d-inline">
                                <button type="button" class="btn mx-2" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">
                                    <img src="../storage/img/icons/icon_show_color.png" alt="icone modifier"
                                         style="width: 26px; height: auto">
                                </button>
                                <a href="{{ route('tshirt.edit', $tshirt->id)}}" class="btn mx-2">
                                    <img src="../storage/img/icons/icon_modify_color.png" alt="icone modifier"
                                         style="width: 26px; height: auto"></a>
                                <form action="{{ route('tshirt.destroy', $tshirt->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn mx-2" type="submit">
                                        <img src="../storage/img/icons/icon_trash_color.png" alt="icone modifier"
                                             style="width: 26px; height: auto">
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">T-shirt : {{substr($tshirt->model, 7)}}
                            | Taille : {{$tshirt->size}}</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <img src="{{$tshirt->url_img}}" alt="img-tshirt" class="img-thumbnail">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
