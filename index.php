<?php
session_start();

$nomDuBlog = 'You Are Not Alone';
$messageBienvenue = 'Vide ton sac';
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
            <legend>N'aie pas peur</legend>
        <label for="titre">Titre de l'article</label>
        <input type="text" name="titre" id="titre"
       value="<?php echo htmlspecialchars($_SESSION['old_titre'] ?? ''); ?>">

<label for="contenu">Contenu</label>
<textarea name="contenu" id="contenu"><?php
    echo htmlspecialchars($_SESSION['old_contenu'] ?? '');
?></textarea>
        <button type="submit">Publier</button>
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

    <footer class="legal-footer">
    <p>© <span id="year"></span> KodexKem — Tous droits réservés.</p>
    <nav class="legal-footer-nav">
        <a href="legal/mentions-legales.php">Mentions légales</a>⎥
        <a href="legal/cookies.php">Cookies</a>⎥
        <a href="legal/confidentialite.php">Confidentialité</a>⎥
        <a href="legal/cgu.php">CGU</a>
    </nav>
</footer>

<script>
    document.getElementById('year').textContent = new Date().getFullYear();
</script>

</body> 
</html>