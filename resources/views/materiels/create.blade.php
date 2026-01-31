<!DOCTYPE html>
<html>
<head>
    <title>Ajouter Matériel</title>
</head>
<body>

<h2>Ajouter Matériel</h2>

<form action="{{ route('materiels.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <p>Nom :</p>
    <input type="text" name="nom">

    <p>Description :</p>
    <textarea name="description"></textarea>

    <p>Prix :</p>
    <input type="number" name="prix">

    <p>Quantité :</p>
    <input type="number" name="quantite">

    <p>Image (Galerie) :</p>
    <input type="file" name="image" accept="image/*">

    <br><br>
    <button type="submit">Enregistrer</button>
</form>

</body>
</html>
