# Vade-mecum technique — Projet mini-blog perso

> Mémo personnel des concepts vus dans ce projet d'apprentissage,
> rédigé au fil des sessions pour préparer la soutenance Titre Pro DWWM.
> Auteur : KodexKem (Kem)
> Démarré : 2026-05-21

---

## 📚 Sommaire des sessions

1. [Session 1 — 2026-05-21 : HTML/PHP de base, variables, concaténation](#session-1--2026-05-21)
2. [Session 2 — 2026-06-02 : Formulaires + `$_POST`](#session-2--2026-06-02)
3. [Session 3 — 2026-06-03 matin : truthy/falsy + XSS](#session-3---2026-06-03---matin)
4. [Session 4 — 2026-06-03 après-midi : Git + Conventional Commits](#session-4---2026-06-03---après-midi)
5. [Session 5 — 2026-06-04 : `empty()`, `&&`, `elseif`](#session-5---2026-06-04)
6. [Session 6 — 2026-06-08 : Tableaux PHP + `foreach`](#session-6---2026-06-08)
7. _(à venir — stockage en fichier JSON)_

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

- Construction d'un formulaire avec `<form>` (formulaire), `<fieldset>` (cadre), `<legend>` (légende), `<input type="text">`, `<label for="">`, `<textarea name="">`, `<button type="submit">`
- Détecter un POST côté PHP
- Récupérer les données POST et les afficher

### 🧠 Concepts ancrés

- Correspondance des **`for=""`** et **`id=""`** : permet "d'envoyer" automatiquement le curseur dans le champ lorsque l'on clique sur le texte du label
- Les **`for=""`** des `<label>` doivent correspondre aux **`id=""`** des `<input>` ou `<textarea>`
- Les `<label>` doivent décrire ce qui est attendu et être renseignés **AVANT** le champ
- **Comment PHP sait-il qu'un formulaire a été soumis ?** → PHP vérifie `$_SERVER['REQUEST_METHOD'] === 'POST'` dans une condition. Si vrai, c'est que le formulaire a été soumis en POST
- **Comment récupérer le titre tapé par l'utilisateur ?** → `$articleTitre = $_POST['titre'];`
- **Pourquoi utiliser un `if` à la fin du body ?** → Pour afficher les résultats sous le formulaire **uniquement quand il a été soumis**. Le `if` sert à exécuter du code conditionnellement.
- **Opérateurs de comparaison vus aujourd'hui** :
  - `==` comparaison souple (compare les valeurs, ignore les types)
  - `===` comparaison stricte (compare valeurs **ET** types)
  - `>=` supérieur ou égal
  - `<=` inférieur ou égal
- **PHP est sans état (stateless)** ⚠️ FONDAMENTAL : quand le script PHP termine son exécution, les `$_POST` et toutes les variables **disparaissent** de la mémoire. Au prochain rechargement, PHP repart de zéro.
- **Interpolation `'...'` vs `"..."`** (rappel session 1) : `'...'` affiche le texte brut, `"..."` remplace les `$variables` par leur valeur
- **Cmd+R vs Entrée dans la barre d'adresse après un POST** :
  - **Cmd + R** : recharge la page **en réémettant la requête POST** (le navigateur réenvoie les données)
  - **Entrée dans la barre d'adresse** : recharge la page en **GET** (les données POST disparaissent)

### 🛠️ Réflexes acquis

- Ne pas hésiter à demander de l'aide, mais surtout pas les réponses
- Vérifier la correspondance `for=""` / `id=""` à chaque ajout de champ

### ⚠️ Pièges où je me suis pris

- J'ai répondu "`$_POST`" en début de session car je ne savais pas récupérer les infos nécessaires dans ma mémoire
- Les apostrophes dans `$_POST['titre']` sont **obligatoires**, sans quoi PHP cherche une constante `titre` et affiche un warning
- 1 seul **`if`** suffit car les 3 instructions doivent répondre à la même condition
- **`=`** n'est pas une comparaison mais une affectation

### 🎓 Questions soutenance type

- _"Comment construire un formulaire ?"_ → Avec la balise `<form>` contenant des `<input>` et un `<button type="submit">`
- _"Comment débuter un fichier `.php` ?"_ → Avec la balise d'ouverture `<?php`
- _"Comment est construite la structure `if` ?"_ → `if (condition) { instructions }`
- _"Comment PHP sait-il qu'un formulaire a été soumis ?"_ → PHP vérifie `$_SERVER['REQUEST_METHOD'] === 'POST'` dans une condition. Si vrai, c'est que le formulaire a été soumis en POST.
- _"Comment récupère-t-on les données d'un champ texte côté serveur ?"_ → En HTML : grâce à l'attribut `name=""`. En PHP : grâce à `$_POST['nom_du_champ']`.
- _"Pourquoi PHP affiche-t-il `$articleTitre` même si on n'a rien tapé dans le formulaire ?"_ → Il affiche un champ vide, pas réellement rien : `$_POST['titre']` vaut la chaîne vide `""`, et `""` affiché ne produit rien de visible.

---

## Session 3 - 2026-06-03 - matin

### 🎯 Exercices réalisés

#### Truthy et falsy

```php
<?php
$valeur = ___ ;   // remplacer par différentes valeurs

if ($valeur) {
    echo "C'est truthy";
} else {
    echo "C'est falsy";
}
?>
```

Tableau des résultats observés :

| Valeur de `$valeur`       | Résultat |
| ------------------------- | -------- |
| `""` (chaîne vide)        | falsy    |
| `"hello"` (chaîne pleine) | truthy   |
| `0` (entier zéro)         | falsy    |
| `42` (entier non zéro)    | truthy   |
| `null`                    | falsy    |

➝ Les valeurs **"vides" ou "nulles"** (`""`, `0`, `null`, `false`, `[]`) sont considérées **falsy** par PHP dans un `if`. Le bloc ne s'exécute pas.

#### Faille XSS (Cross-Site Scripting) — Échappement HTML

Pour se protéger des **hackers**, on utilise la fonction **`htmlspecialchars()`** sur tout texte venant de l'utilisateur avant de l'afficher.

Exemple :

```php
echo "<h2>" . htmlspecialchars($articleTitre) . "</h2>";
```

⚠️ L'interpolation `"$truc"` ne fonctionne **pas** ici : on doit utiliser la concaténation `.` car l'interpolation ne sait pas exécuter une fonction.

Caractères transformés par `htmlspecialchars()` :

| Caractère original | Devient  |
| ------------------ | -------- |
| `<`                | `&lt;`   |
| `>`                | `&gt;`   |
| `"`                | `&quot;` |
| `'`                | `&#039;` |
| `&`                | `&amp;`  |

### 🧠 Concepts ancrés

- Les valeurs falsy en PHP : `""`, `0`, `null`, `false`, `[]` — dans un `if`, le bloc ne s'exécute pas
- Pour protéger les formulaires contre le XSS, on utilise `htmlspecialchars()` avant tout affichage de données utilisateur
- Pour `htmlspecialchars()`, on utilise la **concaténation `.`** au lieu de l'interpolation `"$truc"` car l'interpolation ne sait QUE remplacer une variable simple, pas exécuter une fonction

### 🛠️ Réflexes acquis

- Se protéger des hackers dans les formulaires : **toute donnée utilisateur affichée passe par `htmlspecialchars()`**
- Dans une condition, une chaîne vide est considérée comme _falsy_, le `if` ne s'exécute donc pas

### ⚠️ Pièges où je me suis pris

- Pour récupérer une donnée, on utilise `$_POST['contenu']` (pas `$_POST[contenu]` sans guillemets)
- Si une valeur de condition est vide/falsy, le `if` ne s'exécute pas
- "Le champ `___`" fait référence aux champs d'un formulaire HTML

### 🎓 Questions soutenance type

- _"Comment protéger les champs d'un formulaire ?"_ → Avec `htmlspecialchars()`
- _"Faut-il utiliser l'interpolation `""` avec une fonction ?"_ → Non, la concaténation `.`
- _"Que fait la fonction `htmlspecialchars()` ?"_ → Elle transforme les caractères spéciaux HTML en entités pour empêcher leur interprétation par le navigateur (et bloquer l'injection de balises malveillantes)

---

## Session 4 - 2026-06-03 - après-midi

### Conventional Commits

#### Format général

Optionnellement avec un scope : `type(scope): description`

#### Les types courants

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

#### Règles dures

##### 1. Forme impérative obligatoire

Test mental : `_"If applied, this commit will ___"_`

| Bon ✅                  | Mauvais ❌                 |
| ----------------------- | -------------------------- |
| `add login form`        | `added login form`         |
| `fix XSS vulnerability` | `fixing XSS vulnerability` |
| `update README`         | `updates README`           |

##### 2. Atomicité

**1 commit = 1 changement logique cohérent.**
Si tu touches à plusieurs sujets sans lien : c'est plusieurs commits.

##### 3. Longueur

- Ligne de titre : **≤ 72 caractères** (idéal 50)
- Si tu as plus à dire : un saut de ligne, puis un corps explicatif

#### Exemple d'historique propre

```
feat: add admin login with password_verify
chore: ignore seed_*.php temporary scripts
docs: add vade-mecum technique with PDO section
refactor: extract PDO connection to reusable db.php
fix: handle empty form submission
```

#### Anti-patterns à éviter

- ❌ `update` → trop vague, dit rien
- ❌ `fix bug` → quel bug ?
- ❌ `WIP` → "Work In Progress", à éviter en main (OK en branche perso)
- ❌ `commit` → pléonasme
- ❌ Verbes au passé : `added`, `fixed`, `updated`

### `.gitignore`

- `.gitignore` est un fichier qui dit à Git "ne suis **JAMAIS** ces fichiers — ils n'ont pas leur place dans l'historique".

#### Fichiers à ignorer dans `.gitignore`

- Fichiers **système** générés par l'OS : `.DS_Store` (macOS), `Thumbs.db` (Windows)
- Fichiers **secrets** : `.env`, mots de passe en dur
- Fichiers **temporaires** ou de **cache** : `*.log`, `*.tmp`
- **Dépendances générées** : `node_modules/`, `vendor/`
- Fichiers **d'éditeurs** : `.vscode/`, `.idea/`

### 🎯 Exercices réalisés

- Initialisation Git avec la commande `git init` pour initialiser un repo local
- Création du fichier `.gitignore` : configuration des fichiers ignorés lors d'un push → système, secrets, temporaires, éditeur, dépendances
- `git status` : pour savoir où on en est dans le repo
- `git add .` : pour ajouter tous les fichiers du dossier au repo (à utiliser avec précaution, préférer nommer les fichiers)
- Premier commit : construction **`git commit -m "préfixe: verbe-impératif description"`** (≤ 72 caractères, idéal 50)
- `git push` : envoi vers GitHub

### 🛠️ Réflexes acquis

- Utiliser **`-m`** pour le message de commit
- Choisir le bon préfixe (`feat:`, `fix:`, `chore:`...)
- 1 modif logique = 1 commit (atomicité)
- Bien formuler le message à l'impératif présent

### ⚠️ Pièges où je me suis pris

- Ne pas oublier les guillemets entourant le message du commit
- Attention à l'orthographe ! (se relire avant de valider)
- Bien choisir le préfixe du commit
- Les commits doivent décrire précisément ce qu'ils font

### 🎓 Questions soutenance type

- _"Où se tapent les commandes Git ?"_ → Dans le Terminal
- _"Comment initier un repo Git ?"_ → Avec la commande `git init`
- _"Différence entre les préfixes `feat:` et `chore:` ?"_ → `feat:` est pour l'ajout de fonctionnalités visibles par l'utilisateur, `chore:` pour la maintenance (gitignore, config, dépendances)
- _"Qu'est-ce que l'atomicité d'un commit ?"_ → 1 commit = 1 changement logique cohérent. Si plusieurs sujets sans lien sont touchés, on fait plusieurs commits.

---

## Session 5 - 2026-06-04

### 🎯 Exercices réalisés

- Découverte de la fonction `empty()` : sert à tester si une variable est vide
- Découverte de l'opérateur `&&` (ET logique) pour **combiner** plusieurs conditions
- Découverte de la structure `elseif` (sinon si) : ajoute une condition alternative à un `if`
- Second commit du projet

### 🧠 Concepts ancrés

- **`empty($var)`** retourne `true` si la variable est vide (`""`, `0`, `null`, `[]`, non définie...)
- **`!empty($var)`** retourne `true` si la variable **n'est PAS** vide (le `!` est la négation logique)
- L'opérateur **`&&` (ET logique)** combine plusieurs conditions : toutes doivent être vraies pour que le bloc s'exécute
- **`elseif`** (sinon si) permet d'ajouter une condition alternative si le `if` est faux
- **`else`** s'exécute si **aucune** condition au-dessus n'a été remplie

### 🛠️ Réflexes acquis

- Ne pas permettre qu'un formulaire vide soit soumis grâce à `!empty()`
- Ajouter autant de conditions que nécessaire avec `&&`
- Structurer : `if (...) {...} elseif (...) {...} else {...}`

### ⚠️ Pièges où je me suis pris

- **Oubli de parenthèse** : il doit y avoir autant de parenthèses ouvrantes que fermantes
- Je ne sais pas encore déterminer du premier coup le bon préfixe des commits
- Déterminer la bonne formulation des commits

### 🎓 Questions soutenance type

- _"À quoi sert la fonction `empty()` ?"_ → Elle teste si une variable est vide et retourne un booléen
- _"Combien d'opérateurs `&&` (ET logique) peut-on utiliser dans une condition ?"_ → Autant que nécessaire
- _"Différence entre `if / elseif / else` ?"_ → `if` teste la première condition. `elseif` teste une condition alternative si le `if` est faux. `else` est le filet de sécurité si aucune des conditions précédentes n'a été remplie.

---

## Session 6 - 2026-06-08

### 🎯 Exercices réalisés

- Découverte des **tableaux PHP** (indexés et associatifs)
- Découverte de la boucle **`foreach`** (variantes simple et `$cle => $valeur`)
- Fichier d'exercice `test_array.php` : création et parcours d'un tableau indexé et d'un tableau associatif
- **Application au mini-blog** : ajout du tableau **multidimensionnel** `$articles` dans `index.php` et affichage des articles avec un `foreach`
- 3 commits atomiques poussés sur GitHub (style + test_array + feature liste articles)

### 🧠 Concepts ancrés

#### 1. Tableaux indexés (clés numériques automatiques)

```php
$trucs = ["truc1", "truc2", "truc3"];
```

- PHP attribue automatiquement des clés numériques : `0`, `1`, `2`...
- **Convention informatique** : les indices commencent à **0**, pas à 1
- Accès à un élément : `echo $trucs[0];` affiche `truc1`

#### 2. Tableaux associatifs (clés explicites)

```php
$machin = [
    "donnee1" => "valeur1",
    "donnee2" => "valeur2",
    "donnee3" => "valeur3"
];
```

- Chaque valeur est associée à une clé **choisie** par le développeur
- Accès à un élément : `echo $machin["donnee1"];` affiche `valeur1`
- ⚠️ Les clés d'un tableau PHP ne peuvent être QUE des **chaînes** (`string`) ou des **entiers** (`int`). Pas float, pas array, pas object.

#### 3. Tableaux multidimensionnels (tableau de tableaux)

Un tableau peut **contenir d'autres tableaux**. C'est exactement ce qu'on a fait pour `$articles` dans le mini-blog :

```php
$articles = [
    [
        "titre" => "Le premier article",
        "contenu" => "Ici apparaîtra un article cool"
    ],
    [
        "titre" => "Le second article",
        "contenu" => "..."
    ]
];
```

- `$articles` est un tableau **indexé** dont chaque élément est lui-même un tableau **associatif**
- Accès au titre du 1er article : `$articles[0]["titre"]`

#### 4. La boucle `foreach`

Dédiée aux tableaux PHP, elle parcourt automatiquement chaque élément et le rend disponible dans une variable.

**Construction :**

```php
foreach ($tableau as $element) {
    // ici je peux utiliser $element à chaque tour
}
```

**Décodage :**

- `$tableau` → le tableau à parcourir (déjà créé)
- `as` → mot-clé obligatoire ("en tant que")
- `$element` → nom de variable **au choix** : à chaque tour, cette variable prend la valeur de l'élément courant

**Exemple :**

```php
$fruits = ["pomme", "banane", "kiwi"];

foreach ($fruits as $fruit) {
    echo $fruit;
    echo "<br>";
}
```

Ce qui s'exécute :

```
Tour 1 : $fruit = "pomme"  → echo "pomme" + <br>
Tour 2 : $fruit = "banane" → echo "banane" + <br>
Tour 3 : $fruit = "kiwi"   → echo "kiwi" + <br>
Plus d'éléments → la boucle s'arrête
```

➝ Je n'ai plus à connaître le nombre d'éléments, PHP le fait pour moi.

#### 5. Variante `foreach` pour tableau associatif

```php
$utilisateur = [
    "nom" => "Kem",
    "age" => 35,
    "email" => "kem@exemple.fr"
];

foreach ($utilisateur as $cle => $valeur) {
    echo $cle . " : " . $valeur . "<br>";
}
```

**Résultat :**

```
nom : Kem
age : 35
email : kem@exemple.fr
```

➝ Avec `$cle => $valeur` (note le `=>` comme dans la déclaration du tableau), tu récupères **et** la clé **et** la valeur à chaque tour.

#### 6. Le piège stateless RÉVÉLÉ par les tableaux ⚠️ FONDAMENTAL

**Expérience faite en session :** j'ai soumis un 4ème article via le formulaire. Résultat :

- ✅ Il s'affiche **sous le formulaire** (grâce au `if` qui traite le POST)
- ❌ Il n'apparaît **PAS** dans la section "Articles publiés" (le foreach sur `$articles`)

**Pourquoi ?** Parce que PHP est **stateless** (rappel session 2) :

À chaque rechargement de page, le script PHP **repart de zéro**. Le tableau `$articles` est **réécrit en dur dans le code** à chaque exécution. Le 4ème article soumis via POST existe **uniquement le temps de l'exécution**, puis disparaît.

➝ **Conséquence** : pour qu'un article soumis **persiste**, il faudra le **stocker quelque part en dehors du script PHP** (fichier, base de données...). C'est l'objet de la session 7.

### 🛠️ Réflexes acquis

- Fermer correctement les balises (notamment `?>` avant un bloc HTML)
- Nommer la variable de boucle au **singulier** (`$articles as $article`) — convention de lisibilité
- Distinguer le type de clé pour l'accès :
  - Clé entière → `$tab[0]`
  - Clé chaîne → `$tab["prenom"]`
- Englober un tableau de tableaux avec des `[ ]` parents (multidimensionnel)

### 🧠 Concepts ancrés (récap rapide)

- Ne pas mélanger les types d'accès : utiliser la clé **EXACTE** sous laquelle l'élément est stocké
  - Clé `0` (entier) → `$tab[0]`
  - Clé `"prenom"` (chaîne) → `$tab["prenom"]`
- Un tableau peut contenir d'autres tableaux → tableau **multidimensionnel**
- Sans persistance, les données POST disparaissent à chaque rechargement (**stateless**)
- file_put_contents() → écrire le résultat dans un le fichier
- file_get_contents → lire le fichier existant
- json_decode() → transformer la chaîne JSON lue en tableau PHP
- json_encode() → transformer le tableau modifié en chaîne JSON

### ⚠️ Pièges où je me suis pris

- Confondre tableau associatif et tableau indexé
- Confondre les clés contenues dans les tableaux
- Variable inexistante dans le `foreach` (copier-coller un nom qui n'existe pas)
- Utiliser le même nom pour le tableau ET la variable de boucle (`foreach ($fruits as $fruits)`)
- Mal englober un tableau de tableaux avec les `[ ]` parents
- Oublier de fermer la balise `?>` avant un bloc HTML
- **Prédiction erronée** sur le piège stateless (j'ai prédit "oui/oui/oui" → 0/3 correct)

### 🎓 Questions soutenance type

- _"À quoi sert la boucle `foreach` ?"_ → À parcourir un tableau pour **manipuler** chaque élément (afficher, transformer, filtrer, calculer...). L'affichage n'est qu'un cas d'usage parmi d'autres.
- _"Quelle différence entre tableau indexé et tableau associatif ?"_ → Le tableau indexé a des clés **numériques automatiques** (0, 1, 2...). Le tableau associatif a des clés **choisies par le développeur**. En PHP, les clés ne peuvent être que des `string` ou des `int`.
- _"Qu'est-ce qu'un tableau multidimensionnel ?"_ → Un tableau qui contient d'autres tableaux. Utile pour représenter des entités avec plusieurs propriétés (ex : liste d'articles, chaque article ayant un titre et un contenu).
- _"Pourquoi un article soumis via le formulaire ne s'ajoute-t-il pas à la liste des articles publiés ?"_ → Parce que PHP est stateless. Le tableau `$articles` est réécrit en dur à chaque exécution. Pour persister, il faut stocker en dehors du script (fichier ou base de données).

## Session 7 - 2026-06-15

### 🎯 Exercices réalisés

- Compléter un squelette de code pour ajouter un article :

  ```php

      <?php
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {

      // Étape 1 : Lire le fichier JSON existant
      $contenuFichier = file_get_contents("articles.json");

      // Étape 2 : Transformer la chaîne JSON en tableau PHP
      //   (le 2ème paramètre "true" force le retour en tableau associatif)
      $articles = json_decode($contenuFichier, true);

      // Étape 3 : Ajouter le nouvel article au tableau
      //   👇 SYNTAXE NOUVELLE — c'est la réponse à ta Q3
      $articles[] = [
          "titre" => htmlspecialchars($_POST['titre']),
          "contenu" => htmlspecialchars($_POST['contenu'])
      ];

      // Étape 4 : Reconvertir le tableau modifié en chaîne JSON
      $nouveauContenu = json_encode($articles);

      // Étape 5 : Réécrire la nouvelle chaîne dans le fichier
      file_put_contents("articles.json", $nouveauContenu);

  }
  ?>
  ```

- lire le fichier articles.json et alimenter $articles

  ```php
  <?php
  // Lire le fichier qui contient tous les articles
  $contenuFichier = file_get_contents("articles.json");

  // Transformer la chaîne JSON en tableau PHP
  $articles = json_decode($contenuFichier, true) ?? [];
  ?>
  ```

### 🧠 Concepts ancrés

#### 1. Syntaxe nouvelle : ajouter un article au tableau

```php
<?php
$articles[] = [
"titre" => htmlspecialchars($_POST['titre']),
"contenu" => htmlspecialchars($_POST['contenu'])
];
?>
```

#### 2. Opérateur ?? (null coalescing)

- nouvelle syntaxe PHP :

```php
$valeur = $truc ?? "valeur de secours";
```

Décodage :"Si $truc est null(ou n'existe pas), utilise la valeur de secours à droite."

## Exemples

```php
$nom = null;
$nom ?? "Inconnu";       // → "Inconnu"

$age = 35;
$age ?? "Inconnu";       // → 35  (la valeur de gauche est utilisée car non null)

$json = null;
$articles = $json ?? []; // → []  (un tableau vide, sur lequel foreach passe sans erreur)
```

#### 3. Stockage persistant via fichier JSON pour pallier le stateless de PHP

### 🛠️ Réflexes acquis

- $articles[] pour ajouter un article au tableau
- Empêcher le plantage du code quand une variable vaut **null** avec l'opérateur ??
- **header("Location: index.php"); exit;** transforme un **POST** en **GET** :
  Après un POST avec sauvegarde réussie :

1. header("Location: index.php") → dit au navigateur "va recharger en GET"
2. exit; → arrête tout de suite le script PHP
3. Le navigateur recharge en GET → plus de POST en mémoire navigateur
4. Cmd+R ultérieur recharge ce GET → AUCUN risque de re-soumettre le POST

### ⚠️ Pièges où je me suis pris

- htmlspecialchars() transforme les caractères en **entités HTML**, pour que le navigateur les affiche **comme du texte** et non comme des balises (= protection contre l'injection XSS). À utiliser au moment d'afficher les données qui viennent de l'utilisateur.
- "==" est une comparaison simple / "===" est une comparaison stricte
  Exemples :

```php

<?php
"5" == 5      // → true (PHP convertit "5" en 5 avant de comparer)
"5" === 5   // → false (chaîne ≠ entier, le type compte)

0 == false  // → true
0 === false // → false (entier ≠ booléen)
?>
```

== ignore le type / === exige valeur ET type identiques.

- quand une fonction "qui devait retourner quelque chose" échoue, elle retourne **false**.
- json_decode() retourne **null** quand on lui donne quelque chose qui n'est pas du JSON.
- foreach exige un tableau ou un objet.`
- Au premier chargement,**articles.json** n'existe pas → **file_get_contents()** retourne **false** → **json_decode()** retourne **null** → **foreach(null)** plante. D'où le filet **?? []**.

### 🎓 Questions soutenance type

- Avec quel opérateur est-il possible d'empêcher le plantage du code ? : ?? (null coalescing)
- Comment fonctionne-t-il ? : c'est un opérateur logique qui renvoie son opérande de droite lorsque son opérande de gauche vaut null ou n'existe pas / non définie et qui renvoie son opérande de gauche sinon.
- Pourquoi avez-vous choisi un fichier JSON plutôt qu'une base de données ? : Pour ce projet d'apprentissage, le JSON est suffisant – peu de données, lecture/écriture simple, pas besoin d'installer un SGBD. La base de données viendra dans une étape ultérieure quand on aura besoin de requêtes complexes, d'utilisateurs multiples, ou de garantir l'intégrité des données.
- Que se passe-t-il si articles.json est corrompu (JSON invalide) ? : **json_decode()** retourne **null**, et grâce à **?? []**, **$articles** devient un tableau vide → **foreach** ne plante pas, simplement aucun article n'est affiché.

---

## Session 8 - 2026-06-16

### 🎯 Exercices réalisés

- Le concept ＄\_SESSION

```php
<?php
// ⬇️ TROU 1 — démarre la session AVANT toute autre chose
session_start();

$nomDuBlog = 'You are Not Alone';
$articleSoumis = false;

// Lire les articles existants (inchangé)
$contenuFichier = file_get_contents("articles.json");
$articles = json_decode($contenuFichier, true) ?? [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['titre']) && !empty($_POST['contenu'])) {

        // ... les 5 étapes de sauvegarde ...

        // ⬇️ TROU 2 — stocke le message dans la session AVANT le redirect
        $_SESSION['flash'] = "Article soumis !";

        header("Location: index.php");
        exit;
    } else {
        $erreurChamps = true;
    }
}
?>

<!-- ... HTML head + body ... -->

<!-- Dans le HTML, à l'endroit où on affichait "Article soumis !" -->
<?php
// ⬇️ TROU 3 — teste si un message flash existe (utilise isset() ou !empty())
if (isset($_SESSION['flash'])) {
echo "<p>" . htmlspecialchars($_SESSION['flash']) . "</p>";
// ⬇️ TROU 4 — supprime le message après l'avoir affiché (effet one-shot)
unset($_SESSION['flash']);
}
?>
```

### 🧠 Concepts ancrés

- Après un POST avec sauvegarde réussie :

1. **header("Location: index.php)** dit au navigateur : **va recharger en GET**
2. **exit** : arrête tout de suite le script PHP
3. le navigateur recharge en GET : plus de POST en mémoire navigateur
4. Cmd + R recharge ce GET : plus aucun risque de re-soumettre le POST

- **＄\_SESSION** est une **SUPERGLOBALE PERSISTANTE** utilisée pour sauver les données en tre les requêtes. Elle doit être appeler via **session_start();** **AVANT** envoi de HTML, TOUT EN HAUT DU FICHIER PHP ➞ PHP donne un cookie **PHPSESSID** (identifiant unique) au navigateur qui le renvoie à chaque requête, PHP retrouve le tableau $\_SESSION associé à cet ID, côté serveur.
- pour détruire une variable, on utilise **unset()** : effet "one-shot" : la clé 'flash' n'existe plus dans **$\_SESSION**, le message est affiché UNE fois, puis effacé.

### 🛠️ Réflexes acquis

- $\_SESSION pour stocker les données côté serveur, toujours appelée par session_start()
- Cookie PHPSESSID identifiant unique communiquant entre navigateur et serveur
- unset($\_SESSION) pour supprimer 1 clé
- Différence isset() et !empty() : isset() teste si une donnée existe et !empty() teste si elle existe ET n'est pas vide.

### ⚠️ Pièges où je me suis pris

- **header("Location: index.php)** dit au navigateur : **va recharger en GET**
- **exit** : arrête tout de suite le script PHP
- htmlspecialchars() transforme les caractères en entités HTML, pour que le navigateur les affiche comme du texte et non comme des balises : **JE NE DIS PLUS JAMAIS MOJIBAKE pour htmlspecialchars !!!!**
  RAPPEL : mojibake est un bug d'encodage / entités HTML une représentation volontaire voulue pour bloquer le XSS
- confondre $\_POST et $\_SESSION : $\_POST disparaît avec **exit;**, mais $\_SESSION est est stockée côté serveur, et est donc rechargé avec Cmd + R en GET
- le cookie PHPSESSID ne transporte pas une donnée, juste un identifiant unique, la donnée est côté serveur !

### 🎓 Questions soutenance type

1. Qu'est ce que `$_SESSION`et à quoi sert-il ? : une variable SUPERGLOBALE qui permet de stocker les données côté serveur, et permet une persistance entre les requêtes.
2. Pourquoi appelle-t-on `session_start()` en haut du fichier ? : démarrer le mécanisme ET être appelée AVANT tout output HTML (sinon "headers already sent").
3. Quelle différence entre `$_POST` et `$_SESSION` ? : `$_POST` = 1 seule requête / `$_SESSION` = persiste entre plusieurs.
4. Comment fonctionne le pattern flash (message one-shot) ? : set en session → redirect → display côté GET → unset.
5. À quoi sert le cookie PHPSESSID, et où sont stockées les données ? : c'est un identifiant unique communiquant entre navigateur et serveur, qui stocke les données côté serveur.

---

## Session 9 - 2026-06-18

### 🎯 Exercices réalisés

- création de la base de données du projet `mini_blog`

```php
CREATE TABLE articles (
    id              INT AUTO_INCREMENT PRIMARY KEY,
    titre           VARCHAR(255),
    contenu         TEXT,
    auteur          VARCHAR(100),
    date_creation   DATETIME DEFAULT CURRENT_TIMESTAMP
);
```

- test de la BDD

```php
INSERT INTO articles (titre, contenu, auteur) VALUES
('Mon premier article', 'Bienvenue sur You are Not Alone !', 'Kem'),
('Le deuxième', 'On teste la BDD MySQL.', 'Kem');
```

- création de db.php :

```php
<?php

$dsn = 'mysql:host=localhost;dbname=mini_blog;charset=utf8mb4';
$user = 'root';
$pass = '';

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

try {
    $db = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}
```

- création du test de la BDD :

```php
<?php

require 'db.php';   // ⬅️ charge notre db.php (qui crée $db)

echo "Connexion OK !<br>";

$stmt = $db->query('SELECT * FROM articles');
$articles = $stmt->fetchAll();

echo "Nombre d'articles : " . count($articles) . "<br><br>";

foreach ($articles as $article) {
    echo "[" . $article['id'] . "] "
       . $article['titre'] . " — par "
       . $article['auteur'] . "<br>";
}
```

### 🧠 Concepts ancrés

- PDO + arguments du constructeur (DSN, user, pass, options)
  Qu'est-ce que PDO et pourquoi le choisir ?

**PDO** = **PHP Data Objects**. C'est une classe native de PHP qui permet de faire dialoguer mon code avec une base de données SQL.

**Pourquoi PDO plutôt que `mysqli` ou les anciennes API ?** Deux raisons :

1. **Sécurité** — PDO supporte nativement les **requêtes paramétrées** (prepared statements), qui sont la défense standard contre l'injection SQL.
2. **Portabilité** — PDO est **multi-supports** : le même code marche avec MySQL, PostgreSQL, SQLite, Oracle, etc. Si on change de SGBD, on change juste 1 ligne au lieu de tout réécrire.

- ATTR_ERRMODE = ERRMODE_EXCEPTION
- ATTR_DEFAULT_FETCH_MODE = FETCH_ASSOC
- query() retourne un PDOStatement (curseur)
- fetch() = 1 ligne / fetchAll() = toutes les lignes
- AUTO_INCREMENT + DEFAULT CURRENT_TIMESTAMP (colonnes auto)

### 🛠️ Réflexes acquis

- Toujours try/catch sur PDO
- Toujours appeler les options ERRMODE et FETCH_ASSOC
- en BDD locale, `user = root` et `pass =''`

### ⚠️ Pièges où je me suis pris

- ne pas confondre identifiants MySQL et GitHub
- revoir les types SQL (TEXTAREA n'en est pas un !!)
- bien identifier les données nécessaires à la BDD
- ne pas utiliser d'accolades mais des parenthèses
- Oublier la clé primaire (id INT AUTO_INCREMENT PRIMARY KEY)

### 🎓 Questions soutenance type

- "Pourquoi PDO plutôt que mysqli ?" : PDO supporte les requêtes préparées, barrières contre l'injection SQL et il est multi-supports (1 seule ligne à changer en cas de changement de SGBD)
- "Décompose un DSN MySQL" : `mysql:host=______;dbname=______;charset=utf8mb4`
  `mysql:` => driver PDO à utiliser
  `host=` => adresse du serveur MySQL (localhost en local)
  `dbname=` => nom de la BDD à utiliser
  `charset=` => encodage des caractères (utf8mb4 pour les émojis)
- "À quoi sert AUTO_INCREMENT ?" : `AUTO_INCREMENT` génère automatiquement un identifiant unique et croissant pour chaque nouvelle ligne. Très utile pour les clés primaires (PRIMARY KEY).
- "Différence fetch / fetchAll ?" : fetch() et fetchAll() sont des méthodes d'un PDOStatement. fetch() récupère une ligne (et avance le curseur), fetchAll() récupère toutes les lignes d'un coup.
- "Pourquoi en local c'est root sans mot de passe ?" : Ce sont les valeurs par défaut de XAMPP en local. Acceptable en dev (machine isolée, pas d'enjeu sécurité). En prod, INTERDIT : on aurait un user dédié avec mot de passe fort, stockés dans .env.
