<!DOCTYPE html>
<html>
<head>
    <title>Liste des matériels</title>
</head>
<body>

<h2>Liste des matériels</h2>

<a href="{{ route('materiels.create') }}">➕ Ajouter matériel</a>

@if(session('success'))
    <p style="color:green">{{ session('success') }}</p>
@endif

<table border="1" cellpadding="6">


    <tr>
        <th>Nom</th>
        <th>Prix</th>
        <th>Quantité</th>
        <th>Image</th>
    </tr>

    @foreach($materiels as $m)

    <tr>
    <td>{{ $m->nom }}</td>
    <td>{{ $m->prix }} Ar</td>
    <td>{{ $m->quantite }}</td>

    <td>
        @if($m->image)
            <img src="/storage/{{ $m->image }}" width="80">
        @endif
    </td>

    <td>
        <a href="{{ route('materiels.edit',$m->id) }}"> Modifier</a>

        <form action="{{ route('materiels.destroy',$m->id) }}" method="POST" style="display:inline">
            @csrf
            <button type="submit" onclick="return confirm('Supprimer vraiment ?')">
                🗑 Supprimer
            </button>
        </form>
    </td>
</tr>
 

    <!-- <tr>
        <td>{{ $m->nom }}</td>
        <td>{{ $m->prix }} Ar</td>
        <td>{{ $m->quantite }}</td>
        <td>
            @if($m->image)
                <img src="/storage/{{ $m->image }}" width="80">
            @endif
        </td>
    </tr> -->
    @endforeach
    <div class="btn-row">
          
            <a href="/reservation" class="btn-secondary">Se connecter</a>
        </div>
</table>

</body>
</html>
