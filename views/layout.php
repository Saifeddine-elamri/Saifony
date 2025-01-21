<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Application</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
        }
        header {
            background-color: #007BFF;
            color: white;
            padding: 15px;
            text-align: center;
        }
        nav {
            background-color: #333;
            color: white;
            padding: 10px;
            text-align: center;
        }
        nav a {
            color: white;
            margin: 0 15px;
            text-decoration: none;
        }
        footer {
            background-color: #333;
            color: white;
            padding: 10px;
            text-align: center;
            position: fixed;
            width: 100%;
            bottom: 0;
        }
        .content {
            margin: 20px;
        }
    </style>
</head>
<body>
    <header>
        <h1>Mon Application</h1>
    </header>

    <nav>
        <a href="/">Accueil</a>
        <a href="/users">Utilisateurs</a>
        <a href="/users/create">Créer un utilisateur</a>
        <a href="/about">À propos</a>
        <a href="/contact">Contact</a>
    </nav>

    <div class="content">
        <!-- Contenu spécifique de chaque page -->
        <?php echo $content; ?>
    </div>

    <footer>
        <p>&copy; <?= date('Y') ?> Mon Application</p>
    </footer>
</body>
</html>
