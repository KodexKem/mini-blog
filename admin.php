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
    <title>Backoffice</title>
</head>
<body>
    <h1>✅ Connecté en tant que <?= htmlspecialchars($_SESSION['admin_username']) ?></h1>
    <p>Tu es authentifié avec admin_id = <?= $_SESSION['admin_id'] ?></p>
    <p><a href="logout.php">Se déconnecter</a></p>
</body>
</html>