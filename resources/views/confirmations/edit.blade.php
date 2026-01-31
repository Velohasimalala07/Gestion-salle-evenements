<h2>Modifier Confirmation</h2>

<form method="POST" action="{{ route('confirmations.update',$confirmation->id) }}">
@csrf @method('PUT')

<input name="salle_nom" value="{{ $confirmation->salle_nom }}"><br>
<input name="salle_capacite" value="{{ $confirmation->salle_capacite }}"><br>
<input name="salle_prix" value="{{ $confirmation->salle_prix }}"><br>
<textarea name="materiels">{{ $confirmation->materiels }}</textarea><br>
<input type="date" name="date" value="{{ $confirmation->date }}"><br>
<input type="time" name="heure_debut" value="{{ $confirmation->heure_debut }}"><br>
<input type="time" name="heure_fin" value="{{ $confirmation->heure_fin }}"><br>
<input name="total" value="{{ $confirmation->total }}"><br>

<button>Mettre à jour</button>
</form>
