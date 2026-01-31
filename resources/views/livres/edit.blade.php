@extends('layouts.app')

@section('content')
    <h1>Modifier un livre</h1>

    <form action="{{ route('livres.update', $livre) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Titre</label>
            <input type="text" name="titre" class="form-control" value="{{ old('titre', $livre->titre) }}">
            @error('titre') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Auteur</label>
            <input type="text" name="auteur" class="form-control" value="{{ old('auteur', $livre->auteur) }}">
            @error('auteur') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Année</label>
            <input type="number" name="annee_publication" class="form-control" value="{{ old('annee_publication', $livre->annee_publication) }}">
            @error('annee_publication') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Exemplaires</label>
            <input type="number" name="nombre_exemplaires" class="form-control" value="{{ old('nombre_exemplaires', $livre->nombre_exemplaires) }}">
            @error('nombre_exemplaires') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <button class="btn btn-primary">Mettre à jour</button>
        <a href="{{ route('livres.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
@endsection
