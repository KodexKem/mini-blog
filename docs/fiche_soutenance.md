# 🎓 Fiche de préparation soutenance — DWWM

**Candidat :** KodexKem (Kem)
**Projet :** Mini-blog "You are Not Alone" (PHP procédural + MySQL)
**Dates de soutenance :** 8-9-10 juillet 2026
**Centre :** ALAJI

---

## 📌 RAPPEL — Structure de l'épreuve (1h30 au total)

| Phase | Durée | Détail |
|---|---|---|
| **Présentation orale** | 35 min max | C'est TOI qui parles, le jury écoute |
| **Entretien technique** | 40 min max | Le jury creuse ton projet |
| **Entretien final** | 15 min | Questions sur AT1 (front) et AT2 (back) |

→ **Jury** : minimum 2 pros, dont 1 expert technique.

---

## 🛡️ PHRASES-BOUCLIER À MÉMORISER

Ces phrases répondent à des questions QUASI-CERTAINES. Apprends-les par cœur.

### ⭐ Sur PDO (Q12-Q15 du jury)
> *« J'ai choisi PDO car il supporte nativement les requêtes préparées — c'est la protection standard contre l'injection SQL. Et il est multi-supports : si on change de SGBD, on change juste 1 ligne au lieu de tout réécrire. »*

### ⭐ Sur le choix PHP procédural (pas de framework)
> *« J'ai choisi de rester en PHP pur pour démontrer la maîtrise des fondamentaux et garantir une maintenance simple par l'association après mon départ. Un framework aurait ajouté de la complexité non justifiée pour le périmètre actuel du projet. »*

### ⭐ Sur l'absence d'API REST (CP7)
> *« Le périmètre limité du projet — un blog mono-utilisateur en lecture/écriture — ne nécessitait pas d'architecture REST. Pour un projet plus volumineux avec un front séparé, j'aurais structuré en MVC avec une API. »*

### ⭐ Sur l'usage d'IA dans le projet
> *« J'ai utilisé des assistants IA comme outils d'apprentissage et de productivité, comme tout développeur en 2026. Pour chaque morceau de code généré, je me suis attaché à comprendre chaque ligne pour pouvoir le maintenir et le faire évoluer. »*

### ⭐ Sur la stratégie hybride mini-blog + Chaînes et Plumes
> *« Pendant mon stage à Chaînes et Plumes, j'ai constaté que je devais consolider mes fondamentaux PHP/SQL avant d'attaquer les fonctionnalités avancées. J'ai donc mené un projet d'apprentissage parallèle — ce mini-blog — pour démontrer ma maîtrise des concepts du référentiel DWWM. »*

---

## 📋 SECTION 1 — Questions sur votre parcours

### Q1 — Parlez-moi de vous et de votre parcours

**Format attendu** : 2 min max — reconversion + motivation + projets marquants

**Ta réponse à préparer :**
- D'où tu viens (parcours avant)
- Pourquoi le dev web (motivation sincère)
- Formation DWWM chez ALAJI
- Stage à Chaînes et Plumes
- Projet d'apprentissage parallèle (mini-blog)

**À éviter** : monologue de 5 min, plaintes sur la difficulté à trouver un stage.

---

### Q2 — Pourquoi avez-vous choisi le développement web ?

**Format attendu** : authenticité, motivation sincère

**Ta réponse type :**
> *« [Ta vraie raison personnelle]. Ce qui m'anime : créer des choses visibles, résoudre des problèmes concrets, et apprendre en continu — le web évolue tout le temps. »*

---

### Q3 — Où vous voyez-vous dans 2 ans ?

**Format attendu** : ambition réaliste, réflexion sur sa carrière

**Ta réponse type :**
> *« Je voudrais d'abord consolider mes acquis comme dev junior PHP/back-end, puis monter en compétence sur [framework type Laravel ou Symfony] dans 1-2 ans. Le full-stack m'intéresse, mais je préfère solidifier le back avant d'élargir. »*

---

## 📋 SECTION 2 — Questions sur votre projet

### Q4 — Présentez votre projet en 3 phrases

**Ta réponse type :**
> *« J'ai développé un mini-blog appelé "You are Not Alone", en PHP procédural avec une base MySQL et le pilote PDO. Il permet de publier des articles via un formulaire validé côté serveur, avec persistance, gestion de session, et protection contre les failles XSS. Le projet me sert de support pour démontrer la maîtrise des compétences fondamentales du référentiel DWWM. »*

---

### Q5 — Quelle a été la plus grande difficulté ?

**À éviter** : "trouver le temps" ou "rien de difficile" → le jury déteste.

**Ta réponse type — exemple concret :**
> *« Le bug du double-POST. Quand l'utilisateur recharge la page après avoir soumis le formulaire, son article était dupliqué à chaque rechargement. J'ai d'abord cru à un bug de mon code, mais c'est un comportement HTTP standard : Cmd+R réémet la requête POST. J'ai résolu ça avec le pattern PRG (Post / Redirect / Get) — header() + exit après chaque sauvegarde. C'est exactement le pattern utilisé dans tous les frameworks modernes. »*

---

### Q6 — Si vous refaisiez ce projet, que changeriez-vous ?

**À éviter** : "rien"

**Ta réponse type :**
> *« Plusieurs choses. Premièrement, j'aurais structuré le code en MVC dès le début pour anticiper la croissance. Deuxièmement, j'aurais utilisé un fichier .env pour les credentials BDD au lieu de les avoir en dur. Troisièmement, j'ajouterais des tests automatisés — j'ai testé manuellement, mais des tests unitaires sécuriseraient les futures modifications. »*

---

### Q7 — Votre code est-il testé ?

**Réponse honnête :**
> *« Pour l'instant, mes tests sont manuels : pour chaque fonctionnalité, j'ai défini 3 scénarios — cas nominal, cas d'erreur, cas limite — et je les ai vérifiés en navigateur. Pour aller plus loin, j'aurais utilisé PHPUnit pour les tests unitaires. Je connais l'existence de Cypress pour les tests end-to-end côté front. »*

---

## 📋 SECTION 3 — Questions techniques Front-end

### Q8 — Qu'est-ce que le responsive design ? Comment l'avez-vous appliqué ?

**Réponse type :**
> *« Le responsive design, c'est l'adaptation automatique de l'interface à toutes les tailles d'écran. Techniques : **media queries** CSS pour adapter les styles selon la largeur d'écran, **unités relatives** (rem, %, vw), et **flexbox/grid** pour les layouts fluides. Dans mon projet, j'ai utilisé [grid pour le layout général et media queries pour adapter la navigation sur mobile]. »*

### Q9 — Différence entre `==` et `===` en JavaScript (et PHP)

**Réponse type :**
> *« `==` est la comparaison souple : elle compare les valeurs en convertissant les types si besoin (`"5" == 5` retourne true). `===` est la comparaison stricte : elle compare valeurs ET types (`"5" === 5` retourne false). Toujours utiliser `===` pour éviter les comportements inattendus. Exemple : `0 == false` est true, mais `0 === false` est false. »*

### Q10 — Qu'est-ce que le CORS ?

**Réponse type :**
> *« Cross-Origin Resource Sharing : un mécanisme de sécurité du navigateur qui bloque par défaut les requêtes vers un domaine différent de la page courante. Côté serveur, on autorise certaines origines via le header `Access-Control-Allow-Origin`. Dans mon projet, je n'ai pas d'API cross-origin, donc le CORS ne s'applique pas. »*

### Q11 — Qu'est-ce que l'accessibilité web ?

**Réponse type :**
> *« Rendre le site utilisable par tous, y compris les personnes en situation de handicap. Techniques : attributs ARIA, balises sémantiques HTML5 (header, nav, main, article, footer), contrastes WCAG suffisants, navigation au clavier. En France, c'est aussi un critère légal (RGAA). Dans mon projet, j'utilise les balises sémantiques HTML5 et `lang="fr"` pour les lecteurs d'écran. »*

---

## 📋 SECTION 4 — Questions techniques Back-end

### Q12 — Qu'est-ce qu'une API REST ?

**Réponse type :**
> *« Une interface de communication client-serveur via HTTP. Les ressources sont identifiées par des URL, les actions via les verbes HTTP (GET, POST, PUT, DELETE, PATCH), les réponses en JSON. C'est stateless : pas d'état conservé côté serveur entre les requêtes. Dans mon projet, je n'ai pas implémenté d'API REST — le périmètre ne le justifiait pas — mais je connais le principe. »*

### Q13 — Comment hashez-vous les mots de passe ?

**Réponse type :**
> *« Avec **bcrypt** via les fonctions natives PHP `password_hash()` et `password_verify()`. On ne stocke JAMAIS le mot de passe en clair, ni en chiffrement réversible. bcrypt génère un hash avec un sel (salt) aléatoire intégré. À la connexion, on compare avec `password_verify()` qui s'occupe du salt automatiquement. »*

### Q14 — Qu'est-ce qu'un JWT ?

**Réponse type :**
> *« JSON Web Token : un jeton signé composé de 3 parties — header, payload, signature. Le client le stocke (cookie httpOnly de préférence) et l'envoie dans le header `Authorization: Bearer ...` à chaque requête. Le serveur vérifie la signature sans avoir besoin de stocker l'état en BDD. Dans mon projet, j'utilise `$_SESSION` PHP — plus simple pour une seule page d'admin. »*

### Q15 — Qu'est-ce qu'une injection SQL ?

**Réponse type :**
> *« Une attaque où un utilisateur insère du SQL malveillant dans un champ — par exemple `' OR 1=1 --` dans un champ de login. La protection : TOUJOURS utiliser des **requêtes préparées** (PDO `prepare()` + `execute()` avec paramètres), JAMAIS de concaténation de chaînes avec des entrées utilisateur. C'est pour ça que j'ai choisi PDO. »*

### Q16 — Différence entre PUT et PATCH ?

**Réponse type :**
> *« PUT remplace la ressource entière : si un champ manque dans la requête, il est effacé en BDD. PATCH met à jour partiellement : seuls les champs envoyés sont modifiés. PATCH est plus économique pour des modifications ponctuelles. »*

---

## 📋 SECTION 5 — Posture professionnelle

### Q17 — Comment vous tenez-vous informé des évolutions ?

**Réponse type — exemples CONCRETS** :
> *« MDN Web Docs (référence), [chaîne YouTube : Grafikart pour le PHP], [newsletter type JavaScript Weekly], [communauté Discord de la formation]. Je teste régulièrement des concepts dans des projets persos pour les ancrer. »*

### Q18 — Comment travaillez-vous en équipe ?

**Réponse type :**
> *« Git Flow : branches features, pull requests, code review. Communication asynchrone (Discord, Slack). Gestion de tâches (Trello, Notion). [Si vrai : pendant la formation, j'ai travaillé en groupe sur tel projet — je peux citer cet exemple]. »*

### Q19 — Que faites-vous quand vous êtes bloqué ?

**Méthode 4 étapes :**
> *« 1. J'isole le problème (recall, reproduction du bug). 2. Je lis attentivement les messages d'erreur. 3. Je cherche sur MDN, Stack Overflow, la doc officielle. 4. Si toujours bloqué après ~30 min, je demande à un collègue ou j'utilise un assistant IA — montrant mon code et ce que j'ai déjà essayé. C'est une démarche **autonome ET collégiale**. »*

---

## 🚨 QUESTIONS PIÈGES — Préparées d'avance

### Piège 1 — *"Pourquoi avoir choisi cette techno ?"*
→ Toujours **justifier**, jamais "parce qu'on m'a dit de le faire". Voir Phrases-bouclier.

### Piège 2 — *"Expliquez ce bout de code"*
→ Le jury va choisir un fichier dans ton repo. Sois capable d'expliquer **CHAQUE LIGNE** de ton mini-blog. Notamment :
- `index.php` (les blocs POST/GET, sessions, flash)
- `db.php` (DSN, options PDO, try/catch)

### Piège 3 — *"Pouvez-vous ajouter cette fonctionnalité maintenant ?"*
→ Si tu sais : fais-le devant eux, calmement.
→ Si tu ne sais pas : explique ta démarche : *"Je commencerais par... je rechercherais... je testerais..."*

### Piège 4 — *"Comment gérez-vous la sécurité ?"*
→ Lister :
- `htmlspecialchars()` partout pour le **XSS**
- **Requêtes préparées PDO** pour l'**injection SQL**
- `password_hash()` / `password_verify()` pour les mots de passe (CP8)
- Sessions PHP avec cookies httpOnly
- `.gitignore` pour les secrets

### Piège 5 — *"Que feriez-vous différemment ?"*
→ Toujours avoir une réponse de **prise de recul**. Voir Q6 ci-dessus.

---

## 📋 ENTRETIEN FINAL (15 min) — AT1 et AT2

### AT1 — Front-end
**Préparer** :
- Structure HTML5 sémantique ✓
- CSS responsive ✓
- Accessibilité (lang, alt, aria) ✓
- Faiblesses assumées : pas de JS interactif, pas de framework

### AT2 — Back-end
**Préparer** :
- PHP procédural + sessions ✓
- BDD MySQL + PDO + requêtes préparées ✓
- Authentification (si on l'ajoute) ✓
- Persistance fichier puis BDD ✓
- Faiblesses assumées : pas d'API REST, pas de MVC formel

---

## ✅ CHECKLIST J-7

| ✓ | Action à réaliser avant la soutenance |
|---|---|
| ☐ | Dossier projet finalisé et relu par un tiers |
| ☐ | Dépôt Git propre (README, branches, historique cohérent) |
| ☐ | Application **déployée et accessible en ligne** ⭐ |
| ☐ | Diaporama terminé (max **20 slides**, sobre, professionnel) |
| ☐ | **3 répétitions** chronométrées de la présentation |
| ☐ | Démo en direct **testée sur le matériel du jour J** |
| ☐ | Sauvegarde vidéo de la démo en cas de panne |
| ☐ | Révision des **9 compétences** du référentiel |
| ☐ | Préparation des réponses aux questions pièges |
| ☐ | Vêtements professionnels préparés |

---

## 🧠 LES 9 COMPÉTENCES DWWM — Aide-mémoire express

| # | Compétence | Mes mots-clés |
|---|---|---|
| CP1 | Environnement | Git, GitHub, VS Code, npm, .gitignore, .env |
| CP2 | UI statique | HTML5, CSS3, Flexbox, Grid, Media queries, WCAG, ARIA |
| CP3 | UI dynamique | DOM, fetch, async/await, Promise, JSON, ES6+ |
| CP4 | CMS/Framework | React/Vue, composants, props, state, routing |
| CP5 | Créer BDD | SQL, MCD, MLD, MySQL/PostgreSQL, clés, index, normalisation |
| CP6 | Accès données | PDO, requêtes préparées, injection SQL |
| CP7 | Back-end | REST, HTTP, Express/Laravel, routes, middleware, MVC |
| CP8 | Sécurité | bcrypt, JWT, HTTPS, OWASP, XSS, CSRF, CORS, sessions |
| CP9 | Déploiement | VPS, Nginx, PM2, CI/CD, Docker, logs, .env production |

---

## 🫶🏼 CONSEIL FINAL

> *Le jury n'attend pas la perfection. Il veut s'assurer que tu comprends ce que tu fais, que tu es capable d'apprendre, et que tu as une attitude professionnelle. Sois HONNÊTE sur tes limites et POSITIF sur ta progression.*

**Mantras avant la soutenance :**
1. **"Je ne sais pas"** est une bonne réponse si tu enchaînes avec *"voici comment je trouverais"*.
2. **"Régard le jury, ne lis pas les slides"** — la présentation est une conversation.
3. **"Cite des exemples concrets de TON projet"** — pas de réponses abstraites.

---

*Document préparé pour KodexKem — Soutenance DWWM 8-10 juillet 2026*
*À imprimer depuis Obsidian (Cmd+P → Export to PDF)*
