@extends('admin.layout.app')

@section('titre')
    Ajouter un nouveau
@endsection


@section('content')
    <h1 class="text-center">Ajouter un nouveau</h1>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <form class="vstack gap-2" action="{{route('immobilier.store')}}" method="POST">
        @csrf
            <div class="row">
                <div class="col-6">
                    <label for="">Titre</label>
                <input type="text" name=titre class="form-control">
                </div>
                <div class="col-3">
                    <label for="">Surface</label>
                <input type="number" min=0  name=surface class="form-control col-3">
                </div>
                <div class="col-3">
                    <label for="">Prix</label>
                <input type="number" min=0  name=prix class="form-control col-3">
                </div>
                <div class="col-12">
                    <label for="">Description</label>
                <textarea name="description" class="form-control col-12" id="" cols="30" rows="5"></textarea>
                </div>
                <div class="col-4">
                    <label for="">Salle</label>
                <input type="number" min=0  name=salle class="form-control col-4">
                </div>
                <div class="col-4">
                    <label for="">etage</label>
                <input type="number" min=0  name=etage class="form-control col-4">
            </div>
            </div>
            <button type="submit" class="btn btn-primary" >Crée</button>
    </form>
@endsection