<?php
session_start();

// Protection MINIMALE : si pas connecté → redirect login
if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit;
}

require_once 'db.php';
if (isset($_POST['delete_id']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
     $stmt = $db->prepare(
            "DELETE FROM articles WHERE id = :id"
        );

        $stmt->execute([':id' => $_POST['delete_id']]);

        header("Location: admin.php");
        exit;
}
$nombre = $db->query('SELECT COUNT(*) FROM articles')->fetchColumn();
$stmt = $db->query('SELECT * FROM articles ORDER BY date_creation DESC LIMIT 10');
$articles = $stmt->fetchAll();

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
<main>
<h1>✅ Connecté en tant que <?= htmlspecialchars($_SESSION['admin_username']) ?></h1>
<p>Nombre d'articles publiés : <?= $nombre ?></p>
<section>
    <h2>Derniers articles</h2>
            <?php foreach ($articles as $article): ?>
                <article>
                    <h3><?= htmlspecialchars($article['titre']) ?></h3>
                    <p><?= htmlspecialchars($article['contenu']) ?></p>
                <form method="POST" action="admin.php">
                    <input type="hidden" name="delete_id" value="<?= $article['id'] ?>">
                    <button type="submit">🗑️ Supprimer</button>
                </form>
                </article>
            <?php endforeach; ?>
    </section>
    <p><a href="logout.php">Se déconnecter</a></p>
    </main>

    <footer class="legal-footer">
    <p>© <span id="year"></span> KodexKem — Tous droits réservés.</p>
    <nav class="legal-footer-nav">
        <a href="legal/mentions-legales.php">Mentions légales</a>
    </nav>
</footer>

<script>
    document.getElementById('year').textContent = new Date().getFullYear();
</script>
</body>
</html>