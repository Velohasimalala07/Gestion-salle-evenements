<!DOCTYPE html>
<html>
<head>
    <title>Modifier Matériel</title>
</head>
<body>

<h2>Modifier Matériel</h2>

<form action="{{ route('materiels.update',$materiel->id) }}" method="POST" enctype="multipart/form-data">
    @csrf

    <p>Nom :</p>
    <input type="text" name="nom" value="{{ $materiel->nom }}">

    <p>Description :</p>
    <textarea name="description">{{ $materiel->description }}</textarea>

    <p>Prix :</p>
    <input type="number" name="prix" value="{{ $materiel->prix }}">

    <p>Quantité :</p>
    <input type="number" name="quantite" value="{{ $materiel->quantite }}">

    <p>Image actuelle :</p>
    @if($materiel->image)
        <img src="/storage/{{ $materiel->image }}" width="100">
    @endif

    <p>Changer Image (optionnel) :</p>
    <input type="file" name="image" accept="image/*">

    <br><br>
    <button type="submit">💾 Enregistrer</button>
</form>

</body>
</html>
