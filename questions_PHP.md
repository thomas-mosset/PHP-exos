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

**Quelle est la différence entre ``$_REQUEST`` et ``$_POST`` ?**

**Comment sécuriser la récupération de données envoyées par un formulaire ?**

---

## Programmation orientée objet

**Comment déclare-t-on une classe et un objet en PHP ?**

**Quelle est la différence entre public, protected et private ?**

**Qu’est-ce qu’un constructeur et un destructeur ?**

**Qu’est-ce que l’héritage et comment se fait-il en PHP ?**

**Qu’est-ce que l’interface et la classe abstraite ?**

---

## Gestion des erreurs et exceptions

**Quelle est la différence entre une erreur et une exception ?**

**Comment utiliser ``try``, ``catch``, ``finally ``?**

**Quelle est la fonction pour définir une fonction de gestion d’erreur personnalisée ?**

---

## Fichiers et sessions

**Comment ouvrir, lire et écrire dans un fichier en PHP ?**

**Quelle est la différence entre une session et un cookie ?**

**Comment démarrer une session en PHP ?**

**Comment détruire une session ?**

---

## Sécurité

**Quelles sont les bonnes pratiques pour éviter les injections SQL ?**

**Qu’est-ce que ``htmlspecialchars()`` et pourquoi l’utiliser ?**

**Quelle est la différence entre ``include``, ``require``, ``include_once`` et ``require_once`` ?**

---

## Divers

**Quelle est la différence entre PHP procédural et PHP orienté objet ?**

**Comment activer et afficher les erreurs en PHP pour déboguer ?**

**À quoi sert Composer dans l’écosystème PHP ?**

**Qu’est-ce que PDO et à quoi ça sert ?**

**Que fait la fonction ``var_dump()`` ?**
