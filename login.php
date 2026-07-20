<?php
session_start();
require_once 'db.php';

$erreur = null;

$max_tentatives = 3;
$duree_blocage = 300;

if (!isset($_SESSION['tentatives_echouees'])) {
    $_SESSION['tentatives_echouees'] = 0;
}

if (isset($_SESSION['blocage_jusqu_a']) && time() < $_SESSION['blocage_jusqu_a']) {
    $secondes_restantes = $_SESSION['blocage_jusqu_a'] - time();
    $erreur = "Trop de tentatives. Réessayez dans {$secondes_restantes} secondes.";

} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['username']) && !empty($_POST['password'])) {

        $stmt = $db->prepare("SELECT * FROM admins WHERE username = :username");
        $stmt->execute([':username' => $_POST['username']]);
        $admin = $stmt->fetch();

        if ($admin && password_verify($_POST['password'], $admin['password_hash'])) {

            session_regenerate_id(true);
            $_SESSION['admin_id']            = $admin['id'];
            $_SESSION['admin_username']       = $admin['username'];
            $_SESSION['tentatives_echouees']  = 0;
            unset($_SESSION['blocage_jusqu_a']);

            header("Location: admin.php");
            exit;

        } else {
            $_SESSION['tentatives_echouees']++;

            if ($_SESSION['tentatives_echouees'] >= $max_tentatives) {
                $_SESSION['blocage_jusqu_a'] = time() + $duree_blocage;
                $erreur = "Trop de tentatives. Compte bloqué temporairement.";
            } else {
                $erreur = "Identifiants incorrects.";
            }
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