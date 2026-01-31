<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Reve d' un Jour — Connexion</title>

    <style>
        * { box-sizing: border-box; margin:0; padding:0; }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #fff9e9;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .card {
            background-color: #ffffff;
            border: 4px solid #f4d06f;
            border-radius: 30px;
            width: 780px;
            max-width: 90%;
            padding: 30px 25px 50px 25px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.15);
            position: relative;
            text-align: center; /* mampivondrona atiny rehetra */
        }

        /* LOGO */
        .logo{
            display:flex;
            justify-content:center;
            align-items:center;
            margin-bottom:8px;
        }

        .logo img{
            width:100px;
            height:100px;
            border-radius:50%;
            object-fit:cover;
        }

        /* TITRE */
        .card h2 {
            color: #d83434;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 25px;
        }

        .card input[type="text"],
        .card input[type="password"] {
            width: 100%;
            padding: 10px 12px;
            margin-bottom: 18px;
            border: 2px solid #f4d06f;
            border-radius: 8px;
            font-size: 15px;
            outline: none;
        }

        /* Buttons row */
        .btn-row {
            display: flex;
            gap: 10px;
            margin-top: 10px;
        }

        .btn-primary {
            flex:1;
            padding: 10px;
            background-color: #8cc152;
            border: none;
            border-radius: 8px;
            color: #ffffff;
            font-size: 15px;
            font-weight: bold;
            cursor: pointer;
        }

        .btn-primary:hover { background-color: #7bb543; }

        .btn-secondary {
            flex:1;
            background-color: #ffffff;
            border: 2px solid #8cc152;
            border-radius: 8px;
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

        .btn-secondary:hover {
            background-color: rgba(140,197,82,0.1);
        }

        /* Footer yellow bar */
        .bottom-info {
            position: absolute;
            bottom: -60px;
            left: 0;
            width: 100%;
            background-color: #f4d06f;
            border-bottom-left-radius: 26px;
            border-bottom-right-radius: 26px;
            padding: 15px 20px;
            text-align: center;
            box-shadow: 0 5px 10px rgba(0,0,0,0.1);
            font-size: 13px;
            line-height: 1.3;
        }

        .bottom-info strong { display:block; margin-top:4px; }
    </style>
</head>

<body>
@if(session('success'))
    <div style="color:green; font-weight:bold; margin-bottom:10px;">
        {{ session('success') }}
    </div>
@endif

<div class="card">

    <!-- LOGO AFOVOANY -->
    <div class="logo">
        <img src="{{ asset('images/logo.png') }}" alt="Logo">
    </div>

    <!-- TITRE -->
    <h2>Reve d' un Jour</h2>

    <form action="/connexion" method="POST">
        @csrf

        <input type="text" name="nom_utilisateur" placeholder="Nom d'utilisateur" required>
        <input type="password" name="mot_de_passe" placeholder="Mot de passe" required>

        <!-- Buttons mifanila -->
        <div class="btn-row">
             <a href="/offres" class="btn-primary">Se connecter</a>
            <!-- <button type="submit" class="btn-primary">Se connecter</button> -->
            <a href="/inscription" class="btn-secondary">S'inscrire</a>
        </div>
    </form>

    <div class="bottom-info">
        📞 038 43 332 25
        <strong>Stéphanya VELOHASIMALALA</strong>
    </div>
</div>

</body>
</html>
