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

    <h1>List des Clients</h1>
    <button href="" class="btn btn-primary"  onclick="show()">Ajouter un nouveau</button>
    <div class="form-control my-2" id="hidden" style="display: none">
        <form action="{{ route('client.store') }}" method="POST">
            @csrf
        <label for="">Nom Client</label>
        <input type="text" name=nom class="form-control">
        <label for="">Tel</label>
        <input type="number" name=tel class="form-control">
        <label for="">Numero NNI</label>
        <input type="text" name=nni class="form-control">
        <button class="btn btn-primary">Ajouter</button>
        </form>
    </div>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>#</th>
            <th>nom</th>
            <th>nni</th>
            <th>Tel</th>
            <th class="text-center">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($list as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->nom}}</td>
                <td>{{$item->nni}}</td>
                <td>{{$item->tel}}</td>
                <td class="d-flex justify-content-around">
                    <a href="{{route('client.edit',$item)}}" class="btn btn-primary">Modifier</a>
                    <form action="{{route('client.destroy',$item)}}" method="POST">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger">Supprimer</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
<script>
    function show(){
        document.getElementById('hidden').style.display='block';
    }
</script>
@endsection
<!--
-->