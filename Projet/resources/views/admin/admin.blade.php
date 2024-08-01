@extends('admin.layout.app')

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="row justify-content-around gap-2 my-5">
    <div class="bg-info rounded col-4 pt-2 pl-2">
        <p>Nombre de clients :</p>
        <h5>{{$client->count()}}</h5>
    </div>
    <div class="bg-info rounded col-4 pt-2 pl-2">
        <p>Nombre  total d'immobiliers :</p>
        <h5>{{$NombreImmobiliers}}</h5>
    </div>
    <div class="bg-info rounded col-4 pt-2 pl-2">
        <p>Nombre d'Immobiliers vendu :</p>
        <h5>{{$immobiliersVendu}}</h5>
    </div>
    <div class="bg-info rounded col-4 pt-2 pl-2">
        <p>Nombre d'Immobiliers en attend :</p>
        <h5>{{$immobiliers->count()}}</h5>
    </div>
</div>
<form action="{{ route('admin.store') }}" method="POST">
    @csrf
    <div class="row">
    <div class="col-6">
        <h3>List des immobiliers disponible</h3>
        <select class="form-control" name="immobilier_id">
            @foreach ($immobiliers as $item)
                    <option value="{{$item->id}}">{{$item->titre}}->prix:{{$item->prix}}</option>
            @endforeach
        </select>
    </div>
    <div class="col-6">
    <h3>List des Clients</h3>
    <select class="form-control" name="client_id">
        @foreach ($client as $item)
        <option value="{{$item->id}}">{{$item->nom}}->nni:{{$item->tel}}</option>
        @endforeach
    </select>
</div>
</div>
<button class="btn btn-primary mt-4">Vendre</button>
</form>

<h3>List des Vendre</h3>
<table class="table table-striped">
    <thead>
        <th>#</th>
        <th>Titre</th>
        <th>Prix</th>
        <th>Nom client</th>
        <th>Tel client</th>
        <th class="text-center">Action</th>
    </thead>
    <tbody>
        @foreach ($listVendre as $item)
        <tr>
            <td class="fw-semibold">{{ $item->id }}</td>
            <td>{{ $item->ImmeubleVendre->titre }}</td>
            <td>{{ $item->ImmeubleVendre->prix }}UMR</td>
            <td>{{ $item->client->nom }}</td>
            <td>{{ $item->client->tel }}</td>
            <td class="d-flex justify-content-around">
                <a class="btn btn-primary" href="{{route('imprimer',['id'=>$item->id])}}">Imprimer</a>
                <form action="{{route('admin.destroy',$item->id)}}" method="POST">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger">Annuler la vente</button>
                </form>
            </td>
          </tr>
        @endforeach
    </tbody>
</table>
@endsection
<!--
-->