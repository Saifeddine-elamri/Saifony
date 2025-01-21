<!DOCTYPE html>
<html>
<head>
    <title><?= htmlspecialchars($title ?? 'Mon Framework') ?></title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <nav>
        <a href="/">Accueil</a>
        <a href="/about">À propos</a>
        <a href="/contact">Contact</a>
        <a href="/services">Services</a>
    </nav>
    <div class="container">
        <?= $content ?>
    </div>
    <footer>
        &copy; <?= date('Y') ?> Mon Framework. Tous droits réservés.
    </footer>
</body>
</html>
