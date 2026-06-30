<?php
session_start();

// Protection MINIMALE : si pas connecté → redirect login
if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Backoffice</title>
</head>
<body>
    <header>
    <nav>
        <ul>
            <li><a href="index.php">Accueil</a></li>
            <li><a href="articles.php">Articles</a></li>

            <?php if ( isset($_SESSION['admin_id']) ): ?>
                <li><a href="logout.php">Déconnexion (<?= htmlspecialchars($_SESSION['admin_username']) ?>)</a></li>
            <?php else: ?>
                <li><a href="login.php">Connexion</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</header>
    <h1>✅ Connecté en tant que <?= htmlspecialchars($_SESSION['admin_username']) ?></h1>
    <p>Tu es authentifié avec admin_id = <?= $_SESSION['admin_id'] ?></p>
    <p><a href="logout.php">Se déconnecter</a></p>
</body>
</html>