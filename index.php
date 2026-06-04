<?php
$nomDuBlog = 'Mon mini-blog';
$messageBienvenue = 'Bienvenue sur mon blog';
$auteur = 'KodexKem';
$articleSoumis = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $articleSoumis = true;
    $articleTitre = $_POST['titre'];
    $articleContenu = $_POST['contenu'];
}
    ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title><?php echo $nomDuBlog; ?></title>
</head>
<body>
    <h1>
        <?php echo $messageBienvenue; ?>
    </h1>
    <p><?php echo "Par " . $auteur; ?></p>

    <form method="post" action="">
        <fieldset>
            <legend>Mon 1er article</legend>
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
</body> 
</html>