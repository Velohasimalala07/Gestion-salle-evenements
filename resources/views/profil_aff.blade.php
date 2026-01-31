


<h2>Listes des profils</h2>

<table border="1" cellpadding="5">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Action</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($profils as $inscrit)
        <tr>
            <td>{{ $inscrit->id }}</td>
            <td>{{ $inscrit->nom }}</td>
            <td>{{ $inscrit->prenom }}</td>
            <td>
                <a href="{{ route('profils.edit', $inscrit->id) }}">Modifier</a>
            </td>
            <td><a href="">supprimer</a></td>
        </tr>
        @endforeach
    </tbody>
</table>





