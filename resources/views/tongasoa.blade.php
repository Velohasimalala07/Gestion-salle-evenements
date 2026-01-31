<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Reve d' un Jour — Bienvenue</title>
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
        width: 600px; 
        max-width: 95%;
        padding: 40px 25px 60px 25px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.15);
        text-align: center;
        position: relative;
    }


        
        .card h2 {
            color: #d83434;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .card p {
            font-size: 14px;
            margin-bottom: 25px;
            color: #333;
        }
        .logo {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background-color: #fdf6e3;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 25px auto;
            font-size: 14px;
            color: #d83434;
        }
        /* Stars indicator */
        .stars {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-bottom: 30px;
        }
        .stars div {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            border: 2px solid #f4d06f;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #f4d06f;
            font-size: 18px;
        }
        /* Start button */
        .start-btn {
            
            padding: 12px 25px;
            border: none;
            border-radius: 8px;
            background-color: #f4d06f;
            color: #000;
            font-weight: bold;
            cursor: pointer;
            font-size: 16px;
            width: 120px;
            transition: 0.3s;
        }
        .start-btn:hover {
            background-color: #e7d8afff;
        }
        /* Bottom info bar if needed */
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
        .bottom-info strong {
            display: block;
            margin-top: 4px;
        }
        .logo img {
    width: 120px;
    height: 120px;
    border-radius: 50%;
    object-fit: cover; /* hitovy tsara ny sary ao anatin'ny circle */
}

    </style>
</head>
<body>

<div class="card">
    <h2>Reve d' un Jour</h2>
    <p>Bienvenue dans notre site de salle d'événements</p>

    
    <div class="logo">
    <img src="{{ asset('images/logo.png') }}" alt="Logo" style="width:120px; height:120px; border-radius:50%;">
</div>


    <div class="stars">
        <div>★</div>
        <div>★</div>
        <div>★</div>
    </div>

    <button class="start-btn" onclick="window.location.href='/inscription'">START</button>
    

    <div class="bottom-info">
        📞 038 43 332 25
        <strong>Stéphanya VELOHASIMALALA</strong>
    </div>
</div>

</body>
</html>
