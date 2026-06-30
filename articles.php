<?php
session_start();
require_once 'db.php';

$stmt = $db->query('SELECT * FROM articles ORDER BY date_creation DESC');
$articles = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Articles — You Are Not Alone</title>
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
    <main>
        <h1>Tous les articles</h1>

        <?php if (empty($articles)): ?>
            <p>Rien à lire pour le moment 😢</p>
        <?php else: ?>
            <?php foreach ($articles as $article): ?>
                <article>
                    <h2><?= htmlspecialchars($article['titre']) ?></h2>
                    <p><?= htmlspecialchars($article['contenu']) ?></p>
                </article>
            <?php endforeach; ?>
        <?php endif; ?>
    </main>

    <footer class="legal-footer">
    <p>© <span id="year"></span> KodexKem — Tous droits réservés.</p>
    <nav class="legal-footer-nav">
        <a href="legal/mentions-legales.php">Mentions légales</a>⎥
        <a href="legal/cookies.php">Cookies</a>⎥
        <a href="legal/confidentialite.php">Confidentialité</a>⎥
        <a href="legal/cgu.php">CGU</a>
    </nav>
</footer>

<script>
    document.getElementById('year').textContent = new Date().getFullYear();
</script>

</body>
</html>