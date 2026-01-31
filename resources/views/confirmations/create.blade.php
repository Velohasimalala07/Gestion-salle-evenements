<h2>Ajouter Confirmation</h2>

<form method="POST" action="{{ route('confirmations.store') }}">
@csrf

<input name="salle_nom" placeholder="Nom salle"><br>
<input name="salle_capacite" placeholder="Capacité"><br>
<input name="salle_prix" placeholder="Prix"><br>
<textarea name="materiels" placeholder="Matériels"></textarea><br>
<input type="date" name="date"><br>
<input type="time" name="heure_debut"><br>
<input type="time" name="heure_fin"><br>
<input name="total" placeholder="Total"><br>

<button>Enregistrer</button>
</form>
