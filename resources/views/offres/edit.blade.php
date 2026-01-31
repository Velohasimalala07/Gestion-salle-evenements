<!DOCTYPE html>
<html>
<head>
    <title>Modifier Offre</title>
</head>
<body>
    <h1 style="text-align:center;">Modifier Offre</h1>

    @if($errors->any())
        <div style="color:red; text-align:center;">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('offres.update', $offre->id) }}" method="POST" enctype="multipart/form-data" style="width:300px;margin:auto;">
    @csrf
    @method('PUT')

    <label>Nom</label>
    <input type="text" name="nom" value="{{ $offre->nom }}"><br><br>

    <label>Capacité</label>
    <input type="number" name="capacite" value="{{ $offre->capacite }}"><br><br>

    <label>Prix</label>
    <input type="number" step="0.01" name="prix" value="{{ $offre->prix }}"><br><br>

    <label>Description</label>
    <textarea name="description">{{ $offre->description }}</textarea><br><br>

    <label>Nouvelle image (optionnel)</label>
    <input type="file" name="image"><br><br>

    @if($offre->image)
        <img src="{{ asset('storage/'.$offre->image) }}" width="120">
    @endif

    <button type="submit">Modifier</button>
</form>

</body>
</html>
