<?php
// ▼ TROU 1 : démarrer la session AVANT de pouvoir la détruire
session_start();

// ▼ TROU 2 : vider TOUTES les variables $_SESSION (admin_id, admin_username, etc.)
session_unset();

// ▼ TROU 3 : détruire complètement la session côté serveur (supprime le fichier)
session_destroy();

// Redirection vers la page de connexion
header("Location: login.php");
exit;