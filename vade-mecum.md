# Vade-mecum technique — Projet mini-blog perso

> Mémo personnel des concepts vus dans ce projet d'apprentissage,
> rédigé au fil des sessions pour préparer la soutenance Titre Pro DWWM.
> Auteur : KodexKem (Kem)
> Démarré : 2026-05-21

---

## 📚 Sommaire des sessions

1. [Session 1 — 2026-05-21 : HTML/PHP de base, variables, concaténation](#session-1--2026-05-21)
2. _(à venir)_

---

## Session 1 — 2026-05-21

### 🎯 Exercices réalisés

- **Exercice 1** : Premier fichier PHP qui s'affiche dans le navigateur (`Bienvenue sur mon blog`)
- **Exercice 2** : Introduction aux variables PHP (`$nomDuBlog`, `$messageBienvenue`)
- **Exercice 3** : Concaténation avec l'opérateur `.` (ajout de `$auteur`)

### 🧠 Concepts ancrés

#### 1. HTML statique vs PHP dynamique

- Fichier `.html` : servi **tel quel** par le serveur, contenu fixe
- Fichier `.php` : **interprété** par PHP côté serveur, contenu dynamique possible
- **Le navigateur reçoit TOUJOURS du HTML**, jamais du PHP

#### 2. Le serveur PHP local

- Commande : `/Applications/XAMPP/xamppfiles/bin/php -S localhost:8000`
- Lance un serveur web intégré, accessible via `http://localhost:8000/`
- Sans serveur PHP, double-cliquer un `.php` ne fait rien (macOS l'ouvre comme texte brut)

#### 3. Le DOCTYPE

- `<!DOCTYPE html>` indique la **version HTML5** et active le **rendu standard** des navigateurs
- À mettre tout en haut du fichier

#### 4. Meta charset UTF-8

- `<meta charset="UTF-8">` indique l'encodage des caractères
- **Sans cela** : les caractères spéciaux (é, à, ç...) peuvent s'afficher en "mojibake" (é → é)

#### 5. Attribut `lang`

- `<html lang="fr">` indique la langue du contenu
- Important pour : **accessibilité** (lecteurs d'écran), **SEO** (Google)

#### 6. Type vs Fonction

- **Type** = catégorie de valeur : `string`, `int`, `bool`, `array`
- **Fonction** = action que PHP exécute : `echo`, `password_verify`, `strlen`
- Analogie : **ingrédient** (type) vs **action de cuisine** (fonction)

#### 7. La fonction `echo`

- Affiche du texte dans la sortie envoyée au navigateur
- Syntaxe : `echo "texte";` ou `echo $variable;`
- Pas de parenthèses (différent de `print()`)

#### 8. Variables PHP

- Toujours préfixées par **`$`** : `$nomVariable`
- Affectation : `$nom = "valeur";`
- Le `=` est l'opérateur d'**affectation** (= "stocke la valeur de droite dans la variable de gauche"), **pas** d'égalité
- `=` (affectation) ≠ `==` (comparaison souple) ≠ `===` (comparaison stricte)

#### 9. Exécution séquentielle ⚠️ FONDAMENTAL

- PHP exécute le fichier **ligne par ligne, de haut en bas**
- **Ne revient jamais en arrière**
- Une variable DOIT être **déclarée AVANT** d'être utilisée
- Si on utilise une variable non déclarée → PHP affiche **rien** (et un warning silencieux)

#### 10. Concaténation

- Opérateur **`.`** (point) en PHP pour assembler 2 chaînes
- Exemple : `echo "Bonjour " . $prenom;` → affiche `Bonjour Marie` (si `$prenom = "Marie"`)
- **Attention** : en JavaScript c'est `+`, en PHP c'est `.` — ne pas confondre

#### 11. Apostrophes simples vs guillemets doubles

| Type                          | Interpolation des `$variables` ?        |
| ----------------------------- | --------------------------------------- |
| `'...'` (apostrophes simples) | ❌ NON — affiche `$truc` littéralement  |
| `"..."` (guillemets doubles)  | ✅ OUI — remplace `$truc` par sa valeur |

### 🛠️ Réflexes acquis

- Toujours `;` à la fin d'une instruction PHP (même si `?>` le tolère)
- Bloc PHP au **début** du fichier pour déclarer les variables
- Indentation flush à gauche si pas dans un bloc parent
- Tester souvent dans le navigateur après chaque modif
- Vérifier le code source rendu avec `Cmd + Option + U`

### ⚠️ Pièges à éviter

- Confondre `=` (affectation) et `==` (comparaison)
- Utiliser une variable avant de l'avoir déclarée
- Dire "le navigateur lit du PHP" → **NON**, jamais
- Confondre `'...'` et `"..."` pour l'interpolation
- Confondre concat PHP `.` et concat JS `+`

### 🎓 Questions soutenance type

- _"À quoi sert le `?>` final ?"_ → Ferme un bloc PHP, sépare code et HTML
- _"Différence entre type et fonction ?"_ → Type = catégorie de valeur, Fonction = action exécutée
- _"Pourquoi PHP s'exécute-t-il côté serveur ?"_ → Pour produire du HTML dynamique AVANT envoi au navigateur
- _"Comment afficher une variable ?"_ → `echo $variable;`
- _"Que se passe-t-il si une variable est utilisée avant d'être déclarée ?"_ → PHP affiche rien (la variable est `null`, devient `""` à l'affichage)

---

## Session 2 — 2026-06-02

### 🎯 Exercices réalisés

- Construction d'un formulaire avec <form> (formulaire), <fieldset>(cadre), <legend>(légende), <input type="text">, <label for="">, <textarea name="">, <button type="submit">
- détecter un POST côté PHP
- récupérer les données POST et les afficher

### 🧠 Concepts ancrés

- correspondance des **for=""** et **id=""** : permet "d'envoyer" automatiquement le curseur dans le champ lorsque l'on clique sur le texte
- les **for=""** des <label> doivent correspondre au **id=""** des <input> ou <textarea>
- les <label> doivent décrire ce qui est attendu et être renseignés **AVANT** le champ
- Comment ton PHP a-t-il su qu'un formulaire avait été soumis ? : PHP vérifie $\_SERVER['REQUEST_METHOD'] === 'POST' dans une condition. Si vrai, c'est que le formulaire a été soumis en POST
- Comment as-tu récupéré le titre tapé par l'utilisateur ? : $articleTitre = $\_POST['titre'];
- Pourquoi tu as utilisé un if à la fin du body ? À quoi sert un if en général ? : pour obtenir les résultats sous le formulaire - à instruire une condition
- Les opérateurs de comparaison : tu en as vu 4-5 aujourd'hui (===, >=, etc.)
  == simple comparaison
  === comparaison stricte
  ≥ supérieur ou égal
  ≤ inférieur ou égal
- PHP est sans état (stateless) : que se passe-t-il aux données $\_POST quand le script PHP termine son exécution ? (très important, c'est un concept fondamental) : elles disparaissent
- La différence entre '...' et "..." pour afficher une variable dans un echo (l'interpolation, on l'avait revue ce matin) : '...' affiche du texte brut
- Le comportement Cmd+R vs Entrée dans la barre d'adresse après un POST (subtilité que tu as observée) :
  Cmd + R : recharge la page avec le derniers résultat POST
  Entrée dans la barre d'adresse : recharge tout

### 🛠️ Réflexes acquis

- ne pas hésiter à demander de l'aide, mais surtout pas les réponses

### ⚠️ Pièges où je me suis pris

- j'ai répondu "$\_POST" en début de session car je ne savais pas récupérer les infos nécessaires dans ma mémoire
- les apostrophes dans "$\_POST['titre'] sont obligatoire sans quoi le texte brut sera affiché
- 1 seul **if** suffit car les 3 instructions doivent répondre à la même condition
- **=** n'est pas une comparaison mais une affectation

### 🎓 Questions soutenance type

- comment construire un formulaire ? : avec la balise <form>
- comment débuter un fichier .php ? : avec la balise <?php ?>
- comment est construite la fonction "if" ? : if (conditions) {instructions}
- comment PHP sait-il qu'un formulaire a été soumis ? : PHP vérifie $\_SERVER['REQUEST_METHOD'] === 'POST' dans une condition. Si vrai, c'est que le formulaire a été soumis en POST
- comment récupère-t-on les données d'un champ texte côté serveur ? : en HTML : grâce à l'attribut **name=""**, en PHP : grâce à $\_POST['nom_du_champ']
- Pourquoi PHP affiche-t-il **$articleTitre** même si on a rien tapé dans le formulaire ? : il affiche un champ vide, un blanc, pas réellement rien, \*$\_POST['titre'] vaut la chaîne vide **""**

## Session 3 - 2026-06-03 - matin

### 🎯 Exercices réalisés

# truthy et falsy

```php
<?php
$valeur = ___ ;   // remplace par "" (chaîne vide)

if ($valeur) {
    echo "C'est truthy";
} else {
    echo "C'est falsy";
}
?>

```

- remplacer **\_\_\_** par des valeurs **égales à rien** et **égales à quelque chose** :

remplacer **$valeur** par :

      - "" (chaîne vide) => falsy
      - "hello" (chaîne non vide) => truthy
      - 0 (entier zéro) => falsy
      - 42 (entier non zéro) => truthy
      - null => falsy

# les valeurs **égales à rien** empêchent l'exécution du code et renvoie une chaîne vide, elles sont donc **falsy** (false)

# faille XSS (cross-Site Scripting) - Échappement HTML

- afin de se protéger des **hackers**, il existe la commande **htmlspecialchars()**, utilisée dans les champs des formulaires.
  exemple :

```php
echo "<h2>" . htmlspecialchars($articleTitre) . "</h2>";

```

l'interpolation **"$truc"** ne fonctionne pas ici, il faut utiliser la concaténation **.**

- cette commande permet de modifier les caractères :
  **<** devient &lt;
  **>** devient &gt;
  **"** devient &quot;
  **'** devient &#039;
  **&** devient &amp;

### 🧠 Concepts ancrés

- des _$valeur_ égales à rien telles que 0(zéro entier), null ou ""(chaînes vide) retournent des chaînes d'affichage vides **falsy**

- pour protéger les formulaires, on utilise _htmlspecialchars()_ pour utiliser l'échappement HTML

- pour la fonction _htmlspecialchars_, on utilise la concaténation "." au lieu de l'interpolation "$truc" car cette dernière ne fonctionne QUE pour les variables simples, elle ne sait PAS exécuter une fonction.

### 🛠️ Réflexes acquis

- se protéger des hackers dans les formulaires
- dans une condition, une chaîne vide est considérée comme _falsy_, le _if_ ne s'exécute donc pas

### ⚠️ Pièges où je me suis pris

- pour récupérer une donnée, on utilise $\_POST['contenu']
- si une valeur condition est vide, le _if_ ne s'exécute pas
- "le champ \_\_\_", fait référence aux champs d'un formulaire HTML

### 🎓 Questions soutenance type

- comment protéger les champs d'un formulaire ? : avec _htmlspecialchars_
- faut-il utiliser l'interpolation **""**? : non, la concaténation **.**
- que fait la fonction _htmlspecialchars_ ? : elle modifie les caractères spéciaux pour afficher un texte brut

## Session 4 - 2026-06-03 - après-midi

# Conventional Commits

## Format général

Optionnellement avec un scope : `type(scope): description`

## Les types courants

| Préfixe     | Pour quoi                                                  | Exemple                                      |
| ----------- | ---------------------------------------------------------- | -------------------------------------------- |
| `feat:`     | Nouvelle fonctionnalité visible par l'utilisateur          | `feat: add login form`                       |
| `fix:`      | Correction de bug                                          | `fix: handle empty title in article display` |
| `docs:`     | Documentation seulement (README, commentaires, vade-mecum) | `docs: update vade-mecum with XSS section`   |
| `chore:`    | Maintenance, config, dépendances, gitignore                | `chore: ignore secrets file`                 |
| `refactor:` | Réorganisation du code sans changer son comportement       | `refactor: extract db connection to db.php`  |
| `style:`    | Formatage, indentation, espaces (pas de logique)           | `style: fix indentation in connexion.php`    |
| `test:`     | Ajout ou modification de tests                             | `test: add cases for empty form submission`  |
| `perf:`     | Amélioration de performance                                | `perf: cache article list`                   |
| `build:`    | Système de build, outils, dépendances externes             | `build: add composer config`                 |
| `ci:`       | Configuration intégration continue (GitHub Actions...)     | `ci: add lint workflow`                      |

## Règles dures

### 1. Forme impérative obligatoire

Test mental : \_"If applied, this commit will _\_\_"_

| Bon ✅                  | Mauvais ❌                 |
| ----------------------- | -------------------------- |
| `add login form`        | `added login form`         |
| `fix XSS vulnerability` | `fixing XSS vulnerability` |
| `update README`         | `updates README`           |

### 2. Atomicité

**1 commit = 1 changement logique cohérent.**
Si tu touches à plusieurs sujets sans lien : c'est plusieurs commits.

### 3. Longueur

- Ligne de titre : **≤ 72 caractères** (idéal 50)
- Si tu as plus à dire : un saut de ligne, puis un corps explicatif

## Exemple d'historique propre

feat: add admin login with password*verify
chore: ignore seed*\*.php temporary scripts
docs: add vade-mecum technique with PDO section
refactor: extract PDO connection to reusable db.php
fix: handle empty form submission

## Anti-patterns à éviter

- ❌ `update` → trop vague, dit rien
- ❌ `fix bug` → quel bug ?
- ❌ `WIP` → "Work In Progress", à éviter en main (OK en branche perso)
- ❌ `commit` → pléonasme
- ❌ Verbes au passé : `added`, `fixed`, `updated`

### .gitignore

- .gitignore est un fichier qui dit à Git "ne suis _JAMAIS_ ces fichiers - ils n'ont pas leur place dans l'historique".

## fichiers .gitignore

- fichiers **système** générés par l'OS : .DS_Store(macOS), Thumbs.db(Windows)
- fichiers **secrets** : .env, mots de passe en dur
- fichiers **temporaires** ou de **cache** : _.log, _.tmp
- **dépendances générées** : node.modules/, vendor/
- fichiers **d'éditeurs** : .vscode/, .idea/

### 🎯 Exercices réalisés

- initialisation Git avec la commande git init pour initialiser un repo local
- création du fichier .gitignore : configuration des fichiers ignorés lors d'un push => fichiers système, secrets, temporaires, éditeur, dépendances
- git status : pour savoir où on en est dans le repo
- git add . : pour ajouter tous les fichiers du dossier au repo
- premier commit : construction **préfixe: impératif(ex : add) -m "message du commit (≤ à 72 caractères, idéal 50)"**
- git push

### 🛠️ Réflexes acquis

- utiliser **-m** pour les commits, choisir les préfixe, 1 modif = 1 commit, bien formuler le message

### ⚠️ Pièges où je me suis pris

- ne pas oublier les guillemets entourant le message du commit
- attention à l'orthographe ! (se relire)
- bien choisir les préfixes des commit
- les commits doivent décrire précisément ce qu'ils font

### 🎓 Questions soutenance type

- où se font les commandes pour Git ? : dans le Terminal
- comment initier un repo Git ? : avec la commande git init
- quelle est la différence entre les préfixes feat: et chore: ? : feat: et pour l'ajout de fonctionnalités visibles, chore: pour la maintenance, gitignore...

## Session 5 - 2026-06-04

### 🎯 Exercices réalisés

- découverte de la fonction empty() : sert à tester si une variable est vide
- découverte de l'opérateur &&(ET logique)pour "additionner" les conditions d'une variable
- découverte de la fonction elseif (sinon si) : ajoute une condition à l'exécution d'une variable
- second commit

### 🛠️ Réflexes acquis

- ne pas permettre qu'un formulaire vide soit soumis grâce à empty()
- ajouter autant de conditions que nécessaire

### 🧠 Concepts ancrés

- fonction empty(), qui retourne **true** si une variable est vide. !empty(), elle, retourne : (fonction) n'est PAS vide
- l'opérateur &&(ET logique) permets d'additionner les conditions d'une fonction
- elseif(sinon si) permet d'ajouter une condition si le if est faux
- else quant à elle s'exécute si aucune condition au-dessus n'est exécutée

### ⚠️ Pièges où je me suis pris

- oublie de parenthèse : il doit y avoir autant de parenthèses ouvrantes que fermantes
- je ne sais pas encore déterminer le bon préfixe des commits
- déterminer la bonne formulation des commits

### 🎓 Questions soutenance type

- à quoi sert la fonction **empty()** ? : elle teste si une variable est vide
- combien d'opérateurs && (ET logique) peut-on utiliser dans une condition ? : autant que nécessaire
