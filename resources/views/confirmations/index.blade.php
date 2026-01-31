<!DOCTYPE html>
<html>
<head>
    <title>Liste des confirmations</title>
</head>
<body>

<h2>Confirmations</h2>

@if(session('success'))
<p style="color:green">{{ session('success') }}</p>
@endif

<a href="{{ route('confirmations.create') }}">➕ Nouvelle confirmation</a>

<table border="1" cellpadding="5">
<tr>
 <th>ID</th><th>Salle</th><th>Date</th><th>Total</th><th>Actions</th>
</tr>

@foreach($confirmations as $c)
<tr>
 <td>{{ $c->id }}</td>
 <td>{{ $c->salle_nom }}</td>
 <td>{{ $c->date }}</td>
 <td>{{ $c->total }}</td>

 <td>
    <a href="{{ route('confirmations.edit',$c->id) }}">Modifier</a>

    <form action="{{ route('confirmations.destroy',$c->id) }}" method="POST" style="display:inline">
        @csrf @method('DELETE')
        <button onclick="return confirm('Supprimer ?')">Supprimer</button>
    </form>
 </td>
</tr>
@endforeach
</table>

</body>
</html>
