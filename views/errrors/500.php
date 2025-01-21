<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Erreur Interne</title>
    <style>
        /* Style global */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f2f2f2;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            text-align: center;
        }

        /* Container de la page */
        .container {
            background-color: #fff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            width: 80%;
            max-width: 600px;
        }

        /* Titre de l'erreur */
        h1 {
            font-size: 80px;
            color: #e74c3c;
            margin-bottom: 20px;
        }

        /* Message d'erreur */
        p {
            font-size: 18px;
            color: #555;
            margin-bottom: 30px;
            line-height: 1.6;
        }

        /* Bouton de retour à l'accueil */
        .button {
            text-decoration: none;
            background-color: #3498db;
            color: white;
            padding: 15px 30px;
            border-radius: 8px;
            font-size: 18px;
            display: inline-block;
            transition: background-color 0.3s ease;
        }

        .button:hover {
            background-color: #2980b9;
        }

        /* Code d'erreur */
        .error-code {
            font-size: 120px;
            font-weight: bold;
            color: #e74c3c;
        }

        /* Texte d'explication */
        .error-message {
            font-size: 18px;
            color: #777;
            margin-top: 10px;
        }

    </style>
</head>
<body>
    <div class="container">
        <div class="error-code">500</div>
        <h1>Erreur interne du serveur</h1>
        <p class="error-message"><?= htmlspecialchars($error->getMessage()) ?></p>
        <a href="/" class="button">Retour à l'accueil</a>
    </div>
</body>
</html>
