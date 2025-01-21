<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un utilisateur</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f9f9f9;
        }
        form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        form h1 {
            margin-bottom: 20px;
            font-size: 1.5em;
            text-align: center;
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }
        input[type="text"],
        input[type="email"],
        button {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1em;
        }
        button {
            background-color: #007BFF;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        .error {
            color: red;
            font-size: 0.9em;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <form method="POST" action="/users/store">
        <h1>Ajouter un utilisateur</h1>

        <?php if (!empty($error)): ?>
            <p class="error"><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>

        <label for="name">Nom :</label>
        <input type="text" name="name" id="name" placeholder="Entrez votre nom" required>

        <label for="email">Email :</label>
        <input type="email" name="email" id="email" placeholder="Entrez votre email" required>

        <button type="submit">Enregistrer</button>
    </form>
</body>
</html>
