@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Gestion des voyages</h2>
    <h3> HOTELS</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Formulaire Ajouter / Modifier --}}
    <form action="{{ isset($hotel) ? route('hotels.update', $hotel->id) : route('hotels.store') }}" method="POST">
        @csrf
        <input type="text" name="nom" placeholder="Nom" value="{{ $hotel->nom ?? '' }}" required><br><br>
        <input type="number" name="services_offerts" placeholder="Durée (jours)" value="{{ $hotel->duree ?? '' }}" required><br><br>
        <input type="text" name="types_chambres" placeholder="Type de chambre" value="{{ $voyage->type_chambres ?? '' }}" required><br><br>
        <input type="number" step="0.01" name="prix" placeholder="Prix" value="{{ $voyage->prix ?? '' }}" required><br><br>
        <button type="submit">{{ isset($voyage) ? 'Modifier' : 'Enregistrer' }}</button>
    </form>

    <hr>

    {{-- Liste des hotels --}}
    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Services_offerts</th>
            <th>Type de chambre</th>
            <th>Prix</th>
            <th>Actions</th>
        </tr>
        @foreach($hotels as $v)
        <tr>
            <td>{{ $v->id }}</td>
            <td>{{ $v->nom }}</td>
            <td>{{ $v->services_offerts }}</td>
            <td>{{ $v->types_chambres }}</td>
            <td>{{ $v->prix }}</td>
            <td>
                <a href="{{ route('hotels.edit', $v->id) }}">Modifier</a>
                <form action="{{ route('hotels.destroy', $v->id) }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" onclick="return confirm('Voulez-vous supprimer ?')">Supprimer</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
