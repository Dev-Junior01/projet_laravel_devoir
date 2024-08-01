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

<form action="{{ route('client.update',$client) }}" method="POST">
    @method('PUT')
    @csrf
    <label for="">Nom Client</label>
        <input type="text" name=nom value="{{$client->nom}}" class="form-control">
        <label for="">Tel</label>
        <input type="number" name=tel value="{{$client->tel}}" class="form-control">
        <label for="">Numero NNI</label>
        <input type="text" name=nni value="{{$client->nni}}" class="form-control">
<button class="btn btn-primary">Modifier</button>
</form>
<a href="{{route('client.index')}}" class="btn btn-dark">Annuler</a>
@endsection