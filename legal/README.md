# 📋 Module pages légales réutilisable

Pack autonome de 4 pages légales standards pour tout site web :

- `mentions-legales.php` — Mentions légales (modèle fourni ✓)
- `cookies.php` — Politique cookies (à dupliquer depuis le modèle)
- `confidentialite.php` — Politique de confidentialité RGPD (à dupliquer)
- `cgu.php` — Conditions Générales d'Utilisation (à dupliquer)

Plus `legal.css` — styles spécifiques aux pages légales.

---

## 🚀 Utilisation rapide

### 1. Copier le dossier
Copie le dossier `legal/` complet à la racine de n'importe lequel de tes sites.

### 2. Adapter les chemins CSS
Dans chaque fichier, vérifie la ligne :
```html
<link rel="stylesheet" href="../style.css">
```
→ Adapte `../style.css` selon l'emplacement de ton CSS principal.

### 3. Personnaliser le contenu
Remplace **tous les `[À PERSONNALISER]`** par les vraies infos de ton organisation.

### 4. Lier depuis le footer du site
Dans ton site principal, mets dans le footer :
```html
<a href="legal/mentions-legales.php">Mentions légales</a>
<a href="legal/cookies.php">Cookies</a>
<a href="legal/confidentialite.php">Confidentialité</a>
<a href="legal/cgu.php">CGU</a>
```

---

## 📝 Pour dupliquer le modèle vers les 3 autres pages

1. Copie `mentions-legales.php` → `cookies.php`
2. Change le `<title>` et le `<h1>`
3. Remplace les sections par celles de la politique cookies
4. Répète pour `confidentialite.php` et `cgu.php`

---

## 📚 Ressources pour le contenu juridique

| Page | Ressource recommandée |
|---|---|
| **Mentions légales** | https://www.cnil.fr/fr/mentions-legales |
| **Cookies** | https://www.cnil.fr/fr/cookies-et-traceurs-que-dit-la-loi |
| **Confidentialité (RGPD)** | https://www.cnil.fr/fr/comprendre-le-rgpd |
| **CGU** | https://legalplace.fr / https://www.captaincontrat.com (payant mais solide) |

⚠️ **Important** : ces pages engagent ta responsabilité juridique.
Vérifie le contenu avec un professionnel pour un site commercial.

---

## 🔧 Personnalisations possibles

- **Logo** : ajoute `<img src="../assets/logo.png">` dans le `<header>`
- **Langue** : change `lang="fr"` si besoin
- **Couleurs** : adapte les variables dans `legal.css`
- **Date dynamique** : déjà gérée par le `<script>` à la fin (année auto)
