<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?php echo $titre ?></title>
</head>
<body>
<nav>
    <a href="?ctrl=Accueil">Accueil</a>
    <a href="?ctrl=Service">Services</a>
    <a href="?ctrl=Societe">Société</a>
</nav>
<?php echo $contenu; ?>

<script type="text/javascript" src="/wp-content/plugins/facturation-initia/JS/app.js"></script>
</body>
</html>