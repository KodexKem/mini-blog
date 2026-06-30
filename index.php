<?php
session_start();

$nomDuBlog = 'You Are Not Alone';
$messageBienvenue = 'Vide ton sac';
$auteur = 'KodexKem';
$articleSoumis = false;

require_once 'db.php';
$stmt = $db->query('SELECT * FROM articles ORDER BY date_creation DESC LIMIT 3');
$articles = $stmt->fetchAll();

if (isset($_SESSION['admin_id'])  &&  $_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['titre']) && !empty($_POST['contenu'])) {
        $articleSoumis = true;
        
        $stmt = $db->prepare("INSERT INTO articles (titre, contenu, auteur) 
                      VALUES (:titre, :contenu, :auteur)");
        $stmt->execute([
            ':titre'   => $_POST['titre'],
            ':contenu' => $_POST['contenu'],
            ':auteur'  => $_SESSION['admin_username']
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
    <h1 id="bienvenue">
        <?php echo $messageBienvenue; ?>
    </h1>
    <p id="auteur"><?php echo "Par " . $auteur; ?></p>

    <?php if ( isset($_SESSION['admin_id']) ): ?>

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

    <?php else: ?>

    <p><a href="login.php">Veuillez vous connecter svp</a></p>

<?php endif; ?>

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
        <h2>Articles publiés</h2>
        <?php
        foreach ($articles as $article) {
            echo "<article>";
            echo "<h3>" . htmlspecialchars($article["titre"]) . "</h3>";  // titre sécurisé
            echo "<p>" . htmlspecialchars($article["contenu"]) . "</p>";    // contenu sécurisé
            echo "</article>";
        }
        ?>
    </section>

    <a href="articles.php" class="lien-tous-articles">Voir plus d'articles</a>

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