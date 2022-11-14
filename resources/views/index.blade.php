<!-- index.blade.php -->

@extends('layout_tshirt')

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
            </div><br />
        @endif

        <table class="table table-striped">

            <thead>
            <tr>
                <td>ID</td>
                <td>Model</td>
                <td>Taille</td>
                <td colspan="2">Action</td>
            </tr>
            </thead>

            <tbody>
            @foreach($tshirts as $tshirt)
                <tr>
                    <td>{{$tshirt->id}}</td>
                    <td>{{$tshirt->model}}</td>
                    <td>{{$tshirt->size}}</td>
                    <td><a href="{{ route('tshirt.edit', $tshirt->id)}}" class="btn btn-primary">Modifier</a></td>
                    <td>
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
