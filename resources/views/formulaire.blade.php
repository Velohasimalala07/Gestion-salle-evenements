   

<h2>{{ isset($profil) ? 'Modifier un profil' : 'Ajouter un profil' }}</h2>

<form action="{{ isset($profil) ? route('profils.update', $profil->id) : route('profils.store') }}" method="POST">
    @csrf

    <label for="nom">Nom :</label>
    <input type="text" name="nom" value="{{ old('nom', $profil->nom ?? '') }}" required> <br><br>

    <label for="prenom">Prénom :</label>
    <input type="text" name="prenom" value="{{ old('prenom', $profil->prenom ?? '') }}" required> <br><br>

    <button type="submit">{{ isset($profil) ? 'Modifier' : 'Ajouter' }}</button>
    
</form>
