@extends('layouts.app')

@section('content')
    <h1>Liste des livres</h1>
    <a href="{{ route('livres.create') }}" class="btn btn-primary mb-3">+ Ajouter un livre</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Titre</th>
                <th>Auteur</th>
                <th>Année</th>
                <th>Exemplaires</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($livres as $livre)
                <tr>
                    <td>{{ $livre->titre }}</td>
                    <td>{{ $livre->auteur }}</td>
                    <td>{{ $livre->annee_publication }}</td>
                    <td>{{ $livre->nombre_exemplaires }}</td>
                    <td>
                        <a href="{{ route('livres.edit', $livre) }}" class="btn btn-warning btn-sm">Modifier</a>
                        <form action="{{ route('livres.destroy', $livre) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Supprimer ce livre ?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5">Aucun livre trouvé</td></tr>
            @endforelse
        </tbody>
    </table>
@endsection
