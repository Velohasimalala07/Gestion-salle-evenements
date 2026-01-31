@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Gestion des voyages</h2>
    <h3>VOYAGES</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Formulaire Ajouter / Modifier --}}
    <form action="{{ isset($voyage) ? route('voyages.update', $voyage->id) : route('voyages.store') }}" method="POST">
        @csrf
        <input type="text" name="destination" placeholder="Destination" value="{{ $voyage->destination ?? '' }}" required><br><br>
        <input type="number" name="duree" placeholder="Durée (jours)" value="{{ $voyage->duree ?? '' }}" required><br><br>
        <input type="text" name="type_voyage" placeholder="Type de voyage" value="{{ $voyage->type_voyage ?? '' }}" required><br><br>
        <input type="number" step="0.01" name="prix" placeholder="Prix" value="{{ $voyage->prix ?? '' }}" required><br><br>
        <button type="submit">{{ isset($voyage) ? 'Modifier' : 'Enregistrer' }}</button>
    </form>

    <hr>

    {{-- Liste des voyages --}}
    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Destination</th>
            <th>Durée</th>
            <th>Type</th>
            <th>Prix</th>
            <th>Actions</th>
        </tr>
        @foreach($voyages as $v)
        <tr>
            <td>{{ $v->id }}</td>
            <td>{{ $v->destination }}</td>
            <td>{{ $v->duree }}</td>
            <td>{{ $v->type_voyage }}</td>
            <td>{{ $v->prix }}</td>
            <td>
                <a href="{{ route('voyages.edit', $v->id) }}">Modifier</a>
                <form action="{{ route('voyages.destroy', $v->id) }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" onclick="return confirm('Voulez-vous supprimer ?')">Supprimer</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
