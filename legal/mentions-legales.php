<?php
/**
 * Mentions légales — page autonome réutilisable
 *
 * UTILISATION :
 *   1. Copier ce dossier `legal/` à la racine de n'importe quel site
 *   2. Adapter le chemin du CSS (ligne ~15) si nécessaire
 *   3. Remplacer chaque [À PERSONNALISER] par les vraies infos
 *   4. Adapter le nom du site dans le <title> et le footer
 *
 * RESSOURCE OFFICIELLE :
 *   https://www.cnil.fr/fr/mentions-legales
 *
 * Auteur initial : KodexKem
 */
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mentions légales — [Nom du site]</title>
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
            <strong>Raison sociale :</strong> [À PERSONNALISER]<br>
            <strong>Forme juridique :</strong> [Association loi 1901 / SAS / SARL / Auto-entrepreneur...]<br>
            <strong>SIRET :</strong> [À PERSONNALISER]<br>
            <strong>Adresse du siège :</strong> [À PERSONNALISER]<br>
            <strong>Téléphone :</strong> [À PERSONNALISER]<br>
            <strong>Email :</strong> [À PERSONNALISER]
        </p>
    </section>

    <section>
        <h2>2. Directeur de la publication</h2>
        <p>
            <strong>Nom :</strong> [À PERSONNALISER]<br>
            <strong>Qualité :</strong> [Président / Directeur / Auto-entrepreneur...]
        </p>
    </section>

    <section>
        <h2>3. Hébergement</h2>
        <p>
            <strong>Hébergeur :</strong> [À PERSONNALISER : Alwaysdata / OVH / Hostinger...]<br>
            <strong>Adresse :</strong> [Adresse de l'hébergeur]<br>
            <strong>Site web :</strong> [URL de l'hébergeur]
        </p>
    </section>

    <section>
        <h2>4. Propriété intellectuelle</h2>
        <p>
            L'ensemble du contenu de ce site (textes, images, vidéos, code source, etc.)
            est protégé par le droit d'auteur et reste la propriété exclusive de
            [Nom de l'éditeur], sauf mention contraire.
        </p>
        <p>
            Toute reproduction, représentation, modification, publication ou adaptation
            de tout ou partie des éléments du site est interdite sans autorisation écrite
            préalable de [Nom de l'éditeur].
        </p>
    </section>

    <section>
        <h2>5. Données personnelles</h2>
        <p>
            Pour le détail du traitement de vos données personnelles, consultez notre
            <a href="confidentialite.php">Politique de confidentialité</a>.
        </p>
    </section>

    <section>
        <h2>6. Contact</h2>
        <p>
            Pour toute question relative au site ou à son contenu, vous pouvez nous contacter
            à l'adresse : <strong>[Email de contact]</strong>.
        </p>
    </section>

    <p class="legal-note">
        <em>Dernière mise à jour : [JJ/MM/AAAA]</em>
    </p>

</main>

<footer class="legal-footer">
    <p>© <span id="year"></span> [Nom du site] — Tous droits réservés.</p>
    <nav class="legal-footer-nav">
        <a href="mentions-legales.php">Mentions légales</a>⎥
        <a href="cookies.php">Cookies</a>⎥
        <a href="confidentialite.php">Confidentialité</a>⎥
        <a href="cgu.php">CGU</a>
    </nav>
</footer>

<script>
    // Met à jour l'année automatiquement
    document.getElementById('year').textContent = new Date().getFullYear();
</script>

</body>
</html>
