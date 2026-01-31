<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Reve d' un Jour — Inscription</title>

    <style>
        *{ box-sizing:border-box; margin:0; padding:0; }

        body{
            font-family: Arial, Helvetica, sans-serif;
            background:#fff9e9;
            display:flex;
            justify-content:center;
            align-items:center;
            min-height:100vh;
        }

        .card{
            background:#ffffff;
            border:4px solid #f4d06f;
            border-radius:30px;
            width:780px;
            max-width:90%;
            padding:30px 25px 50px 25px;
            box-shadow:0 5px 15px rgba(0,0,0,0.15);
            position:relative;
            text-align:center;
        }

        /* LOGO */
        .logo img{
            width:100px;
            height:100px;
            border-radius:50%;
            object-fit:cover;
            margin-bottom:10px;
        }

        /* TITRE */
        .card h2{
            color:#d83434;
            font-size:24px;
            font-weight:bold;
            margin-bottom:25px;
        }

        .card input{
            width:100%;
            padding:10px 12px;
            margin-bottom:18px;
            border:2px solid #f4d06f;
            border-radius:8px;
            font-size:15px;
            outline:none;
        }

        .btn-row{
            display:flex;
            gap:12px;
            margin-top:5px;
        }

        .btn-primary{
            flex:1;
            padding:10px;
            background:#8cc152;
            border:none;
            border-radius:8px;
            color:#fff;
            font-weight:bold;
            cursor:pointer;
        }

        .btn-primary:hover{ background:#7bb543; }

        .btn-secondary{
            flex:1;
            padding:10px;
            border:2px solid #8cc152;
            border-radius:8px;
            background:#fff;
            font-weight:bold;
            text-decoration:none;
            color:#222;
            display:flex;
            justify-content:center;
            align-items:center;
        }

        .bottom-info{
            position:absolute;
            bottom:-60px;
            left:0;
            width:100%;
            background:#f4d06f;
            border-bottom-left-radius:26px;
            border-bottom-right-radius:26px;
            padding:15px 20px;
            text-align:center;
            box-shadow:0 5px 10px rgba(0,0,0,.1);
            font-size:13px;
        }

        .bottom-info strong{ display:block; margin-top:4px; }
    </style>
</head>

<body>

@if(session('success'))
<script>
    alert("{{ session('success') }}");
</script>
@endif

<div class="card">

    <!-- LOGO EO AMBONY -->
    <div class="logo">
        <img src="{{ asset('images/logo.png') }}" alt="Logo">
    </div>

    <!-- TITRE EO AMBANINY -->
    <h2>Reve d' un Jour</h2>

    <form action="/inscription" method="POST">
        @csrf
        <input type="text" name="nom_utilisateur" placeholder="Nom d'utilisateur" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="mot_de_passe" placeholder="Mot de passe" required>
        <input type="password" name="mot_de_passe_confirmation" placeholder="Confirmation mot de passe" required>

        <div class="btn-row">
            <button type="submit" class="btn-primary">S'inscrire</button>
              <!-- <a href="/inscription" class="btn-primary">S' inscrire</a> -->
            <a href="/connexion" class="btn-secondary">Se connecter</a>
        </div>
    </form>

    <div class="bottom-info">
        📞 038 43 332 25
        <strong>Stéphanya VELOHASIMALALA</strong>
    </div>

</div>

</body>
</html>
