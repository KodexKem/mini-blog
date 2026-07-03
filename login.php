<?php
session_start();
require_once 'db.php';

$erreur = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['username']) && !empty($_POST['password'])) {

        // 1. Préparer la requête (PDO prepared statement — sécurité injection SQL)
        $stmt = $db->prepare(
            "SELECT * FROM admins WHERE username = :username"
        );

        // 2. Exécuter avec le placeholder
        $stmt->execute([':username' => $_POST['username']]);

        // 3. Récupérer la ligne (UNE seule — pas fetchAll)
        $admin = $stmt->fetch();

        // 4. Vérifier que l'admin existe ET que le mot de passe correspond
        if ($admin && password_verify($_POST['password'], $admin['password_hash'])) {

            // 5. Connexion réussie : marquer le user en session
            $_SESSION['admin_id']       = $admin['id'];
            $_SESSION['admin_username'] = $admin['username'];

            // 6. Rediriger vers le backoffice
            header("Location: admin.php");
            exit;

        } else {
            // ⚠️ message GÉNÉRIQUE (pas "user inconnu" vs "mauvais mdp")
            $erreur = "Identifiants incorrects.";
        }

    } else {
        $erreur = "Veuillez remplir tous les champs.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="login.css">
    <title>Connexion admin –– You Are Not Alone</title>
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
    <h1>Connexion administrateur</h1>

    <?php if ($erreur): ?>
        <p style="color: tomato;"><?php echo htmlspecialchars($erreur); ?></p>
    <?php endif; ?>

    <form method="post" action="">
        <label for="username">Username</label>
        <input type="text" name="username" id="username" required>

        <label for="password">Mot de passe</label>
        <input type="password" name="password" id="password" required>

        <button type="submit">Se connecter</button>
    </form>
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