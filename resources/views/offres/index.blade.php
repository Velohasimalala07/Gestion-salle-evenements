<!DOCTYPE html>
<html>
<head>
    <title>Nos Offres</title>
    <style>
        table { border-collapse: collapse; width: 80%; margin: 20px auto; }
        th, td { border: 1px solid #000; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        a { margin-right: 10px; }
         body {
            font-family: Arial, sans-serif;
            background-color: #f4d06f;
            margin: 0;
            padding: 0;
        }
         /* Logout button */
        .logout {
            display: block;
            width: 100px;
            margin: 20px auto 0 auto;
            text-align: center;
            background-color: #f0e68c;
            padding: 8px;
            border-radius: 5px;
            text-decoration: none;
            color: #000;
        }

        /* Footer */
        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 0.9em;
        }
         /* Header */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .header img {
            width: 50px;
        }

        .nav {
            display: flex;
            gap: 10px;
        }

        .nav a {
            text-decoration: none;
            padding: 5px 10px;
            border-radius: 5px;
            background-color: #d4edc4;
            color: #000;
        }
         .wrapper {
            width: 90%;
            max-width: 800px;
            margin: 20px auto;
            background-color: #ecd8b9ff;
            padding: 20px;
            border-radius: 20px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            position: relative;
        }
         .btn-secondary {
            flex:1;
            background-color: #ffffff;
            border: 2px solid #8cc152;
            border-radius: 8px;
            width: 100px;
            height: 30px;
            color: #2e2e2e;
            font-size: 15px;
            font-weight: bold;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            cursor: pointer;
        }


    </style>
</head>
<body>
    <div class="wrapper">
     <!-- Header -->
    <div class="header">
        <img src="{{ asset('images/logo.png') }}" alt="Logo">
        <div class="nav">
           
            <!-- <a href="#">Nos matériels</a> -->
        </div>
    </div >
    <!-- <h1 style="text-align:center;">Nos Offres</h1> -->

    @if(session('success'))
        <p style="color:green;text-align:center;">{{ session('success') }}</p>
    @endif

    <div style="text-align:center; margin-bottom:20px;">
        <a href="{{ route('offres.create') }}">Ajouter une nouvelle offre</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Capacité</th>
                <th>Prix</th>
                <th>Description</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($offres as $offre)
                <tr>
                    <td>{{ $offre->id }}</td>  
                    <td>{{ $offre->nom }}</td>
                    <td>{{ $offre->capacite }}</td>
                    <td>{{ $offre->prix }}</td>
                    <td>{{ $offre->description ?? '-' }}</td>
                   <td>
    @if($offre->image)
        <img src="{{ asset('storage/'.$offre->image) }}" width="80">
    @else
        -
    @endif
</td>

                    <td>
                        <a href="{{ route('offres.edit', $offre->id) }}">Modifier</a>
                        <form action="{{ route('offres.destroy', $offre->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Vraiment supprimer ?')">Supprimer</button>
                        </form>
                    </td>
                     
                </tr>

            @endforeach
        </tbody>
    </table>
    <div class="btn-row">
            <!-- <button type="submit" class="btn-primary">Se connecter</button> -->
            <a href="/materiels" class="btn-secondary">Se connecter</a>
        </div>
    <!-- <a href="#" class="logout">Se déconnecter</a> -->

    <!-- Footer -->
    <!-- <div class="footer">
        📞 038 43 332 25<br>
        <i>Stéphanya VELOHASIMALALA</i>
    </div> -->
</div >
</body>
</html>









