# FAQ - Questions et Concepts Clés PHP

## Bases du langage

- **Que signifie l’acronyme PHP ?**

À l’origine, l’acronyme PHP signifiait "Personal Home Page". Aujourd’hui, PHP est un acronyme récursif : PHP: Hypertext Preprocessor.

- **Comment déclare-t-on une variable en PHP ?**

On déclare une variable à l'aide de ``$``. Il n’y a pas besoin de typer la variable explicitement.

```php

$ma_variable = "quelque chose";

```

- **Quelle est la différence entre ``echo`` et ``print`` ?**

``echo`` et ``print`` servent à afficher une variable (de type chaînes).

``print`` retourne toujours 1 (il peut donc être utilisé dans des expressions).

``echo`` est légèrement plus rapide et peut prendre plusieurs arguments séparés par des virgules.

```php

echo "Bonjour";
echo "Bonjour", " ", "le monde";

$name = "Thomas";
echo "Bonjour, {$name}";

print "Bonjour";

```

- **Quelles sont les règles de nommage des variables en PHP ?**

Les règles de nommage des variables en PHP sont les suivantes :

-- On débute toujours une variable par un ``$``.

-- Les noms de variables sont sensibles à la casse ($variable ≠ $Variable).

-- Les caractères autorisés sont des lettres, des chiffres (jamais en première position) et ``_``.

-- On utilse toujours l'un des formats suivants : camelCase ou snake_case. (Sachant que le snake_case est plus répandu en PHP natif. camelCase sera souvent utilisé pour les méthodes.)

```php

$ma_variable_snake_case = "snake_case";

$maVariableCamelCase = "camelCase";

```

- **Comment insérer du code PHP dans une page HTML ?**

On insère du code PHP dans une page HTML à l'aide des balises ``<?php ... ?>`` ou sa version raccourcie ``<?= ... ?>``.

```php

<?php echo "Bonjour"; ?>

// OU

<?= "Bonjour"; ?>

```

---

## Types et structures

**Quels sont les types de données principaux en PHP ?**

Les types de données principaux en PHP sont les suivants :

``String`` : chaîne de caractères ;

``Integer`` : Entier ;

``Float`` : Nombre à virgule ;

``Boolean`` : Booléen (True / False) ;

``Null`` : Absence de valeur ;

``Array`` : Tableaux ;

```php

$my_string = "Coucou";
$my_int = 30;
$my_float = 2.1;
$my_bool = true;
$my_null = NULL;
$my_array = [];

```

**Quelle est la différence entre ``==`` et ``===`` ?**

``==`` vérifie une égalité relative, c'est-à-dire si une variable (son contenu) est égale à une autre.

``===`` vérifie une égalité stricte, c'est-à-dire si une variable (son contenu + type) est égale à une autre.

```php

$my_nb = "30"; // string
$my_nb_2 = 30; // int

$my_nb == $my_nb_2; // -> True
$my_nb === $my_nb_2; // -> False car $my_nb est de type string alors que $my_nb_2 est de type int.

```

**Comment créer et accéder à un tableau indexé et un tableau associatif ?**

Les tableaux indexés et tableaux associatifs se déclarent à l'aide de ``[]``.

Les tableaux indexés ont des indices numériques, tandis que les tableaux associatifs ont des indices personnalisés (clés). On parle de *Key-Value Pair*.

```php

$indexed_array = ["reblochon", "morbier", "abondance", "comté"];

echo $indexed_array[0]; // -> reblochon

$assoc_array = [
    "nom" => "reblochon", 
    "type" => "fromage", 
    "origine" => "haute-savoie"
];

echo $assoc_array["nom"]; // -> reblochon

```

**Que retourne la fonction ``isset()`` ?**

``isset()`` détermine si une variable est déclarée et est différente de NULL.

```php

$name = "Thomas";
$age = 30;
$var_null = NULL;
unset ($age); // annulation de la variable

isset($name); // -> TRUE
isset($var_null); // -> FALSE
isset($age); // -> FALSE car annulé grâce à unset()

```

**Que fait ``empty()`` ?**

``empty()`` détermine si une variable est vide. Ce sera le cas si la variable n'existe pas ou que sa valeur est égale à ``""``, ``0``, ``"0"``, ``null``, ``false``, ``[]``. Il retournera alors ``true``.

```php

$name = "Thomas";
$false_bool = False;

empty($name); // -> FALSE
empty($none_existing_var); // -> TRUE
empty($false_bool); // -> TRUE
empty(0); // -> TRUE

```

---

## Fonctions et portée

**Comment définit-on une fonction en PHP ?**

On définit une fonction grâce au mot-clé ``function``, suivi du nom de la fonction, de parenthèses ``()`` (pour les paramètres), puis d’accolades ``{}``.

```php

function sayHello($name) {
    echo "Bonjour {$name} !";
}

sayHello("Thomas"); // -> Bonjour Thomas !

```

**Quelle est la différence entre les variables locales, globales et superglobales ?**

Les variables ``locales`` sont définies à l’intérieur d’une fonction et ne seront accessibles qu'au sein de cette même fonction.

Les variables ``globales`` sont définies à l'extérieur d’une fonction et ne seront pas automatiquement accessible dans une fonction. (Il faudra utiliser ``global`` ou ``$GLOBALS``.)

Les variables ``superglobales`` sont prédéfinies et accessibles partout. (Ex. : ``$_POST``, ``$_GET``, ``$_SESSION``, ``$GLOBALS``, etc.).

```php

// Variable globale
$global_var = 1;

function test() {
    // Variable locale
    $local_var = 3;

    echo $local_var; // Accessible ici
    echo $global_var; // Erreur : inaccessible par défaut
}

test();

echo $local_var; // Erreur : inaccessible ici


// Pour accéder à une variable globale dans une fonction :
function testGlobal() {
    global $global_var; // Rend la variable globale accessible
    echo $global_var;
}

```

**Qu’est-ce que ``$GLOBALS`` et quand l’utiliser ?**

``$GLOBALS`` est un tableau associatif superglobal contenant toutes les variables globales accessibles partout. Il permet d’accéder aux variables globales à l’intérieur d’une fonction sans utiliser ``global``.

On l'utilisera rarement ! C’est pratique pour accéder ou modifier des variables globales sans les passer en paramètres, mais ce n’est pas une bonne pratique moderne. On préfèrera généralement passer des paramètres aux fonctions ou utiliser des classes/objets.

```php

$user = "Jane Doe";

function setUser($name) {
    $GLOBALS['user'] = $name; // Change la variable globale
}

function greet() {
    echo "Bonjour, " . $GLOBALS['user'] . " !";
}

setUser("Thomas");
greet(); // Bonjour, Thomas !

```

**Qu’est-ce qu’une fonction anonyme en PHP ?**

Une fonction anonyme (ou *closure*) est une fonction sans nom, souvent affectée à une variable ou utilisée comme argument.

```php

$message = "Salut";

$closure = function($name) use ($message) {
    echo "{$message}, {$name} !";
};

$closure("Thomas"); // -> Salut, Thomas !

```

---

## Gestion des formulaires et superglobales

**À quoi sert ``$_POST`` et ``$_GET`` ?**

``$_POST`` : contient les données envoyées par un formulaire via la méthode POST.
Ces données ne sont pas visibles dans l'URL.

``$_GET`` : contient les données envoyées via l’URL (paramètres de requête).
Exemple : ``page.php?id=5`` → ``$_GET['id']`` vaut ``5`` .

```php

$name = $_POST['name']; // Depuis un formulaire POST

$id = $_GET['id']; // Depuis l'URL

```

**Quelle est la différence entre ``$_REQUEST`` et ``$_POST`` ?**

``$_REQUEST`` est une variable superglobales qui est un tableau associatif contenant par défaut le contenu des variables ``$_GET``, ``$_POST`` et ``$_COOKIE``.

``$_POST`` contient uniquement les données envoyées par POST.

Attention : Utiliser ``$_REQUEST`` peut être dangereux car on ne sait pas d’où provient la donnée (``GET``/``POST``/``COOKIE``). Il est recommandé d’utiliser explicitement ``$_POST`` ou ``$_GET``.

**Comment sécuriser la récupération de données envoyées par un formulaire ?**

Ne jamais faire confiance aux données utilisateurs ! Pour cela :

-- Utiliser des requêtes préparées (PDO) ou des fonctions d’échappement pour la base de données (protection aux injections SQL).

-- Échapper les caractères spéciaux avant affichage (protection XSS).

-- Valider et filtrer les données (ex. filter_var).

-- Ne jamais afficher directement une donnée reçue sans la filtrer.

```html

<form method="post" action="traitement.php">
    <input type="text" name="name">
    <input type="email" name="email">
    <button type="submit">Envoyer</button>
</form>

```

```php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Nettoyage et validation
    $name = htmlspecialchars(trim($_POST['name']));
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);

    if ($email === false) {
        echo "Email invalide.";
    } else {
        echo "Bonjour, {$name} !";
    }
}

```

---

## Programmation Orientée Objet (POO)

**Comment déclare-t-on une classe et un objet en PHP ?**

On définit une classe grâce au mot-clé ``class``, suivi du nom de la classes et d’accolades ``{}``.

Pour créer un objet on utilisera ``new NomDeClasse()``.

```php

class MyClass
{
    // déclaration d'une propriété
    public $var = 'une valeur par défaut';

    // déclaration des méthodes
    public function displayVar() {
        echo $this->var;
    }
}

// Instanciation d'un objet
$my_obj = new MyClass();
$my_obj->displayVar(); // -> une valeur par défaut

```

**Quelle est la différence entre public, protected et private ?**

``public`` : accessible de partout (dans la classe, les classes enfants, et en dehors).
:
``protected`` : accessible uniquement dans la classe et les classes enfants.

``private`` : accessible uniquement dans la classe où c’est défini.

```php

class ParentClass {
    public $x = 1;
    protected $y = 2;
    private $z = 3;

    public function afficher() {
        echo $this->x; // ok
        echo $this->y; // ok
        echo $this->z; // ok
    }
}

class ChildClass extends ParentClass {
    public function afficherChild() {
        echo $this->x; // ok
        echo $this->y; // ok (protected)
        echo $this->z; // erreur (private)
    }
}

$obj = new ParentClass();

echo $obj->x; // ok
echo $obj->y; // erreur
echo $obj->z; // erreur

```

**Qu’est-ce qu’un constructeur et un destructeur ?**

``Constructeur (__construct)`` : méthode spéciale appelée automatiquement lors de la création d’un objet. Sert à initialiser ses propriétés.

``Destructeur (__destruct)`` : méthode appelée automatiquement quand l’objet est détruit (en fin de script par exemple).

```php

class User {
    public $name;

    public function __construct($name) {
        $this->name = $name;
        echo "Utilisateur {$this->name} créé !";
    }

    public function __destruct() {
        echo "Destruction de {$this->name}";
    }
}

$user = new User("Thomas");
// -> "Utilisateur Thomas créé !"
// À la fin du script : "Destruction de Thomas"

```

**Qu’est-ce que l’héritage et comment se fait-il en PHP ?**

L’héritage permet à une classe enfant d’hériter des propriétés et méthodes publiques ou protégées d’une classe parent grâce au mot-clé ``extends``.

```php

class MyParentClass
{
    public $name = 'Thomas';

    public function sayMyName() {
        echo "Bonjour, je suis {$this->name} !";
    }
}

class MyKidClass extends MyParentClass
{
    public $age = 30;

    public function sayAge() {
        echo "J'ai {$this->age} ans.";
    }
}

$child = new MyKidClass();
$child->sayMyName(); // Hérité de MyParentClass
$child->sayAge();


```

**Qu’est-ce que l’interface et la classe abstraite ?**

En PHP, une interface (définie avec le mot-clé ``interface``) sert uniquement à définir un contrat : elle ne contient que la liste des méthodes à implémenter, sans corps. Une classe qui implémente une interface avec le mot-clé implements est obligée d’écrire le code de toutes les méthodes définies dans cette interface. Cela permet de garantir qu’une ou plusieurs classes respectent une même structure.

```php

interface Loggable {
    public function log($message);
}

class FileLogger implements Loggable {
    public function log($message) {
        echo "Écriture dans un fichier : $message";
    }
}

class EmailLogger implements Loggable {
    public function log($message) {
        echo "Envoi d'un email avec le message : $message";
    }
}

```

À l’inverse, une classe abstraite (définie avec le mot-clé ``abstract``) peut contenir à la fois des méthodes déjà implémentées et des méthodes abstraites (déclarées mais non définies) que ses classes enfants devront obligatoirement compléter. Une classe abstraite ne peut pas être instanciée directement : elle sert de modèle pour factoriser du comportement commun.

```php

abstract class Document {
    protected $title;
    protected $createdAt;

    public function __construct($title) {
        $this->title = $title;
        $this->createdAt = date('Y-m-d');
    }

    abstract public function generateContent();

    public function getTitle() {
        return $this->title;
    }

    public function getCreationDate() {
        return $this->createdAt;
    }
}

class Invoice extends Document {
    private $amount;

    public function __construct($title, $amount) {
        parent::__construct($title);
        $this->amount = $amount;
    }

    public function generateContent() {
        return "Facture : {$this->title}, montant : {$this->amount}€, créée le {$this->createdAt}.";
    }
}

class Report extends Document {
    private $content;

    public function __construct($title, $content) {
        parent::__construct($title);
        $this->content = $content;
    }

    public function generateContent() {
        return "Rapport : {$this->title}, contenu : {$this->content}. Créé le {$this->createdAt}.";
    }
}

```

En résumé : une interface définit uniquement des obligations sans aucune logique, tandis qu’une classe abstraite définit à la fois des obligations et peut contenir du code réutilisable.

---

## Gestion des erreurs et exceptions

**Quelle est la différence entre une erreur et une exception ?**

``Erreur`` : C’est un problème qui interrompt l’exécution normale du script. Exemple : appel à une fonction inexistante.

``Exception`` : C’est un objet qui représente une erreur prévue et que l’on peut attraper (``catch``) pour gérer proprement la situation. Avec les exceptions, on peut éviter que le script se termine brutalement.

**Comment utiliser ``try``, ``catch``, ``finally`` ?**

``try`` : On place le code qui peut générer une exception.

``catch`` : On intercepte l’exception et on décide quoi faire.

``finally`` : Bloc optionnel qui s’exécute dans tous les cas (qu’il y ait une exception ou pas).

```php

try {
    // Code qui peut lancer une exception
    if (!file_exists("data.txt")) {
        throw new Exception("Le fichier est introuvable !");
    }
    echo "Fichier trouvé !";
} catch (Exception $e) {
    // Gestion de l'erreur
    echo "Erreur : " . $e->getMessage();
} finally {
    // Code qui s'exécute dans tous les cas
    echo "Fin du processus.";
}

```

**Quelle est la fonction pour définir une fonction de gestion d’erreur personnalisée ?**

La fonction est ``set_error_handler()``. Elle permet de rediriger les erreurs PHP classiques vers une fonction personnalisée.

Dans une fonction de gestion d’erreur personnalisée (avec ``set_error_handler()``), les paramètres qui arrivent automatiquement sont :

``$errno`` : Le code numérique du type d’erreur (par exemple : ``E_WARNING``, ``E_NOTICE``, ``E_ERROR``, etc.).

``$errstr`` : Le message d’erreur.

``$errfile`` : Le fichier dans lequel l’erreur s’est produite.

``$errline`` : Le numéro de ligne où l’erreur est survenue.

```php

function monGestionnaireErreur($errno, $errstr, $errfile, $errline) {
    echo "Erreur [$errno] : $errstr dans $errfile à la ligne $errline";
}

set_error_handler("monGestionnaireErreur");

// Déclenchons une erreur (variable non définie)
echo $varNonDefinie;

// Résultat -> Erreur [8] : Undefined variable $varNonDefinie dans /var/www/index.php à la ligne 8

```

---

## Fichiers et sessions

**Comment ouvrir, lire et écrire dans un fichier en PHP ?**

On utilise les fonctions ``fopen()``, ``fgets()``, et ``fclose()`` pour ouvrir, lire et écrire dans un fichier en PHP. Pour simplifier, on peut aussi utiliser ``file_get_contents()`` (lecture directe) ou ``file_put_contents()`` (écriture directe).

```php

$nomFichier = "notes.txt";

// lecture ligne par ligne d’un fichier texte
function lireFichier($nomFichier) {
    $handle = fopen($nomFichier, 'r'); // 'r' = lecture seule
    if ($handle) {
        while (!feof($handle)) { // Tant qu'on n'est pas à la fin du fichier
            $ligne = fgets($handle); // Lit une ligne
            echo $ligne . "<br>";
        }
        fclose($handle);
    }
}

// Lecture plus simple avec file_get_contents()
echo nl2br(file_get_contents("notes.txt"));

// Écriture dans un fichier (exemple d’ajout d’un texte)
$handle = fopen("notes.txt", "a"); // 'a' = append (ajoute à la fin)
fwrite($handle, "Nouvelle ligne\n");
fclose($handle);

```

**Quelle est la différence entre une session et un cookie ?**

``Session`` : les données sont stockées côté serveur (dans un fichier temporaire). Le navigateur ne reçoit qu’un identifiant de session.

``Cookie`` : les données sont stockées côté client (dans le navigateur).

En pratique : une ``session`` sera utile pour stocker l’état de connexion d’un utilisateur. Et un ``cookie`` sera utile pour se souvenir d’une préférence utilisateur (ex : thème sombre).

**Comment démarrer une session en PHP ?**

On utilise ``session_start()``. On l'utilisera avant toute sortie HTML (en tout début de script).

```php

session_start(); // démarrage d'une session
$_SESSION['nom'] = 'Thomas'; // information ajoutée à la session

echo "Bonjour " . $_SESSION['nom']; // cas d'utilisation d'une information de session

```

**Comment détruire une session ?**

On utilise ``session_destroy()``. Souvent, on supprimera aussi les variables.

```php

$_SESSION = [];
session_unset();
session_destroy();

```

---

## Sécurité

**Quelles sont les bonnes pratiques pour éviter les injections SQL ?**

Pour éviter les injections SQL, on ne doit jamais insérer directement les données utilisateur dans une requête SQL.
Les bonnes pratiques :

-- Utiliser des requêtes préparées et des paramètres bindés (PDO ou MySQLi).

-- Ne jamais faire confiance aux données reçues : valider et filtrer systématiquement.

-- Échapper les caractères si on ne peut pas utiliser de requêtes préparées.

-- Protéger les formulaires côté front et côté serveur.

```php

$stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
$stmt->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
$stmt->execute();

```

**Qu’est-ce que ``htmlspecialchars()`` et pourquoi l’utiliser ?**

``htmlspecialchars()`` empêche l’interprétation de certains caractères spéciaux HTML en les transformant en entités HTML.

C’est une protection de base contre les attaques XSS (injections de code HTML/JavaScript).

| HTML  | Transformé en |
| :---: |:---:|
| & | ``&amp`` |
| " | ``&quot;`` |
| ' | ``&#039;`` |
| < | ``&lt;`` |
| > | ``&gt;`` |

```php

echo htmlspecialchars('<script>alert("XSS")</script>');
// Affichera : &lt;script&gt;alert(&quot;XSS&quot;)&lt;/script&gt;

```

**Quelle est la différence entre ``include``, ``require``, ``include_once`` et ``require_once`` ?**

``include`` : insère le fichier, génère un *warning* si le fichier est introuvable mais continue le script.

``require`` : insère le fichier, génère une *erreur* fatale si le fichier est introuvable et stoppe le script.

``include_once`` : comme ``include``, mais ne l’inclut qu’une seule fois même si on l’appelle plusieurs fois.

``require_once`` : comme ``require``, mais ne l’inclut qu’une seule fois même si on l’appelle plusieurs fois.

```php

require_once "config.php"; // Obligatoire et une seule fois
include "menu.php"; // Optionnel

```

**Qu’est-ce qu’une attaque CSRF et comment s’en protéger ?**

Une attaque ``CSRF`` (*Cross Site Request Forgery*) force un utilisateur connecté à exécuter une action à son insu.

Pour se protéger, il faut utiliser un ``token CSRF`` unique dans les formulaires et le vérifier côté serveur.

```php

// formulaire.php

<?php

session_start();

// Génère un token unique si pas déjà créé
if (!isset($_SESSION['token'])) {
    $_SESSION['token'] = bin2hex(random_bytes(32));
}

?>

```

```html

<!-- formulaire.php -->

<form method="post" action="traitement.php">
    <input type="text" name="commentaire" placeholder="Votre commentaire">
    
    <!-- On ajoute un champ caché avec le token -->
    <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['token']; ?>">

    <button type="submit">Envoyer</button>
</form>

```

```php

// traitement.php

session_start();

// Vérifier si le token CSRF existe et correspond
if (
    !isset($_POST['csrf_token']) ||
    $_POST['csrf_token'] !== $_SESSION['token']
) {
    die("Erreur CSRF : action non autorisée !");
}

// Si le token est bon, on peut traiter le formulaire
$commentaire = htmlspecialchars($_POST['commentaire']);
echo "Commentaire reçu : " . $commentaire;

```

**Qu’est-ce qu’une attaque XSS et comment s’en protéger ?**

Une attaque ``XSS`` (*Cross-site scripting*) consiste à injecter des scripts dans une page affichée chez l’utilisateur. On utilise ``htmlspecialchars()`` pour se protéger et on n'affiche jamais directement une donnée reçue sans la filtrer.

**Que signifie le principe du "*least privilege*" en sécurité ?**

Le principe du "*least privilege*" en sécurité consiste à donner uniquement les droits strictement nécessaires aux comptes utilisateurs et services (base de données, serveur, etc.), pour limiter les dégâts en cas de faille.

**Comment gérer correctement les mots de passe en PHP ?**

Pour cela, il faut :

-- Ne jamais stocker un mot de passe en clair ;

-- Utiliser ``password_hash()`` (pour le hachage) pour créer un mot de passe sécurisé (avec un sel automatique et un algorithme fort) ;

-- ``password_verify()`` pour la vérification ;

-- Ne jamais inventer son propre système de hash ;

```php

// Hashage
$hash = password_hash($password, PASSWORD_DEFAULT);

// Vérification
if (password_verify($password, $hash)) {
    echo "Mot de passe correct !";
}

```

**Comment sécuriser un upload de fichier en PHP ?**

Pour sécuriser un upload de fichier en PHP, il faut :

-- Vérifier l’extension et le type MIME pour n’accepter que certains formats ;

-- Limiter la taille du fichier (via ``php.ini`` ou ``$_FILES['file']['size']``) ;

-- Ne jamais faire confiance au nom du fichier : renommer le fichier et utiliser ``move_uploaded_file()`` pour le placer dans un dossier sûr ;

-- Stocker les fichiers en dehors du dossier ``public`` quand c’est possible, pour éviter qu’ils soient exécutés directement depuis le navigateur ;

-- Ne jamais exécuter un fichier uploadé ;

```php

<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 1. Limiter la taille (exemple 2 Mo)
    if ($_FILES['fichier']['size'] > 2 * 1024 * 1024) {
        die("Fichier trop volumineux !");
    }

    // 2. Vérification extension et MIME
    $allowed_extensions = ['jpg', 'png', 'pdf'];
    $file_extension = strtolower(pathinfo($_FILES['fichier']['name'], PATHINFO_EXTENSION));

    if (!in_array($file_extension, $allowed_extensions)) {
        die("Extension non autorisée !");
    }

    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mime = finfo_file($finfo, $_FILES['fichier']['tmp_name']);
    finfo_close($finfo);

    $allowed_mimes = ['image/jpeg', 'image/png', 'application/pdf'];
    if (!in_array($mime, $allowed_mimes)) {
        die("Type MIME non autorisé !");
    }

    // 3. Renommer le fichier et le déplacer
    $nouveau_nom = uniqid('', true) . '.' . $file_extension;
    $destination = __DIR__ . '/uploads/' . $nouveau_nom;

    if (move_uploaded_file($_FILES['fichier']['tmp_name'], $destination)) {
        echo "Fichier uploadé avec succès.";
    } else {
        echo "Erreur lors de l'upload.";
    }
}

?>

```

```html

<form method="post" enctype="multipart/form-data">
    <input type="file" name="fichier">
    <button type="submit">Uploader</button>
</form>

```

---

## Divers

**Quelle est la différence entre PHP procédural et PHP orienté objet ?**

Le ``PHP procédural`` se base sur des fonctions et des instructions exécutées les unes après les autres.

Le ``PHP orienté objet (POO)`` utilise des classes, objets, propriétés et méthodes pour organiser le code de manière modulaire et réutilisable.

```php

// Procédural

function soustraction($a, $b) {
    return $a - $b;
}

echo soustraction(2, 3);

// Orienté objet
class Calculatrice {
    public function addition($a, $b) {
        return $a + $b;
    }
}

$calc = new Calculatrice();
echo $calc->addition(2, 3);

```

**Comment activer et afficher les erreurs en PHP pour déboguer ?**

On peut activer l’affichage des erreurs directement dans le code pendant le développement :

```php

ini_set('display_errors', 1);
error_reporting(E_ALL);

```

Ou dans le fichier ``php.ini`` :

```ini

display_errors = On
error_reporting = E_ALL

```

En production, il est recommandé de désactiver l’affichage et de les enregistrer dans un fichier log pour éviter d’exposer des informations sensibles.

**À quoi sert ``Composer`` dans l’écosystème PHP ?**

``Composer`` est le gestionnaire de dépendances pour PHP. Il permet d’installer, mettre à jour et gérer automatiquement les bibliothèques externes.

```bash

composer require altorouter/altorouter

```

**Qu’est-ce que ``PDO`` et à quoi ça sert ?**

``PDO`` (*PHP Data Objects*) est une interface orientée objet représentant une connexion entre PHP et un serveur de base de données. Elle permet de travailler avec différentes bases (MySQL, PostgreSQL, SQLite, etc.) via la même API et de sécuriser les requêtes grâce aux requêtes préparées.

```php

$pdo = new PDO("mysql:host=localhost;dbname=test", "root", "");
$stmt = $pdo->prepare("SELECT * FROM users WHERE id = :id");
$stmt->execute(['id' => 1]);
$data = $stmt->fetch();

```

**Que fait la fonction ``var_dump()`` ?**

``var_dump()`` affiche des informations détaillées sur une variable : type, taille et contenu. Il est très utile pour le débogage.

```php

$tab = ["php", 123, true];
var_dump($tab);

```

**Qu’est-ce qu’un namespace en PHP ?**

Un ``namespace`` (espace de noms) permet d’organiser le code et d’éviter les conflits de noms entre classes ou fonctions dans des projets complexes.

On le déclare en haut du fichier :

```php

namespace App\Controllers;

class UserController {
    public function index() {
        echo "Page utilisateur";
    }
}

```

On utilise ensuite use pour importer une classe d’un autre namespace :

```php

use App\Controllers\UserController;

$controller = new UserController();
$controller->index();

```

**Qu’est-ce que l’autoloading (PSR-4) en PHP ?**

L’``autoloading`` (chargement automatique) permet de charger automatiquement les classes PHP sans avoir à faire de ``require`` ou ``include`` manuels.

La norme PSR-4 définit une convention où la structure des namespaces correspond à la structure des dossiers du projet.

Dans ``composer.json``, on configure l’*autoload* :

```json

"autoload": {
    "psr-4": {
        "App\\": "src/"
    }
}

```

On exécute :

```bash

composer dump-autoload

```

Et on inclut l’autoload une seule fois dans le projet :

```php

require 'vendor/autoload.php';

```
