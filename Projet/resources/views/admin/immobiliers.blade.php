@extends('admin.layout.app')

@section('content')
    <h1>List des immobiliers</h1>
    <a href="{{route('immobilier.create')}}" class="btn btn-primary">Ajouter un nouveau</a>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Titre</th>
            <th>surface</th>
            <th>Prix</th>
            <th>salle</th>
            <th>etage</th>
            <th>Etat</th>
            <th class="text-center">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($list as $item)
            <tr>
                <td>{{$item->titre}}</td>
                <td>{{$item->surface}}m<sup>2</sup></td>
                <td>{{$item->prix}} UMR</td>
                <td>{{$item->salle}}</td>
                <td>{{$item->etage}}</td>
                <td>{{$item->vendu}}</td>
                <td class="d-flex justify-content-around">
                    <a href="{{route('immobilier.edit',$item)}}" class="btn btn-primary">Modifier</a>
                    <form action="{{route('immobilier.destroy',$item)}}" method="POST">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger">Supprimer</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
<!--

-->