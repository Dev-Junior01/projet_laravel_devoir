<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{asset('css/all.min.css') }}">
    <title>Imprimer</title>
</head>
<body>
    <div class="container mt-5">
    <h1 class="text-center">Document d'allégeance</h1>
    <h4>Ce terrain a été vendu en vertu des présentes pour le montant qui a été entièrement payé conformément aux conditions convenues.
        Les deux parties s'engagent à soumettre tous les documents pertinents et à mettre en œuvre les procédures nécessaires pour transférer la propriété du terrain et 
        l'enregistrer auprès de l'agence immobilière compétente. Le vendeur confirme que 
        le terrain est libre de toute obligation légale ou réclamation de tiers.</h4>
    <h3>Informations Terrain</h3>
    <table class="table table-striped mt-2">
    <thead>
        <th>Titre</th>
        <th>Prix</th>
        <th>description</th>
        <th>salle</th>
        <th>etage</th>
        <th>surface</th>
    </thead>
    <tbody>
        @foreach ($listVendre as $item)
        <tr>
            <td>{{ $item->ImmeubleVendre->titre }}</td>
            <td>{{ $item->ImmeubleVendre->prix }}</td>
            <td>{{ $item->ImmeubleVendre->description }}</td>
            <td>{{ $item->ImmeubleVendre->salle }}</td>
            <td>{{ $item->ImmeubleVendre->etage }}</td>
            <td>{{ $item->ImmeubleVendre->surface  }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
    <h3>Informations Personelle : </h3>
    <table class="table table-striped">
        <thead>
            <th>Nom</th>
            <th>Numero Telephone</th>
            <th>NNI</th>
        </thead>
        <tbody>
            @foreach ($listVendre as $item)
            <tr>
                <td>{{ $item->client->nom }}</td>
                <td>{{ $item->client->tel }}</td>
                <td>{{ $item->client->nni }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h5 class="text-center">
        Le :
        @foreach ($listVendre as $item)
            {{$item->created_at}}
        @endforeach
    </h5>

</div>
<script>
window.addEventListener('load',()=>{
    window.print();
})
</script>


    <script src="{{asset('js/bootstrap.bundle.min.js') }}">
    </script>
    <script src="{{asset('js/all.min.js') }}">
    </script>
</body>
</html>