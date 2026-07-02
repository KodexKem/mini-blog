<?php
/**
 * Mentions légales — You Are Not Alone
 * Éditeur : KEMOUN Jérémie (KodexKem)
 */
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mentions légales — You Are Not Alone</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="legal.css">
</head>
<body>

<header class="legal-header">
    <a href="../index.php" class="back-link">← Retour à l'accueil</a>
</header>

<main class="legal-page">

    <h1>Mentions légales</h1>

    <section>
        <h2>1. Éditeur du site</h2>
        <p>
            <strong>Nom :</strong> KodexKem<br>
            <strong>Forme juridique :</strong> Particulier<br>
            <strong>Email :</strong> kodexkem@gmail.com
        </p>
    </section>

    <section>
        <h2>2. Directeur de la publication</h2>
        <p>
            <strong>Nom :</strong> KEMOUN Jérémie<br>
            <strong>Qualité :</strong> Éditeur du site
        </p>
    </section>

    <section>
        <h2>3. Hébergement</h2>
        <p>
            <strong>Hébergeur :</strong> Alwaysdata<br>
            <strong>Adresse :</strong> 91 rue du Faubourg Saint-Honoré, 75008 Paris, France<br>
            <strong>Site web :</strong> https://www.alwaysdata.com
        </p>
    </section>

    <section>
        <h2>4. Propriété intellectuelle</h2>
        <p>
            L'ensemble du contenu de ce site (textes, images, vidéos, code source, etc.)
            est protégé par le droit d'auteur et reste la propriété exclusive de
            KEMOUN Jérémie, sauf mention contraire.
        </p>
        <p>
            Toute reproduction, représentation, modification, publication ou adaptation
            de tout ou partie des éléments du site est interdite sans autorisation écrite
            préalable de KEMOUN Jérémie.
        </p>
    </section>

    <section>
        <h2>5. Données personnelles</h2>
        <p>
            Ce site n'utilise qu'un cookie de session technique (PHPSESSID)
            nécessaire à l'authentification administrateur, exempté de consentement
            selon la recommandation CNIL. Aucune donnée personnelle des visiteurs
            n'est collectée, stockée ni transmise à des tiers.
        </p>
    </section>

    <section>
        <h2>6. Contact</h2>
        <p>
            Pour toute question relative au site ou à son contenu, vous pouvez nous contacter
            à l'adresse : <strong>kodexkem@gmail.com</strong>.
        </p>
    </section>

    <p class="legal-note">
        <em>Dernière mise à jour : 01/07/2026</em>
    </p>

</main>

<footer class="legal-footer">
    <p>© <span id="year"></span> KodexKem — Tous droits réservés.</p>
    <nav class="legal-footer-nav">
        <a href="mentions-legales.php">Mentions légales</a>
    </nav>
</footer>

<script>
    // Met à jour l'année automatiquement
    document.getElementById('year').textContent = new Date().getFullYear();
</script>

</body>
</html>
