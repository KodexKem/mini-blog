<?php


// Tableaux associatifs
$couleurs = [
    "primo" => "rouge",
    "deuxio" => "vert",
    "troisio" => "bleu"
];

echo $couleurs["deuxio"];

echo "<br>";

$moi = [
    "prenom" => "Jérémie",
    "role" => "apprenant"
];

echo $moi["prenom"];

echo "<br>";

// Tableau INDEXÉ (clés numériques automatiques)
$fruits = ["pomme", "banane", "kiwi"];

echo $fruits[0];
echo "<br>";
echo $fruits[2];

echo "<br>";

foreach ($fruits as $fruit) {
    echo $fruit;
    echo "<br>";
}

foreach ($moi as $cle => $valeur) {
    echo $cle . " : " . $valeur . "<br>";
}
?>