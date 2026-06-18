<?php

require 'db.php';   // ⬅️ charge notre db.php (qui crée $db)

echo "Connexion OK !<br>";

$stmt = $db->query('SELECT * FROM articles');
$articles = $stmt->fetchAll();

echo "Nombre d'articles : " . count($articles) . "<br><br>";

foreach ($articles as $article) {
    echo "[" . $article['id'] . "] " 
       . $article['titre'] . " — par " 
       . $article['auteur'] . "<br>";
}