<!DOCTYPE html>
<html>
<head>
    <title>Ajouter Offre</title>
</head>
<body>
    <h1 style="text-align:center;">Ajouter une nouvelle Offre</h1>

    @if($errors->any())
        <div style="color:red; text-align:center;">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
<form action="{{ route('offres.store') }}" method="POST" enctype="multipart/form-data" style="width:300px;margin:auto;">
    @csrf

    <label>Nom</label>
    <input type="text" name="nom"><br><br>

    <label>Capacité</label>
    <input type="number" name="capacite"><br><br>

    <label>Prix</label>
    <input type="number" step="0.01" name="prix"><br><br>

    <label>Description</label>
    <textarea name="description"></textarea><br><br>

    <label>Image</label>
    <input type="file" name="image"><br><br>

    <button type="submit">Ajouter</button>
</form>

</body>
</html>
