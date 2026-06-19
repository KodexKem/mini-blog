<?php
session_start();

$nomDuBlog = 'You are Not Alone';
$messageBienvenue = 'Ici, tu es chez TOI';
$auteur = 'KodexKem';
$articleSoumis = false;

require_once 'db.php';
$stmt = $db->query('SELECT * FROM articles ORDER BY date_creation DESC');
$articles = $stmt->fetchAll();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['titre']) && !empty($_POST['contenu'])) {
        $articleSoumis = true;
        
        $stmt = $db->prepare("INSERT INTO articles (titre, contenu, auteur) 
                      VALUES (:titre, :contenu, :auteur)");
        $stmt->execute([
            ':titre'   => $_POST['titre'],
            ':contenu' => $_POST['contenu'],
            ':auteur'  => 'KodexKem'
        ]);

        $_SESSION['flash'] = "Article soumis !";
        unset($_SESSION['old_titre']);
        unset($_SESSION['old_contenu']);
    
        header("Location: index.php"); // ⬅️ Dit au navigateur "va vers index.php"
        exit;                          // ⬅️ STOP — PHP s'arrête là                          
    } else {
        $_SESSION['old_titre']    = $_POST['titre'];
        $_SESSION['old_contenu']  = $_POST['contenu'];
        $_SESSION['flash_erreur'] = "Veuillez remplir tous les champs.";
    
        header("Location: index.php");
        exit;
    }
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
<header>
    <nav>
        <ul>
            <li><a href="">Accueil</a></li>
            <li><a href="">Articles</a></li>
            <li><a href="">Contact</a></li>
        </ul>
    </nav>
</header>
<body>
    <h1 id="bienvenue">
        <?php echo $messageBienvenue; ?>
    </h1>
    <p id="auteur"><?php echo "Par " . $auteur; ?></p>

    <form method="post" action="" id="form">
        <fieldset>
            <legend>Ne sois pas timide</legend>
        <label for="titre">Titre de l'article</label>
        <input type="text" name="titre" id="titre"
       value="<?php echo htmlspecialchars($_SESSION['old_titre'] ?? ''); ?>">

<label for="contenu">Contenu</label>
<textarea name="contenu" id="contenu"><?php
    echo htmlspecialchars($_SESSION['old_contenu'] ?? '');
?></textarea>
        <button type="submit">Publier l'article</button>
        </fieldset>
    </form>
    <?php
if (isset($_SESSION['flash'])) {
    echo "<p>" . htmlspecialchars($_SESSION['flash']) . "</p>";
    unset($_SESSION['flash']);
}
if (isset($_SESSION['flash_erreur'])) {
    echo "<p>" . htmlspecialchars($_SESSION['flash_erreur']) . "</p>";
    unset($_SESSION['flash_erreur']);
    // les old_* restent en place pour pré-remplir les champs
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