<!-- index.blade.php -->

@extends('layouts.layout_tshirt')

@section('content')

    <style>
        .uper {
            margin-top: 40px;
        }
    </style>

    <div class="uper">

        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div><br/>
        @endif

        <table class="table table-striped">

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
                <tr class="h-25">
                    <td class="align-middle">{{$tshirt->id}}</td>
                    <td class="align-middle">{{$tshirt->model}}</td>
                    <td class="align-middle">{{$tshirt->size}}</td>
                    <td><img src="{{$tshirt->url_img}}" alt="img-tshirt" class="img-thumbnail" style="width: 10rem;"></td>
                    <td class="align-middle"><a href="{{ route('tshirt.edit', $tshirt->id)}}" class="btn btn-primary">Modifier</a></td>
                    <td class="align-middle">
                        <form action="{{ route('tshirt.destroy', $tshirt->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div>
@endsection
