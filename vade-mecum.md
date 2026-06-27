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
7. [Session 7 — 2026-06-15 : Persistance JSON + opérateur `??`](#session-7---2026-06-15)
8. [Session 8 — 2026-06-16 : `$_SESSION` + flash messages + PRG pattern](#session-8---2026-06-16)
9. [Session 9 — 2026-06-18 : BDD MySQL + connexion PDO (CP5 + début CP6)](#session-9---2026-06-18)
10. [Session 10 — 2026-06-19 : Lecture/INSERT PDO + CSS responsive + module légal (CP6 complet + CP2)](#session-10---2026-06-19)
11. [Session 11 — 2026-06-23/26 : Authentification administrateur (CP8)](#session-11---2026-06-2326)

---

## Session 1 — 2026-05-21

### 🎯 Exercices réalisés

- **Exercice 1** : premier fichier PHP qui affiche `Bienvenue sur mon blog` dans le navigateur.
- **Exercice 2** : introduction aux variables PHP (`$nomDuBlog`, `$messageBienvenue`).
- **Exercice 3** : concaténation avec l'opérateur `.` pour assembler du texte avec une variable `$auteur`.

### 🧠 Concepts ancrés

#### 1. HTML statique vs PHP dynamique

Un fichier `.html` est servi **tel quel** par le serveur : son contenu est figé. Un fichier `.php` est **interprété** par le moteur PHP côté serveur, ce qui permet de produire du contenu dynamique. Quoi qu'il arrive, **le navigateur reçoit TOUJOURS du HTML** — jamais de PHP. Le PHP n'existe que côté serveur.

#### 2. Le serveur PHP local

Pour exécuter du PHP, il faut un serveur web. En local, on lance le serveur intégré avec une commande de type `php -S localhost:8000`. Sans serveur, double-cliquer sur un `.php` ne fait rien d'utile : macOS l'ouvre comme texte brut.

#### 3. Le DOCTYPE

La déclaration `<!DOCTYPE html>` indique au navigateur d'utiliser le **rendu standard HTML5**. Toujours en première ligne du fichier.

#### 4. Meta charset UTF-8

La balise `<meta charset="UTF-8">` indique l'encodage des caractères. Sans elle, les accents (é, à, ç…) s'affichent en "mojibake" — un bug d'encodage, **rien à voir avec une attaque de sécurité**.

#### 5. Attribut `lang`

`<html lang="fr">` indique la langue principale du contenu. Important pour l'**accessibilité** (lecteurs d'écran qui adaptent leur prononciation) et le **SEO** (Google).

#### 6. Type vs Fonction

Un **type** est une catégorie de valeur (`string`, `int`, `bool`, `array`). Une **fonction** est une action que PHP exécute (`echo`, `password_verify`, `strlen`). Analogie : le type est un **ingrédient**, la fonction est une **action de cuisine**.

#### 7. La fonction `echo`

`echo` envoie du texte dans la sortie destinée au navigateur. Pas de parenthèses obligatoires, contrairement à `print()`.

#### 8. Variables PHP

Toute variable commence par **`$`**. Le `=` est l'opérateur d'**affectation** ("stocke la valeur de droite dans la variable de gauche"), à ne pas confondre avec `==` (comparaison souple) et `===` (comparaison stricte).

#### 9. Exécution séquentielle ⚠️ FONDAMENTAL

PHP exécute le fichier **ligne par ligne, de haut en bas, sans jamais revenir en arrière**. Une variable doit être **déclarée AVANT d'être utilisée**. Si on l'appelle avant déclaration, PHP affiche du vide (et un warning discret).

#### 10. Concaténation

En PHP, l'opérateur de concaténation est le **point `.`**, pas le `+` (qui est celui de JavaScript). C'est un piège classique quand on jongle entre les deux langages.

#### 11. Apostrophes vs guillemets

| Type                          | Interpolation des `$variables` ?        |
| ----------------------------- | --------------------------------------- |
| `'...'` (apostrophes simples) | ❌ NON — affiche `$truc` littéralement  |
| `"..."` (guillemets doubles)  | ✅ OUI — remplace `$truc` par sa valeur |

### 🛠️ Réflexes acquis

- Toujours `;` à la fin d'une instruction PHP.
- Bloc PHP au **début** du fichier pour déclarer les variables.
- Tester souvent dans le navigateur après chaque modif.
- Vérifier le code source rendu avec `Cmd + Option + U`.

### ⚠️ Pièges où je me suis pris

- Confondre `=` (affectation) et `==` (comparaison).
- Utiliser une variable avant de l'avoir déclarée.
- Dire "le navigateur lit du PHP" → **NON**, jamais.
- Confondre `'...'` et `"..."` pour l'interpolation.
- Confondre concat PHP `.` et concat JS `+`.

### 🎓 Questions soutenance type

- _"À quoi sert le `?>` final ?"_ → Ferme un bloc PHP, sépare code et HTML.
- _"Différence entre type et fonction ?"_ → Type = catégorie de valeur, Fonction = action exécutée.
- _"Pourquoi PHP s'exécute-t-il côté serveur ?"_ → Pour produire du HTML dynamique AVANT envoi au navigateur.
- _"Comment afficher une variable ?"_ → `echo $variable;`
- _"Que se passe-t-il si une variable est utilisée avant d'être déclarée ?"_ → PHP la traite comme `null`, qui devient `""` à l'affichage.

---

## Session 2 — 2026-06-02

### 🎯 Exercices réalisés

Construction d'un formulaire HTML complet avec `<form>`, `<fieldset>`, `<legend>`, `<input type="text">`, `<label for="">`, `<textarea>`, `<button type="submit">`. Côté PHP : détection de la soumission et récupération des données saisies.

### 🧠 Concepts ancrés

#### Le couplage `label` ↔ `input`

L'attribut `for=""` du `<label>` doit correspondre à l'`id=""` du champ associé. Ce couplage permet au curseur de se positionner automatiquement dans le champ quand on clique sur le label. Le label doit être renseigné **AVANT** le champ et décrire ce qui est attendu.

#### Détection d'une soumission POST

PHP regarde la propriété `$_SERVER['REQUEST_METHOD']`. Si elle vaut `'POST'`, c'est qu'un formulaire a été soumis. On entoure donc le traitement dans une condition de type `if ($_SERVER['REQUEST_METHOD'] === 'POST')`. Ce `if` sert à n'exécuter le code de traitement que dans ce cas précis — sinon, à chaque chargement de page le formulaire serait "traité" comme s'il avait été soumis.

#### Récupération des données POST

Les données du formulaire arrivent côté serveur dans la **superglobale** `$_POST`. C'est un tableau associatif dont les clés sont les `name=""` des champs HTML. Pour lire le champ dont `name="titre"`, on utilise `$_POST['titre']`. Les apostrophes autour de la clé sont **obligatoires** : sans elles, PHP cherche une constante nommée `titre` et émet un warning.

#### Opérateurs de comparaison vus

- `==` comparaison souple (ignore les types)
- `===` comparaison stricte (valeurs **ET** types)
- `>=` supérieur ou égal
- `<=` inférieur ou égal

#### PHP est sans état (stateless) ⚠️ FONDAMENTAL

Quand un script PHP termine son exécution, **toutes les variables disparaissent**, y compris `$_POST`. Au rechargement suivant, PHP repart de zéro. C'est ce qui rendra obligatoire l'introduction d'un mécanisme de persistance plus tard (fichier, session, base de données).

#### Cmd+R vs Entrée après un POST

- **Cmd + R** : recharge la page **en réémettant la requête POST** → le navigateur demande une confirmation pour réenvoyer les données.
- **Entrée dans la barre d'adresse** : recharge la page en **GET** → les données POST sont oubliées.

### 🛠️ Réflexes acquis

- Ne pas hésiter à demander de l'aide, mais pas les réponses directes.
- Vérifier la correspondance `for=""` / `id=""` à chaque ajout de champ.

### ⚠️ Pièges où je me suis pris

- J'ai répondu "`$_POST`" en début de session avant d'avoir reconstitué le concept en mémoire.
- Les apostrophes dans `$_POST['titre']` sont **obligatoires**.
- Un seul `if` suffit pour traiter plusieurs instructions qui dépendent toutes de la même condition.
- `=` n'est pas une comparaison mais une affectation.

### 🎓 Questions soutenance type

- _"Comment construire un formulaire ?"_ → Avec la balise `<form>` contenant des `<input>` et un `<button type="submit">`.
- _"Comment débuter un fichier `.php` ?"_ → Avec la balise d'ouverture `<?php`.
- _"Comment est construite la structure `if` ?"_ → `if (condition) { instructions }`.
- _"Comment PHP sait-il qu'un formulaire a été soumis ?"_ → En testant `$_SERVER['REQUEST_METHOD'] === 'POST'`.
- _"Comment récupère-t-on les données d'un champ texte côté serveur ?"_ → En HTML grâce à `name=""`. En PHP via la superglobale `$_POST['nom_du_champ']`.
- _"Pourquoi PHP affiche un champ vide même si l'utilisateur n'a rien tapé ?"_ → Parce que `$_POST['titre']` vaut la chaîne vide `""`, qui ne produit rien de visible à l'affichage.

---

## Session 3 — 2026-06-03 — matin

### 🎯 Exercices réalisés

#### Truthy et falsy

Test d'un `if ($valeur)` avec différentes valeurs assignées à `$valeur` pour observer si le bloc s'exécute ou non.

| Valeur de `$valeur`       | Résultat |
| ------------------------- | -------- |
| `""` (chaîne vide)        | falsy    |
| `"hello"` (chaîne pleine) | truthy   |
| `0` (entier zéro)         | falsy    |
| `42` (entier non zéro)    | truthy   |
| `null`                    | falsy    |

➝ Les valeurs **"vides" ou "nulles"** (`""`, `0`, `null`, `false`, `[]`) sont considérées **falsy** dans un `if`. Le bloc ne s'exécute pas.

#### Faille XSS et échappement HTML

Découverte de la fonction **`htmlspecialchars()`**. Elle est utilisée sur tout texte venant de l'utilisateur **avant l'affichage**, pour empêcher l'injection de balises ou de scripts malveillants.

⚠️ Subtilité d'écriture : l'interpolation `"$truc"` ne fonctionne PAS avec un appel de fonction. Il faut utiliser la **concaténation avec `.`** pour insérer le résultat de `htmlspecialchars()` dans une chaîne.

**Caractères transformés par `htmlspecialchars()`** :

| Caractère original | Devient  |
| ------------------ | -------- |
| `<`                | `&lt;`   |
| `>`                | `&gt;`   |
| `"`                | `&quot;` |
| `'`                | `&#039;` |
| `&`                | `&amp;`  |

### 🧠 Concepts ancrés

- Les valeurs falsy en PHP : `""`, `0`, `null`, `false`, `[]`. Dans un `if`, le bloc ne s'exécute pas.
- Pour protéger les formulaires contre le XSS, on utilise `htmlspecialchars()` **avant tout affichage** de données utilisateur.
- Avec `htmlspecialchars()`, on utilise la **concaténation `.`** au lieu de l'interpolation `"$truc"`, parce que l'interpolation ne sait QUE remplacer une variable simple, pas exécuter une fonction.

### 🛠️ Réflexes acquis

- Toute donnée utilisateur affichée passe par `htmlspecialchars()`.
- Dans une condition, une chaîne vide est falsy → le `if` ne s'exécute pas.

### ⚠️ Pièges où je me suis pris

- Pour récupérer une donnée, c'est `$_POST['contenu']` (pas `$_POST[contenu]` sans guillemets).
- Si la valeur testée est falsy, le `if` ne s'exécute pas.

### 🎓 Questions soutenance type

- _"Comment protéger les champs d'un formulaire ?"_ → Avec `htmlspecialchars()` à l'affichage.
- _"Faut-il utiliser l'interpolation `""` avec une fonction ?"_ → Non, la concaténation `.`.
- _"Que fait `htmlspecialchars()` ?"_ → Elle transforme les caractères spéciaux HTML en **entités HTML** pour empêcher leur interprétation par le navigateur — c'est le bouclier anti-XSS standard.

---

## Session 4 — 2026-06-03 — après-midi

### Conventional Commits

#### Format général

Optionnellement avec un scope : `type(scope): description`.

#### Les types courants

| Préfixe     | Pour quoi                                            | Exemple                                      |
| ----------- | ---------------------------------------------------- | -------------------------------------------- |
| `feat:`     | Nouvelle fonctionnalité visible par l'utilisateur    | `feat: add login form`                       |
| `fix:`      | Correction de bug                                    | `fix: handle empty title in article display` |
| `docs:`     | Documentation seulement                              | `docs: update vade-mecum with XSS section`   |
| `chore:`    | Maintenance, config, dépendances, gitignore          | `chore: ignore secrets file`                 |
| `refactor:` | Réorganisation du code sans changer son comportement | `refactor: extract db connection to db.php`  |
| `style:`    | Formatage, indentation, espaces (pas de logique)     | `style: fix indentation in connexion.php`    |
| `test:`     | Ajout ou modification de tests                       | `test: add cases for empty form submission`  |
| `perf:`     | Amélioration de performance                          | `perf: cache article list`                   |
| `build:`    | Système de build, outils, dépendances externes       | `build: add composer config`                 |
| `ci:`       | Configuration intégration continue                   | `ci: add lint workflow`                      |

#### Règles dures

##### 1. Forme impérative obligatoire

Test mental : _"If applied, this commit will \_\_\_"_.

| Bon ✅                  | Mauvais ❌                 |
| ----------------------- | -------------------------- |
| `add login form`        | `added login form`         |
| `fix XSS vulnerability` | `fixing XSS vulnerability` |
| `update README`         | `updates README`           |

##### 2. Atomicité

**1 commit = 1 changement logique cohérent.** Si on touche à plusieurs sujets sans lien, on fait plusieurs commits.

##### 3. Longueur

- Ligne de titre : **≤ 72 caractères** (idéal 50).
- Si on a plus à dire : saut de ligne, puis corps explicatif.

#### Exemple d'historique propre

```
feat: add admin login with password_verify
chore: ignore seed_*.php temporary scripts
docs: add vade-mecum technique with PDO section
refactor: extract PDO connection to reusable db.php
fix: handle empty form submission
```

#### Anti-patterns à éviter

- ❌ `update` → trop vague, ne dit rien.
- ❌ `fix bug` → quel bug ?
- ❌ `WIP` ("Work In Progress") → à éviter sur la branche principale.
- ❌ `commit` → pléonasme.
- ❌ Verbes au passé : `added`, `fixed`, `updated`.

### `.gitignore`

Fichier qui dit à Git **"ne suis JAMAIS ces fichiers — ils n'ont pas leur place dans l'historique"**.

#### Fichiers à ignorer

- Fichiers **système** générés par l'OS : `.DS_Store` (macOS), `Thumbs.db` (Windows).
- Fichiers **secrets** : `.env`, scripts contenant des credentials (ex : `seed_admin.php`).
- Fichiers **temporaires** ou de **cache** : `*.log`, `*.tmp`.
- **Dépendances générées** : `node_modules/`, `vendor/`.
- Fichiers **d'éditeurs** : `.vscode/`, `.idea/`, `.obsidian/`.

### 🎯 Exercices réalisés

- Initialisation Git avec `git init` pour créer un repo local.
- Création du fichier `.gitignore` avec les catégories ci-dessus.
- `git status` pour visualiser l'état du repo.
- `git add .` pour ajouter tous les fichiers du dossier (à utiliser avec précaution — préférer nommer les fichiers explicitement).
- Premier commit avec la syntaxe `git commit -m "préfixe: verbe-impératif description"`.
- `git push` pour envoyer vers GitHub.

### 🛠️ Réflexes acquis

- Utiliser `-m` pour le message de commit.
- Choisir le bon préfixe (`feat:`, `fix:`, `chore:`…).
- 1 modif logique = 1 commit (atomicité).
- Formuler le message à l'impératif présent.

### ⚠️ Pièges où je me suis pris

- Ne pas oublier les guillemets autour du message du commit.
- Se relire avant de valider (orthographe).
- Bien choisir le préfixe du commit.
- Décrire précisément ce que fait le commit.

### 🎓 Questions soutenance type

- _"Où se tapent les commandes Git ?"_ → Dans le Terminal.
- _"Comment initier un repo Git ?"_ → `git init`.
- _"Différence entre `feat:` et `chore:` ?"_ → `feat:` ajoute une fonctionnalité visible par l'utilisateur, `chore:` concerne la maintenance (config, dépendances, gitignore).
- _"Qu'est-ce que l'atomicité d'un commit ?"_ → 1 commit = 1 changement logique cohérent.

---

## Session 5 — 2026-06-04

### 🎯 Exercices réalisés

- Découverte de `empty()` : teste si une variable est vide.
- Découverte de l'opérateur `&&` (ET logique) pour combiner plusieurs conditions.
- Découverte de la structure `elseif` pour ajouter une condition alternative à un `if`.
- Second commit du projet.

### 🧠 Concepts ancrés

#### `empty()`

La fonction `empty($var)` retourne `true` quand la variable est vide (au sens "falsy" : `""`, `0`, `null`, `[]`, non définie). On utilise la **négation `!empty($var)`** pour tester l'inverse — "la variable existe ET contient quelque chose". C'est le réflexe à avoir pour valider qu'un champ de formulaire n'est pas resté vide.

#### `&&` (ET logique)

Permet de combiner plusieurs conditions dans un même `if`. **Toutes** les conditions doivent être vraies pour que le bloc s'exécute. On peut en chaîner autant qu'on veut.

#### `elseif` et `else`

- `elseif` introduit une condition alternative qui n'est testée que si le `if` précédent est faux.
- `else` est le filet de sécurité : il s'exécute si **aucune** des conditions au-dessus n'a été remplie.

### 🛠️ Réflexes acquis

- Empêcher la soumission d'un formulaire vide avec `!empty()`.
- Combiner les conditions avec `&&` autant que nécessaire.
- Structurer un enchaînement avec `if … elseif … else`.

### ⚠️ Pièges où je me suis pris

- **Oubli de parenthèse fermante** : il doit y avoir autant de parenthèses ouvrantes que fermantes.
- Je ne trouve pas toujours du premier coup le bon préfixe de commit.

### 🎓 Questions soutenance type

- _"À quoi sert `empty()` ?"_ → Tester si une variable est vide, et retourner un booléen.
- _"Combien de `&&` peut-on enchaîner ?"_ → Autant que nécessaire.
- _"Différence entre `if / elseif / else` ?"_ → `if` teste la première condition ; `elseif` teste une alternative quand le `if` est faux ; `else` s'exécute si **aucune** des conditions précédentes n'est remplie.

---

## Session 6 — 2026-06-08

### 🎯 Exercices réalisés

- Découverte des **tableaux PHP** (indexés et associatifs).
- Découverte de la boucle **`foreach`** (variante simple et variante `$cle => $valeur`).
- Fichier d'exercice `test_array.php` pour explorer les deux types de tableaux.
- **Application au mini-blog** : ajout d'un tableau **multidimensionnel** `$articles` dans `index.php` et affichage en boucle.
- 3 commits atomiques poussés sur GitHub.

### 🧠 Concepts ancrés

#### 1. Tableaux indexés

Un tableau indexé reçoit des **clés numériques automatiques** (0, 1, 2…). Les indices commencent à **0** par convention informatique. On accède à un élément avec son index entre crochets.

#### 2. Tableaux associatifs

Un tableau associatif a des **clés explicites** choisies par le développeur (souvent des chaînes de caractères). C'est l'équivalent d'une fiche à plusieurs propriétés nommées.
⚠️ Les clés d'un tableau PHP ne peuvent être QUE des chaînes (`string`) ou des entiers (`int`). Pas de float, pas d'array, pas d'objet en clé.

#### 3. Tableaux multidimensionnels

Un tableau peut **contenir d'autres tableaux**. Pour le mini-blog, `$articles` est un tableau **indexé** dont chaque élément est lui-même un tableau **associatif** contenant les clés `titre` et `contenu`. C'est la représentation naturelle d'une "liste d'objets" en PHP.

#### 4. La boucle `foreach`

`foreach` est dédiée aux tableaux. Elle parcourt automatiquement chaque élément sans qu'on ait à connaître le nombre d'éléments. La syntaxe se lit comme une phrase : "pour chaque tableau **as** élément, fais ceci".

- `$tableau` : le tableau à parcourir.
- `as` : mot-clé obligatoire ("en tant que").
- `$element` : nom de variable choisi librement, qui recevra l'élément courant à chaque tour.

➝ Plus besoin de connaître le nombre d'éléments, PHP s'en occupe.

#### 5. Variante `foreach` pour tableau associatif

En écrivant `foreach ($tab as $cle => $valeur)`, on récupère **à la fois la clé et la valeur** à chaque tour. La syntaxe `=>` est la même que celle utilisée à la déclaration du tableau associatif — c'est cohérent.

#### 6. Le piège stateless RÉVÉLÉ par les tableaux ⚠️ FONDAMENTAL

**Expérience faite en séance** : j'ai soumis un 4ème article via le formulaire. Résultat :

- ✅ Il s'affiche **sous le formulaire** (grâce au `if` qui traite le POST).
- ❌ Il n'apparaît **PAS** dans la section "Articles publiés" (le `foreach` sur `$articles`).

**Pourquoi ?** Parce que PHP est **stateless** (rappel session 2). À chaque rechargement, le script repart de zéro. Le tableau `$articles` est **réécrit en dur dans le code** à chaque exécution. Le 4ème article n'existe que **le temps de l'exécution**, puis disparaît.

➝ **Conséquence** : pour qu'un article soumis **persiste**, il faut le stocker **en dehors du script PHP** (fichier ou base de données). C'est l'objet de la session 7.

### 🛠️ Réflexes acquis

- Fermer correctement les balises (notamment `?>` avant un bloc HTML).
- Nommer la variable de boucle au **singulier** (`$articles as $article`) par convention de lisibilité.
- Distinguer le type de clé pour l'accès : clé entière → `$tab[0]`, clé chaîne → `$tab["prenom"]`.
- Englober un tableau de tableaux avec des `[ ]` parents (multidimensionnel).

### ⚠️ Pièges où je me suis pris

- Confondre tableau associatif et tableau indexé.
- Variable inexistante dans le `foreach` (copier-coller d'un nom qui n'existe pas).
- Utiliser le même nom pour le tableau ET la variable de boucle (`foreach ($fruits as $fruits)`).
- Mal englober un tableau de tableaux avec les `[ ]` parents.
- Oublier de fermer la balise `?>` avant un bloc HTML.
- **Prédiction erronée** sur le piège stateless (j'avais prédit "oui/oui/oui" → 0/3).

### 🎓 Questions soutenance type

- _"À quoi sert `foreach` ?"_ → À parcourir un tableau pour **manipuler** chaque élément (afficher, transformer, filtrer, calculer…). L'affichage n'est qu'un cas d'usage parmi d'autres.
- _"Différence entre tableau indexé et tableau associatif ?"_ → Indexé : clés numériques automatiques. Associatif : clés choisies par le développeur. Les clés ne peuvent être que `string` ou `int`.
- _"Qu'est-ce qu'un tableau multidimensionnel ?"_ → Un tableau qui contient d'autres tableaux. Utile pour représenter des entités à plusieurs propriétés (ex : liste d'articles, chaque article ayant titre + contenu).
- _"Pourquoi un article soumis ne s'ajoute-t-il pas à la liste affichée ?"_ → Parce que PHP est stateless. Le tableau est réécrit en dur à chaque exécution. Il faut un stockage hors du script.

---

## Session 7 — 2026-06-15

### 🎯 Exercices réalisés

#### 1. Ajouter un article au tableau, puis sauver dans un fichier JSON

Compléter la logique d'ajout d'article dans le bloc POST en suivant 5 étapes :

1. **Lire le fichier `articles.json` existant** avec `file_get_contents()` — renvoie le contenu sous forme de chaîne de caractères.
2. **Transformer cette chaîne JSON en tableau PHP** avec `json_decode($chaine, true)`. Le second argument `true` force le retour en **tableau associatif** plutôt qu'en objet.
3. **Ajouter le nouvel article au tableau** avec la syntaxe `$articles[] = [...]` — les crochets vides signifient "ajoute à la fin avec un nouvel index automatique".
4. **Reconvertir le tableau modifié en chaîne JSON** avec `json_encode($articles)`.
5. **Réécrire le fichier** avec `file_put_contents()` — qui **écrase** le contenu précédent.

#### 2. Lire le fichier JSON et alimenter `$articles`

Au début du script `index.php`, on lit `articles.json` et on désérialise le contenu. Pour éviter un plantage au premier chargement (quand le fichier n'existe pas encore), on ajoute le filet **`?? []`** : si le décodage retourne `null`, on utilise un tableau vide à la place.

### 🧠 Concepts ancrés

#### 1. Syntaxe `$tableau[] = …`

La syntaxe `$articles[] = nouvelleValeur` est un raccourci PHP qui **ajoute la valeur à la fin du tableau avec un index automatique**. Plus court et plus lisible que `array_push()`.

#### 2. Opérateur `??` (null coalescing)

Opérateur PHP qui se lit _"si l'opérande de gauche est `null` ou n'existe pas, utilise l'opérande de droite ; sinon, garde la valeur de gauche"_. C'est un **filet de sécurité** très utile pour éviter les plantages lorsqu'une variable peut être vide.

| Cas                 | Résultat                                                   |
| ------------------- | ---------------------------------------------------------- |
| `null ?? "secours"` | `"secours"`                                                |
| `35 ?? "secours"`   | `35` (valeur de gauche conservée)                          |
| `null ?? []`        | `[]` (tableau vide — permet à `foreach` de ne pas planter) |

#### 3. Stockage persistant via fichier JSON

On contourne le caractère stateless de PHP en écrivant les données dans un fichier `.json` à chaque modification, et en le rechargeant à chaque visite. Cette approche est suffisante pour ce projet d'apprentissage ; on passera à une vraie base de données en session 9 pour des raisons de performance, de concurrence et de requêtes complexes.

### 🛠️ Réflexes acquis

- `$articles[]` pour ajouter à la fin d'un tableau.
- Empêcher le plantage du code quand une variable vaut `null` avec l'opérateur `??`.
- **Le pattern PRG (Post → Redirect → Get)** : après un POST avec sauvegarde réussie, on appelle `header("Location: index.php")` suivi de `exit;`. Le navigateur recharge alors en GET, ce qui supprime le risque qu'un Cmd+R re-soumette le formulaire. C'est LA bonne pratique pour éviter les doublons de soumission.

### ⚠️ Pièges où je me suis pris

- `htmlspecialchars()` transforme les caractères en **entités HTML** pour que le navigateur les affiche **comme du texte** et non comme des balises (protection XSS). À utiliser au moment d'afficher les données qui viennent de l'utilisateur.
- `==` est une comparaison souple, `===` est une comparaison stricte (valeur ET type). Avec `==`, PHP convertit automatiquement les types avant de comparer, ce qui peut donner des résultats surprenants (`"5" == 5` vaut `true`, mais `"5" === 5` vaut `false`). `==` ignore le type ; `===` exige valeur ET type identiques.
- Quand une fonction "qui devait retourner quelque chose" échoue, elle retourne en général **`false`**.
- `json_decode()` retourne **`null`** quand on lui passe quelque chose qui n'est pas du JSON valide.
- `foreach` exige un tableau ou un objet.
- Au premier chargement, `articles.json` n'existe pas → `file_get_contents()` retourne `false` → `json_decode()` retourne `null` → `foreach(null)` plante. D'où la nécessité du filet `?? []`.

### 🎓 Questions soutenance type

- _"Avec quel opérateur peut-on empêcher le plantage du code ?"_ → `??` (null coalescing).
- _"Comment fonctionne `??` ?"_ → C'est un opérateur logique : il renvoie son opérande de droite si l'opérande de gauche vaut `null` ou n'existe pas, et renvoie l'opérande de gauche sinon.
- _"Pourquoi avez-vous choisi un fichier JSON plutôt qu'une base de données ?"_ → Pour cette étape d'apprentissage, le JSON est suffisant : peu de données, lecture/écriture simple, pas besoin d'installer un SGBD. La base de données viendra en session 9 quand on aura besoin de requêtes complexes, de gestion d'utilisateurs multiples et de garanties d'intégrité.
- _"Que se passe-t-il si `articles.json` est corrompu ?"_ → `json_decode()` retourne `null`, et grâce à `?? []`, `$articles` devient un tableau vide → `foreach` ne plante pas, simplement aucun article n'est affiché.

---

## Session 8 — 2026-06-16

### 🎯 Exercices réalisés

Mise en place du **pattern flash message** ("message one-shot") pour confirmer une soumission après redirection. Quatre interventions à faire dans `index.php` :

1. **Démarrer la session tout en haut du fichier**, avant tout output HTML, avec `session_start()`. Sans cela, on ne peut ni lire ni écrire dans `$_SESSION`.
2. **Avant le redirect, stocker le message à transmettre dans `$_SESSION['flash']`** : la session sera persistante côté serveur, le message survivra au redirect contrairement à `$_POST`.
3. **À l'endroit où on veut afficher le message**, tester sa présence avec `isset($_SESSION['flash'])` et l'afficher passé par `htmlspecialchars()`.
4. **Juste après l'affichage, supprimer la clé `flash` avec `unset($_SESSION['flash'])`** pour produire l'effet "one-shot" : le message est affiché une seule fois, puis effacé.

### 🧠 Concepts ancrés

#### Pattern PRG (Post → Redirect → Get) — rappel

Après un POST avec sauvegarde réussie :

1. `header("Location: index.php")` indique au navigateur "va recharger en GET".
2. `exit;` arrête immédiatement le script PHP.
3. Le navigateur recharge en GET → plus de POST en mémoire navigateur.
4. Un Cmd+R ultérieur recharge ce GET → **aucun risque de re-soumettre** le formulaire.

#### `$_SESSION` — la superglobale persistante

`$_SESSION` est une **superglobale persistante** utilisée pour conserver des données **entre les requêtes**. Pour l'activer, on appelle **`session_start()`** TOUT EN HAUT du fichier PHP, **AVANT** tout envoi de HTML (sinon erreur _"headers already sent"_).

**Mécanique côté serveur** : PHP attribue un identifiant unique (`PHPSESSID`) au navigateur sous forme de **cookie**. Le navigateur le renvoie à chaque requête. PHP retrouve alors le fichier de session associé à cet ID, **stocké côté serveur** (typiquement dans `/tmp/sess_xxx`). Le cookie ne transporte qu'un identifiant — pas les données elles-mêmes.

#### `unset()` pour détruire une variable de session

`unset($_SESSION['flash'])` supprime spécifiquement la clé `flash` du tableau de session. C'est ce qui produit l'effet "one-shot" : le message est lu, affiché, puis effacé pour ne pas réapparaître au prochain chargement.

#### `isset()` vs `!empty()`

- `isset($var)` : retourne `true` si la variable **existe** (même si elle vaut `""` ou `0`).
- `!empty($var)` : retourne `true` si la variable existe **ET** n'est pas vide.

### 🛠️ Réflexes acquis

- `$_SESSION` pour stocker des données côté serveur, toujours appelé via `session_start()`.
- Le cookie `PHPSESSID` est l'identifiant unique qui lie navigateur et serveur.
- `unset($_SESSION['cle'])` pour supprimer une seule clé.
- Distinguer `isset()` (existe-t-elle ?) et `!empty()` (existe ET contient quelque chose ?).

### ⚠️ Pièges où je me suis pris

- `header("Location: index.php")` dit au navigateur "recharge en GET".
- `exit;` arrête tout de suite le script PHP.
- `htmlspecialchars()` transforme les caractères en entités HTML pour que le navigateur les affiche comme du texte et non comme des balises : **JE NE DIS PLUS JAMAIS "mojibake" pour `htmlspecialchars()` !!!!** RAPPEL : mojibake = bug d'encodage ; entités HTML = représentation volontaire pour bloquer le XSS.
- Confondre `$_POST` et `$_SESSION` : `$_POST` disparaît avec `exit;`, mais `$_SESSION` est stockée côté serveur, et est donc rechargée avec Cmd+R en GET.
- Le cookie `PHPSESSID` ne transporte pas de donnée, juste un identifiant unique. La donnée est côté serveur !

### 🎓 Questions soutenance type

1. _"Qu'est-ce que `$_SESSION` et à quoi sert-il ?"_ → Une superglobale qui permet de stocker des données côté serveur, persistantes entre les requêtes.
2. _"Pourquoi appelle-t-on `session_start()` en haut du fichier ?"_ → Pour démarrer le mécanisme ET avant tout output HTML (sinon erreur _"headers already sent"_).
3. _"Quelle différence entre `$_POST` et `$_SESSION` ?"_ → `$_POST` est limité à une seule requête. `$_SESSION` persiste entre plusieurs requêtes.
4. _"Comment fonctionne le pattern flash (message one-shot) ?"_ → Set en session → redirect → display côté GET → `unset`.
5. _"À quoi sert le cookie `PHPSESSID`, et où sont stockées les données ?"_ → C'est un identifiant unique qui lie le navigateur au serveur. Les données sont stockées côté serveur.

---

## Session 9 — 2026-06-18

### 🎯 Exercices réalisés

#### 1. Création de la base de données `mini_blog`

Création de la première table SQL `articles` avec cinq colonnes : `id` (clé primaire auto-incrémentée), `titre` (varchar 255), `contenu` (text — pour stocker un volume long sans limite stricte), `auteur` (varchar 100) et `date_creation` (datetime avec valeur par défaut `CURRENT_TIMESTAMP`, qui sera renseignée automatiquement à l'insertion).

#### 2. Test de la BDD

Insertion de deux articles de démo via une requête `INSERT INTO ... VALUES`. Permet de vérifier que la table accepte bien les données et que les colonnes auto (id, date_creation) se remplissent toutes seules.

#### 3. Création de `db.php` — connexion PDO réutilisable

Centralisation de la connexion à MySQL dans un fichier dédié, qui sera importé par `require_once 'db.php'` partout où l'on a besoin d'accéder à la base. Le fichier contient :

- Un **DSN** (Data Source Name) qui décrit la connexion à MySQL : driver, host, nom de la base, charset.
- Les identifiants utilisateur MySQL (`root` / chaîne vide en local XAMPP).
- Un tableau d'**options PDO** : passage des erreurs en **mode exception** (`ERRMODE_EXCEPTION`) et choix du **mode de récupération en tableau associatif** (`FETCH_ASSOC`).
- Un bloc `try / catch` qui capture les erreurs de connexion et affiche un message en cas d'échec.

#### 4. Création d'un script de test BDD

Petit fichier qui inclut `db.php`, lance une requête `SELECT * FROM articles`, récupère le résultat avec `fetchAll()`, compte le nombre de lignes et affiche chaque article dans une boucle `foreach`.

### 🧠 Concepts ancrés

#### Qu'est-ce que PDO et pourquoi le choisir ?

**PDO = PHP Data Objects**. C'est une **classe native de PHP** qui permet de faire dialoguer le code PHP avec une base de données SQL.

**Pourquoi PDO plutôt que `mysqli` ou les anciennes API ?** Deux raisons décisives :

1. **Sécurité** — PDO supporte nativement les **requêtes paramétrées** (prepared statements), qui sont la défense standard contre l'**injection SQL**.
2. **Portabilité** — PDO est **multi-supports** : le même code fonctionne avec MySQL, PostgreSQL, SQLite, Oracle, etc. Si on change de SGBD, on change seulement la ligne du DSN au lieu de tout réécrire.

#### Le DSN (Data Source Name)

Chaîne de configuration qui décrit la connexion. Structure typique : `mysql:host=localhost;dbname=mini_blog;charset=utf8mb4`.

- `mysql:` → driver PDO à utiliser.
- `host=` → adresse du serveur (localhost en local).
- `dbname=` → nom de la base.
- `charset=utf8mb4` → encodage des caractères, version complète d'UTF-8 (gère même les émojis 🦾).

#### Options PDO importantes

- **`ATTR_ERRMODE => ERRMODE_EXCEPTION`** : en cas d'erreur SQL, PDO lance une exception PHP qu'on peut capturer avec `try/catch`. Sans cela, les erreurs sont silencieuses — cauchemar à déboguer.
- **`ATTR_DEFAULT_FETCH_MODE => FETCH_ASSOC`** : on récupère chaque ligne sous forme de **tableau associatif** dont les clés sont les noms de colonnes. C'est le format le plus simple à manipuler.

#### `query()`, `fetch()`, `fetchAll()`

- `query("SELECT …")` retourne un objet **`PDOStatement`** — un curseur sur le résultat.
- `fetch()` récupère **une ligne** et avance le curseur d'un cran.
- `fetchAll()` récupère **toutes les lignes** d'un coup, sous forme de tableau de tableaux.

#### Colonnes auto en SQL

- **`AUTO_INCREMENT`** : MySQL génère automatiquement un identifiant unique et croissant pour chaque nouvelle ligne. Indispensable pour une clé primaire.
- **`DEFAULT CURRENT_TIMESTAMP`** : la colonne `date_creation` est remplie automatiquement avec la date et l'heure d'insertion si on ne précise rien.

### 🛠️ Réflexes acquis

- Toujours entourer la connexion PDO d'un `try / catch`.
- Toujours configurer les options `ERRMODE_EXCEPTION` et `FETCH_ASSOC`.
- En BDD locale XAMPP : `user = root` et `pass = ''`.

### ⚠️ Pièges où je me suis pris

- Ne pas confondre les identifiants MySQL et ceux de GitHub.
- Revoir les types SQL (TEXTAREA n'en est pas un — c'est `TEXT`).
- Bien identifier les colonnes nécessaires avant de créer la table.
- En SQL, on utilise des parenthèses, pas des accolades, pour délimiter la liste des colonnes ou des valeurs.
- Ne pas oublier la clé primaire (`id INT AUTO_INCREMENT PRIMARY KEY`).

### 🎓 Questions soutenance type

- _"Pourquoi PDO plutôt que mysqli ?"_ → PDO supporte les requêtes préparées (rempart contre l'injection SQL) et il est multi-supports (une ligne de DSN à changer si on change de SGBD).
- _"Décompose un DSN MySQL"_ → `mysql:` (driver) / `host=` (adresse du serveur) / `dbname=` (nom de la base) / `charset=utf8mb4` (encodage, gère même les émojis).
- _"À quoi sert `AUTO_INCREMENT` ?"_ → MySQL génère automatiquement un identifiant unique et croissant pour chaque nouvelle ligne. Très pratique pour une clé primaire.
- _"Différence `fetch()` / `fetchAll()` ?"_ → `fetch()` récupère une ligne et avance le curseur ; `fetchAll()` récupère toutes les lignes d'un coup, sous forme de tableau de tableaux.
- _"Pourquoi en local c'est `root` sans mot de passe ?"_ → Ce sont les valeurs par défaut de XAMPP. Acceptable en dev (machine isolée, pas d'enjeu sécurité). **INTERDIT en prod** : on créerait un utilisateur dédié avec un mot de passe fort, stockés dans un `.env` hors du repo Git.

---

## Session 10 — 2026-06-19

> Grosse journée — 4 axes : lecture PDO + INSERT prepared + CSS responsive + module légal réutilisable.

### 🎯 Exercices réalisés

#### 1️⃣ Lecture PDO — Remplacer le JSON par MySQL

Dans `index.php`, suppression des deux lignes qui lisaient le fichier JSON et désérialisaient son contenu. Remplacement par trois lignes :

- `require_once 'db.php'` pour réutiliser la connexion PDO existante.
- Une requête `SELECT * FROM articles ORDER BY date_creation DESC` avec `$db->query(...)` pour récupérer les articles du plus récent au plus ancien.
- Un `fetchAll()` pour transformer le résultat en tableau exploitable par le `foreach` d'affichage déjà en place.

#### 2️⃣ INSERT BDD avec requête préparée

Dans le bloc POST validé, remplacement des cinq étapes JSON par deux étapes PDO :

- **`prepare()`** : on envoie d'abord à MySQL la structure SQL avec des **placeholders nommés** (`:titre`, `:contenu`, `:auteur`).
- **`execute([])`** : on envoie ensuite, séparément, les valeurs sous forme de tableau associatif. MySQL substitue les placeholders en traitant les valeurs comme du **texte pur**, jamais comme du SQL exécutable.

**Démo XSS en live** : saisir `<script>alert('hack')</script>` dans le titre → le contenu est stocké tel quel en BDD → il s'affiche comme du texte (entités HTML) grâce à `htmlspecialchars()` au moment du `echo`. Aucun script ne s'exécute.

#### 3️⃣ CSS responsive total

- **`box-sizing: border-box`** appliqué à tous les éléments via `*` (reset universel) → la `width` et `height` incluent désormais le padding et la border, fin des débordements horizontaux.
- **`clamp(min, idéal, max)`** pour les `font-size` adaptatives — le navigateur interpole automatiquement entre les bornes selon la largeur de l'écran.
- **`max-width`** pour limiter la largeur des éléments sur grands écrans (form ≤ 800px, articles ≤ 600px).
- **`background-color` de secours** + `background-size: cover` sur le body, pour garantir un rendu correct même si l'image de fond ne se charge pas.

#### 4️⃣ Module légal réutilisable

Création d'un dossier `legal/` autonome contenant :

- `mentions-legales.php` — modèle complet à dupliquer pour les trois autres pages (cookies, confidentialité, CGU).
- `legal.css` — styles spécifiques cohérents avec le thème principal.
- `README.md` — instructions de réutilisation pour un futur projet.

Ce module est conçu pour être déplaçable d'un site à l'autre.

### 🧠 Concepts ancrés

- **`$db->query(...)`** retourne un objet **`PDOStatement`** — un **curseur** sur le résultat. Pour récupérer les données, on appelle ensuite `fetch()` (1 ligne) ou `fetchAll()` (toutes les lignes).
- **`DROP TABLE articles`** **DÉTRUIT ENTIÈREMENT** la table (structure + données). À ne pas confondre avec `DELETE FROM articles` (vide les lignes, garde la table).
- **Requêtes préparées** = LA protection contre l'**injection SQL**. La structure SQL et les données utilisateur sont envoyées **séparément** : MySQL ne peut jamais interpréter les valeurs comme du code SQL.
- **Règle d'or sécurité** : on stocke **brut** en BDD, on échappe avec **`htmlspecialchars()`** **à l'AFFICHAGE** uniquement.
- **`box-sizing: border-box`** : le `width` et `height` **incluent** le padding et la border. Présent dans 99% des reset CSS modernes.
- **`clamp(min, idéal, max)`** : trois valeurs pour des tailles fluides. Le navigateur interpole entre `min` et `max` selon l'espace disponible.

### 🛠️ Réflexes acquis

- Toujours charger `$db` avec `require_once 'db.php'`.
- En SQL avec données utilisateur : jamais de concaténation ; toujours `prepare()` + `execute()`.
- Utiliser `ORDER BY` pour trier les listes affichées.
- Stocker les données brutes ; échapper uniquement à l'affichage.
- Toujours appliquer `box-sizing: border-box` sur `*`.
- Utiliser `clamp()` plutôt que des tailles fixes pour rester responsive.

### ⚠️ Pièges où je me suis pris

- Confondu `.env` (stockage de secrets) et **requêtes préparées** (protection contre l'injection SQL) au recall.
- Placé les 3 lignes PDO **dans le `if validation OK`** au lieu d'**en haut du fichier** → la lecture GET ne marchait plus.
- Utilisé `font-size: large` (valeur fixe) au lieu de `clamp(min, idéal, max)` → pas responsive.
- Oublié `box-sizing: border-box` → débordement horizontal.
- Copié le footer de `mentions-legales.php` dans `index.php` **sans importer `legal.css`** → footer non stylé.
- Oublié de dupliquer le modèle pour `cookies.php`, `confidentialite.php`, `cgu.php` → 404 sur les liens.

### 🎓 Questions soutenance type

#### _"Qu'est-ce qu'une injection SQL ?"_

Attaque où l'utilisateur insère du SQL malveillant dans un champ de formulaire. Si le serveur concatène ce champ directement dans une requête, l'attaquant peut détourner la requête pour lire, modifier ou détruire des données — par exemple en injectant `'); DROP TABLE articles; --` qui ferme la valeur, exécute un `DROP TABLE`, et commente la fin pour ne pas casser la syntaxe.

#### _"Comment vous protégez-vous contre l'injection SQL ?"_

Avec des **requêtes préparées**. On envoie d'abord à MySQL la **structure SQL avec des placeholders nommés** (ex : `:titre`). Puis on envoie **séparément** les valeurs via `execute([])`. MySQL traite ces valeurs comme du **texte pur** — il ne peut jamais les interpréter comme du SQL exécutable.

#### _"Différence entre `query()` et `prepare()` ?"_

- `query()` exécute directement une requête statique, sans paramètres extérieurs. À utiliser uniquement quand aucune donnée utilisateur n'est concernée.
- `prepare()` + `execute()` : pour toute requête contenant des données utilisateur. C'est la voie obligatoire dès qu'on a un `$_POST` ou un `$_GET` dans la boucle.

#### _"Pourquoi on échappe à l'affichage et pas au stockage ?"_

On veut conserver la **vraie donnée** en BDD (pour pouvoir l'éditer, la copier-coller, la rechercher). À l'affichage, on échappe au moment précis où la donnée devient du HTML, pour que le navigateur la traite **comme du texte** et non comme des balises. Si l'utilisateur saisit `<script>alert('hack')</script>` :

- En BDD, le titre contient littéralement cette chaîne (stockage brut).
- À l'affichage, `htmlspecialchars()` la transforme en `&lt;script&gt;alert('hack')&lt;/script&gt;` que le navigateur **affiche comme texte sans exécuter**.

#### _"Que représente `$stmt` dans votre code ?"_

C'est une variable PHP. `$stmt` est l'**abréviation conventionnelle pour "statement"**. Elle stocke un objet de type **`PDOStatement`** — le curseur retourné par `prepare()` ou `query()`, sur lequel on appelle `execute()`, `fetch()` ou `fetchAll()`.

---

## Session 11 — 2026-06-23/26

### 🎯 Exercices réalisés

#### Session 11a — Création de l'admin (table + seed)

**Création de la table `admins`** avec quatre colonnes :

- `id` (clé primaire auto-incrémentée).
- `username` (`VARCHAR(50)`, contrainte `UNIQUE` pour empêcher les doublons, contrainte `NOT NULL` pour exiger une valeur).
- `password_hash` (`VARCHAR(255)`, `NOT NULL`) — capacité confortable pour stocker n'importe quel hash bcrypt (60 caractères) ou argon2 (95 caractères).
- `date_creation` (`DATETIME DEFAULT CURRENT_TIMESTAMP`) — renseignée automatiquement à l'insertion.

**Création du script `seed_admin.php`** : script à usage unique, exécuté une fois pour créer le premier compte administrateur, puis supprimé. Logique en quatre étapes :

1. Importer la connexion PDO via `require_once 'db.php'`.
2. Définir le username et le mot de passe en clair (variables locales, jamais commitées).
3. **Hasher le mot de passe** avec `password_hash($mot_de_passe, PASSWORD_DEFAULT)` — `PASSWORD_DEFAULT` laisse PHP choisir le meilleur algorithme du moment (bcrypt aujourd'hui, peut-être argon2 demain).
4. Insérer le couple `username` + `hash` en BDD avec une **requête préparée** (jamais en concaténation).

⚠️ **Sécurité critique** : le fichier `seed_admin.php` contient un mot de passe en clair. Il a été ajouté au `.gitignore` AVANT exécution, puis **supprimé du disque** après usage.

#### Session 11b — `login.php`

**Création du script `login.php`** : script de page de connexion pour administrateur sécurisée :

1. démarrage de session avec `session_start()` pour écrire dans $\_SESSION après une connexion réussie.
2. chargement de la connexion PDO avec `require_once`.
3. Initialisation d'une variable $erreur = null (pour gérer l'affichage du message d'erreur côté HTML).
4. Détection du **POST** avec `$_SERVER['REQUEST_METHOD'] === 'POST'`.
5. si le nom d'utilisateur et le mot de passe sont non vides (`!empty()`+ `&&`), on continue.
6. Requête préparée : `SELECT * FROM admins WHERE username = :username` → puis `execute([':username' => $_POST['username']])`.
7. `fetch()`(une seule ligne attendue, l'admin) –– différent de `fetchAll()`, utilisé pour les listes d'articles.
8. password_verify($\_POST['password'], $admin['password_hash']) — compare le MdP saisi avec le hash stocké. La fonction extrait automatiquement le salt du hash bcrypt.
9. Si succès : on stocke `$_SESSION['admin_id']` et `$_SESSION['admin_username']` → `header("Location: admin.php") + exit;`
10. Si échec (admin inexistant OU password faux) : message GÉNÉRIQUE "Identifiants incorrects." → anti-énumération OWASP (un attaquant ne sait pas quel champ est faux) : afin de "dérouter" les attaquants en ne divulguant pas quel champ est faux.

#### Session 11c — `admin.php` (protection route) + `logout.php` (destruction session)

**Création des scripts `admin.php` et `logout.php`**

`admin.php` –– protection de route
Logique en 3 étapes :

1. `session_start()`–– pour lire `$_SESSION`
2. Test de protection : `if (!isset($_SESSION['admin_id']))` → si la session n'existe pas, `header("Location: login.php")` + `exit;`. Le `exit`; est crucial : sans lui, le reste de la page s'exécuterait quand même.
3. Si connecté : la page s'affiche normalement avec un message "Connecté en tant que `<?= htmlspecialchars($_SESSION['admin_username']) ?>`".

**Concept-clé jury : "Comment protégez-vous une page ?" → test de présence de la variable de session AU SOMMET du fichier + redirection si absente. C'est le gatekeeper pattern.**

`logout.php` –– Destruction de session
Logique en 4 étapes (**ordre IMPORTANT**)

1. `session_start()` –– réveille la session existante pour la manipuler.
2. `session_unset()`–– vide `$_SESSION` en mémoire (`admin_id`, `admin_username`...)
3. `session_destroy()` –– supprime le **fichier de session** côté serveur.
4. `header("Location: login.php")` + `exit;` –– redirige vers la page de connexion.

**Concept-clé jury : "Pourquoi unset() ET destroy() ?"** → ceinture + bretelles. unset vide la mémoire, destroy supprime le fichier. Sans les deux, soit pollution disque, soit variables fantômes en mémoire.
Bonus jury (à mentionner si on creuse) : en production, on ajouterait aussi `setcookie('PHPSESSID', '', time()-3600)` pour invalider le cookie côté navigateur.

### 🧠 Concepts ancrés

#### Requête préparée comme défense systématique

`prepare()` + `execute()` séparent la structure SQL des données utilisateur. MySQL traite les valeurs envoyées par `execute()` comme du **texte pur** — il ne peut jamais les exécuter comme du SQL. C'est la barrière standard contre l'**injection SQL**.

#### Hashage de mot de passe avec `password_hash()`

Un **hash** est le résultat d'une transformation mathématique **irréversible**. Même le serveur ne peut pas retrouver le mot de passe original à partir du hash — il n'y a pas de clé secrète à voler, le secret n'existe simplement pas. Pour vérifier une connexion, on **rehash** le mot de passe tapé par l'utilisateur et on **compare les deux hashes** avec `password_verify()`.

#### Pourquoi `VARCHAR(255)` pour stocker un hash

`VARCHAR(255)` est la **convention raisonnable** pour stocker un hash : largement assez pour bcrypt (60 caractères) ou argon2 (95 caractères), et cohérent avec les pratiques courantes des frameworks.

#### Salt et `password_verify()`

`password_hash()` génère **un salt aléatoire à chaque appel** et l'intègre directement dans la chaîne retournée. Quand on appelle `password_verify($motDePasse, $hashStocké)`, la fonction **extrait automatiquement le salt** du hash stocké pour rejouer le calcul avec exactement les mêmes paramètres. C'est ce qui rend chaque hash unique, même pour un mot de passe identique.

#### Cycle de vie des scripts d'initialisation

Les scripts contenant des credentials sont **ajoutés au `.gitignore`** avant exécution, puis **supprimés** après usage. En prod sérieuse, ils sont placés hors du DocumentRoot ou transformés en commandes CLI (jamais accessibles via l'URL publique).

#### Anatomie EXACTE d'un hash bcrypt

Exemple : `$2y$10$gKHrD9O2UGZ3JajJ1C20auNLbzCR.UhiZ5GrbNTyz.yOesZ4TadT2`

| #   | Segment  | Contenu type  | Rôle                         |
| --- | -------- | ------------- | ---------------------------- |
| 1   | `$2y$`   | `$2y$`        | Algo bcrypt                  |
| 2   | `$XX$`   | `$10$`        | Cost factor (puissance de 2) |
| 3   | 22 chars | `gKHrD9…20au` | Salt aléatoire               |
| 4   | 31 chars | `NLbzCR…adT2` | Hash final                   |

→ Total : **60 caractères** pour un hash bcrypt. D'où le `VARCHAR(255)` confortable en BDD.

#### Les 3 piliers du hashage de mot de passe

1. **Sens unique** (irréversibilité mathématique) — on ne peut pas remonter au mot de passe original.
2. **Salt aléatoire** (anti rainbow tables) — chaque hash est unique même pour deux mots de passe identiques.
3. **Lenteur volontaire** (anti brute force) — le `cost factor` rend chaque calcul coûteux pour décourager les attaques par force brute.

### 🛠️ Réflexes acquis

- **Toujours hasher** les mots de passe avec `password_hash()`.
- **Toujours hasher AVANT** d'insérer en BDD — jamais en clair, jamais d'aller-retour.
- Utiliser `password_hash()` avec `PASSWORD_DEFAULT` (jamais MD5, jamais SHA1, jamais en clair).
- Ajouter au `.gitignore` **tout fichier contenant un secret**.

### ⚠️ Pièges où je me suis pris

- **`$start_session` ne démarre pas la session !** C'est `session_start()` — une **fonction PHP** (pas de `$`), à placer AVANT le HTML. Les données sont stockées dans un fichier temporaire côté serveur, identifié par le cookie `PHPSESSID` envoyé au navigateur.
- **Le cost factor est une puissance de 2.** Chaque +1 DOUBLE le nombre d'itérations :
  - cost 10 → ~50 ms (valeur PHP par défaut)
  - cost 12 → ~200 ms
    Pour un hash de mot de passe, la lenteur n'est pas un bug, c'est une **feature** (anti brute force).
- **`root` / chaîne vide** sont les identifiants MySQL en local (dans `db.php`), à ne pas confondre avec l'identité du compte admin du blog (qui est dans la table `admins`).
- Confusion entre `$variable` et `fonction()` : régression observée sur `session_unset()` et `session_destroy()` au début, corrigée immédiatement. Le `$` signifie "VARIABLE" — il n'apparaît jamais devant un appel de fonction simple.

### 🎓 Questions soutenance type — Session 11 (a + b + c)

- Pourquoi stocker un hash et pas le mot de passe lui-même ? : mot de passe jamais stocké en dur. Pour contrer le vol de BDD. Il y a aussi l'irréversibilité mathématique : `password_verify()` s'assure qu'un hash corresponde à un utilisateur. Même l'admin n'a pas accès aux MdP
- Pourquoi un message d'erreur générique sur le login ? (anti-énumération OWASP) : pour ne pas indiquer quel champ est faux, sécurité renforcée.
- Comment protégez-vous l'accès à `admin.php` ? : avec `if (!isset($_SESSION['admin_id']))` en **HAUT** du fichier + `header("Location: loginj.php")` + `exit;`(sinon le reste de la page s'exécute quand même).
- Pourquoi `session_unset()` ET `session_destroy()` dans le logout ? : pour vider les variables en mémoire et supprimer le **FICHIER** de session côté serveur.
- Que contient le cookie `PHPSESSID` côté navigateur ? : un identifiant alphanumérique aléatoire, qui pointe vers un fichier de session côté serveur, pour pouvoir naviguer entre les pages sans perdre la session.

---
