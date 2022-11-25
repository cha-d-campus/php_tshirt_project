{{--<h2>{{$tshirt->id}}</h2>--}}

{{--<p>{{$tshirt->model}}</p>--}}
{{--<img src="{{public_path('storage/img/merged/'.basename($tshirt->url_img, '/'))}}" alt="" style="width:400px">--}}

<div style="display: block;">
    <img src="{{public_path('storage/img/logo/Logo.png')}}" alt="Logo" width="65" height="auto" style="margin-top: 10px;">
    <p style="font-size: 24px">Custom'|T</p>
    <hr style=" border: black solid 2px; border-radius: 50px;">
</div>
<div style="display: flex; justify-content: center">
    <h1 style="text-align: center">T-shirt custom n° {{$tshirt->id}} </h1>
    <hr style=" border: black solid 1px; border-radius: 50px; width: 400px;">
    <img src="{{public_path('storage/img/merged/'.basename($tshirt->url_img, '/'))}}" class="card-img-top" alt="{{$tshirt->id}}_{{$tshirt->name_img}}" style="width: 740px; margin: auto">
    <p style="font-weight: bold; font-size: 24px; text-align: center">Couleur : {{substr($tshirt->model, 7)}} | Taille : {{$tshirt->size}}</p>
</div>
