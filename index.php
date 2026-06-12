<?php
$nomDuBlog = 'You are Not Alone';
$messageBienvenue = 'Ici, tu es chez TOI';
$auteur = 'KodexKem';
$articleSoumis = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $articleSoumis = true;
    $articleTitre = $_POST['titre'];
    $articleContenu = $_POST['contenu'];
}

$articles = [
    [
        "titre" => "Le premier article",
        "contenu" => "Ici apparaîtra un article cool"
    ],
    [
        "titre" => "Le second article",
        "contenu" => "..."
    ],
    [
        "titre" => "Le troisième article",
        "contenu" => "..."
    ]
];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title><?php echo $nomDuBlog; ?></title>
</head>
<header>
    <nav id="nav">
        <ul>
            <li><a href="">Accueil</a></li>
            <li><a href="">Articles</a></li>
            <li><a href="">Contact</a></li>
        </ul>
    </nav>
</header>
<body>
    <h1>
        <?php echo $messageBienvenue; ?>
    </h1>
    <p id="auteur"><?php echo "Par " . $auteur; ?></p>

    <form method="post" action="" id="form">
        <fieldset>
            <legend>Ne sois pas timide</legend>
        <label for="titre">Titre de l'article</label>
        <input type="text" name="titre" id="titre">
        <label for="contenu">Contenu</label>
        <textarea name="contenu" id="contenu"></textarea>
        <button type="submit">Publier l'article</button>
        </fieldset>
    </form>
    <?php 
if ($articleSoumis === true && !empty($articleTitre) && !empty($articleContenu)) {
        echo "<p>Article soumis !</p>";
        echo "<h2>" . htmlspecialchars($articleTitre) . "</h2>";
        echo "<p>" . htmlspecialchars($articleContenu) . "</p>";
    } elseif ($articleSoumis === true) {
        echo "<p>Veuillez remplir tous les champs.</p>";
    }
?>
    <section>
        <h1>Articles publiés</h1>
        <?php
        foreach ($articles as $article) {
            echo "<article>";
            echo "<h2>" . htmlspecialchars($article["titre"]) . "</h2>";  // titre sécurisé
            echo "<p>" . htmlspecialchars($article["contenu"]) . "</p>";    // contenu sécurisé
            echo "</article>";
        }
        ?>
    </section>
    <footer>
        © KODEXKEM Tous droits réservés. <a href="">Mentions légales</a> <a href="">Cookies</a> <a href="">Confidentialité</a> <a href="">CGU</a>
    </footer>
</body> 
</html>