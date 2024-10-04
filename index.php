<?php

// Exercice 1 : Boucle for et fonction

/*

Objectif : Créer une fonction qui affiche la table de multiplication d’un nombre.

Consignes :
Crée une fonction afficherTableMultiplication($nombre) qui prend un nombre comme paramètre et affiche la table de multiplication de ce nombre jusqu'à 10.
Utilise une boucle for pour parcourir les multiples.

*/

function afficherTableMultiplication($nombre) {
    for ($i=0; $i < 11; $i++) { 
        $resultat = $nombre * $i;

        echo $nombre . ' x ' . $i . ' = ' . $resultat . '<br />';
    }
    
};

// afficherTableMultiplication(5);
// Résultat attendu
// 5 x 1 = 5
// 5 x 2 = 10
// ...
// 5 x 10 = 50


// *******************************************************************


// Exercice 2 : Boucle while et fonction

/*

Objectif : Calculer la somme des nombres pairs de 1 à un nombre donné.

Consignes :
Crée une fonction sommePairs($n) qui calcule et retourne la somme de tous les nombres pairs de 1 à $n.
Utilise une boucle while pour parcourir les nombres et additionner seulement les nombres pairs.

*/

function sommePairs($n) {
    $i = 1;
    $somme = 0;
    $elements = array();

    while ($i <= $n) {

        if ($i % 2 == 0) {
            $somme += $i;
            $elements[] = $i;
        }

        $i++;
    };

    echo $somme . ' (' . implode(' + ', $elements) . ')' ;
};

// sommePairs(10);
// Résultat attendu : 30 (2 + 4 + 6 + 8 + 10)



// *******************************************************************


// Exercice 3 : Boucle foreach et fonction

/*

Objectif : Trouver le maximum dans un tableau.

Consignes :
Crée une fonction trouverMax($tableau) qui prend un tableau de nombres en paramètre et retourne le nombre le plus grand.
Utilise une boucle foreach pour parcourir le tableau.

*/

$tableauDeNombres = [3, 5, 7, 2, 9, 1];

function trouverMax($tableauDeNombres) {
    $plusGrandNombre = 0;

    foreach ($tableauDeNombres as $nombre) {

        if ($nombre > $plusGrandNombre) {
            $plusGrandNombre = $nombre;
        }
    }

    return $plusGrandNombre;
};

// echo trouverMax($tableauDeNombres); 
// Résultat attendu : 9


// *******************************************************************


// Exercice 4 : Fonction récursive

/*

Objectif : Calculer la factorielle d’un nombre.

Consignes :
Crée une fonction récursive factorielle($n) qui calcule la factorielle d'un nombre $n.
La factorielle de $n (notée n!) est égale à n * (n-1) * (n-2) * ... * 1.

Récursive = la fonction doit s'appeler elle-même jusqu'à atteindre la condition de base.

*/

function factorielle($nombre) {
    // Cas de base : si nombre est égal à 0, retourner "1"
    if ($nombre === 0) {
        return "1";
    } else {
        // Cas récursif : appeler factorielle(n-1) et construire la chaîne de calcul
        $resultatPrec = factorielle($nombre - 1);

        // Si $nombre est 1, on retourne juste "1" sans ajouter "* 1"
        if ($nombre == 1) {
            return "1";
        }

        // Sinon, on retourne l'opération sous la forme "n * (n-1) * ..."
        return "$nombre * $resultatPrec";
    }
}

// Calculer la factorielle de 5 et évaluer la chaîne pour obtenir le résultat
$calcul = factorielle(5);
$resultat = eval("return $calcul;");

// Afficher le résultat final avec la chaîne de calcul
// echo "$resultat ($calcul)";

// Résultat attendu : 120 (5 * 4 * 3 * 2 * 1)




// *******************************************************************


// Exercice 5 : Paramètres par défaut et boucles imbriquées

/*

Objectif : Dessiner un rectangle en étoiles.

Consignes :
Crée une fonction dessinerRectangle($largeur, $hauteur, $caractere = '*') qui dessine un rectangle avec des caractères (par défaut des étoiles) et utilise des boucles imbriquées pour afficher le résultat.



function dessinerRectangle($largeur, $hauteur, $caractere = '*') {

    for ($i=0; $i < $hauteur; $i++) { 
        for ($index=0; $index <br $largeur; $index++) { 
            echo $caractere;
        }
        echo "<br>";
    }
}

*/

// dessinerRectangle(5, 3);
// Résultat attendu : 
// *****
// *****
// *****


// *******************************************************************


// Exercice 6 : Variables globales et portée des variables

/*

Objectif : Illustrer l'utilisation des variables globales.

Consignes :
Déclare une variable globale $compteur = 0.
Crée une fonction incrementerCompteur() qui utilise la variable globale $compteur pour l'incrémenter de 1 à chaque appel de la fonction.
Affiche la valeur du compteur avant et après avoir appelé la fonction plusieurs fois.

*/

$compteur = 0;

function incrementerCompteur() {
    global $compteur;
    $compteur++;
}

// incrementerCompteur();
// incrementerCompteur();
// incrementerCompteur();

// echo $compteur;
// Résultat attendu : 3



// *******************************************************************


// Exercice 7 : Tableau associatif et boucle foreach

/*

Objectif : Créer une fonction qui affiche les informations d'un utilisateur.

Consignes :
Crée un tableau associatif $utilisateur avec les clés suivantes : nom, prenom, age, et email.
Crée une fonction afficherUtilisateur($utilisateur) qui parcourt le tableau et affiche chaque clé et valeur au format clé : valeur.

*/

$utilisateur = ['nom' => "M.", 'prenom'  => "Thomas", 'age' => 29, 'email' => "truc@truc.com"];

function afficherUtilisateur($utilisateur) {
    foreach ($utilisateur as $key => $value) {
        echo $key . " : " . $value . "<br />";
    };
};

// afficherUtilisateur($utilisateur);


// *******************************************************************


// Exercice 8 : Tableaux multidimensionnels et boucles imbriquées

/*

Objectif : Créer une fonction qui affiche le contenu d'un tableau multidimensionnel.

Consignes :
Crée un tableau multidimensionnel qui contient des informations sur plusieurs utilisateurs (par exemple, nom, prénom, âge).
Crée une fonction afficherUtilisateurs($utilisateurs) qui parcourt le tableau et affiche les informations de chaque utilisateur.

*/

$utilisateurs = [
    ['nom' => "M.", 'prenom'  => "Thomas", 'age' => 29, 'email' => "truc@truc.com"],
    ['nom' => "Dupond", 'prenom'  => "Charles", 'age' => 50, 'email' => "charles@truc.com"],
    ['nom' => "Duchmol", 'prenom'  => "Alice", 'age' => 22, 'email' => "duchmole@truc.com"],
];

function afficherUtilisateurs($utilisateurs) {
    // loop through the array of arrays...
    foreach ($utilisateurs as $utilisateur) {
        // ... then through the inner arrays
        foreach ($utilisateur as $key => $value) {
            echo $key . " : " . $value . "<br />";
        }

        echo "<br />";
    }

}

// afficherUtilisateurs($utilisateurs);


// *******************************************************************


// Exercice 9 : Boucle do...while et fonction

/*

Objectif : Demander à l'utilisateur de saisir un mot de passe jusqu'à ce qu'il soit correct.

Consignes :
Crée une fonction verifierMotDePasse($motDePasseCorrect) qui demande à l'utilisateur de saisir un mot de passe jusqu'à ce qu'il soit correct.
Utilise une boucle do...while pour gérer la saisie.



function verifierMotDePasse($motDePasseCorrect) {
    // Mot de passe correct prédéfini
    $mdp = 'monSuperMotdePasse!';

    // Initialiser la variable pour le mot de passe saisi
    $motDePasseSaisi = '';

    // Vérifier si le mot de passe a été soumis
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Récupérer le mot de passe saisi
        $motDePasseSaisi = $_POST['motdepasse'];
    }

    // Boucle do...while pour demander un mot de passe jusqu'à ce qu'il soit correct
    do {
        if ($motDePasseSaisi !== $mdp) {
            echo "<p>Mot de passe incorrect. Veuillez réessayer.</p>";
            // Afficher le formulaire pour la nouvelle saisie
            afficherFormulaire();
            return; // Sortie de la fonction pour éviter la suite de la vérification
        }
    } while ($motDePasseSaisi !== $mdp);

    echo "<p>Mot de passe correct ! Accès accordé.</p>";
}

function afficherFormulaire() {
    echo '<form method="POST" action="">
            <label for="motdepasse">Veuillez saisir un mot de passe :</label>
            <input type="password" name="motdepasse" id="motdepasse" required>
            <input type="submit" value="Valider">
          </form>';
}

// Appel de la fonction pour afficher le formulaire la première fois
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    verifierMotDePasse("monSuperMotdePasse!");
} else {
    afficherFormulaire();
}*/


// *******************************************************************


// Exercice 10 : Tri d'un tableau avec une fonction

/*

Objectif : Créer une fonction qui trie un tableau de nombres.

Consignes :
Crée une fonction trierTableau($tableau) qui utilise une boucle pour trier le tableau de manière croissante.
La fonction devrait retourner le tableau trié.

*/

$nombres = [2,8,10,9,7,0,3];

function trierTableau($tableau) {
    sort($tableau);

    foreach ($tableau as $nombre) {
        echo $nombre . "<br />";
    };
};

// trierTableau($nombres);


// *******************************************************************


// Exercice 11 : Calcul de la moyenne

/*

Objectif : Calculer la moyenne d'un tableau de notes.

Consignes :
Crée une fonction calculerMoyenne($notes) qui prend un tableau de notes en paramètre et retourne la moyenne.

*/

$notes = [10, 20, 18, 5, 8, 7, 12];

function calculerMoyenne($notes) {
    // Calculer la somme des notes
    $somme = array_sum($notes);

    // Calculer le nombre de notes
    $nombreDeNotes = count($notes);

    // Calculer la moyenne
    $moyenne = $somme / $nombreDeNotes;


    echo $moyenne;
};

// calculerMoyenne($notes);


// *******************************************************************


// Exercice 12 : Fonction de filtre

/*

Objectif : Filtrer les nombres pairs d'un tableau.

Consignes :
Crée une fonction filtrerPairs($tableau) qui prend un tableau de nombres et retourne un nouveau tableau contenant uniquement les nombres pairs.
Utilise une boucle pour parcourir le tableau.

*/

$nombres = [10, 20, 18, 5, 8, 7, 13];

function filtrerPairs($nombres) {
    $nombresPairs = [];

    foreach ($nombres as $nombre) {
        if ($nombre % 2 == 0) {
            array_push($nombresPairs, $nombre);
        }
    }

    echo "Nombres pairs: " . implode(", ", $nombresPairs);
};

// filtrerPairs($nombres);



// *******************************************************************


// Exercice 13 : Utilisation de closures

/*

Objectif : Créer une fonction qui génère des fonctions d’addition.

Consignes :
Crée une fonction creerAdditionneur($x) qui retourne une fonction anonyme qui additionne $x à un nombre donné.
Teste la fonction en créant des additionneurs pour différents nombres.

*/

function creerAdditionneur($x) {
    return function($nombre) use ($x) {
        return $nombre + $x;
    };
};

// Test de la fonction avec différents additionneurs
/* $additionneur5 = creerAdditionneur(5);
$additionneur10 = creerAdditionneur(10);
$additionneur20 = creerAdditionneur(20);

echo $additionneur5(3);   // Affiche 8 (3 + 5)
echo "\n";
echo $additionneur10(7);   // Affiche 17 (7 + 10)
echo "\n";
echo $additionneur20(15);  // Affiche 35 (15 + 20)
*/


// *******************************************************************


// Exercice 14 : Anagrammes

/*

Objectif : Vérifier si deux mots sont des anagrammes.

Consignes :
Crée une fonction sontAnagrammes($mot1, $mot2) qui vérifie si deux mots sont des anagrammes l'un de l'autre (c'est-à-dire qu'ils contiennent les mêmes lettres dans un ordre différent).
Utilise des boucles pour compter les lettres.

*/

function sontAnagrammes($mot1, $mot2) {
    // Convertir les mots en minuscules pour une comparaison insensible à la casse
    strtolower($mot1);
    strtolower($mot2);

    $lettresMot1 = str_split($mot1);
    $lettresMot2 = str_split($mot2);

    // Vérifier la longueur des mots
    if (strlen($mot1) !== strlen($mot2)) {
        echo "Il n'y a pas le même nombre de lettres ! ";
        echo $mot1 . " et " . $mot2 . " ne sont donc pas des anagrammes !";
    } else {
        sort($lettresMot1);
        sort($lettresMot2);

        if ($lettresMot1 === $lettresMot2) {
            echo $mot1 . " et " . $mot2 . " sont des anagrammes ! <br />";
        }
    }

};

// sontAnagrammes("niche", "chien");
// sontAnagrammes("coucou", "Didi");



// *******************************************************************


// Exercice 15 : Compter les voyelles

/*

Objectif : Compter le nombre de voyelles dans une chaîne.

Consignes :
Crée une fonction compterVoyelles($chaine) qui prend une chaîne en paramètre et retourne le nombre de voyelles (a, e, i, o, u).
Utilise une boucle pour parcourir chaque caractère de la chaîne.

*/

function compterVoyelles($string) {
    $voyelles = ["a", "e", "i", "o", "u"];
    $nombreVoyelles = 0;
    $string = strtolower($string);

    $stringIntoArray = str_split($string);

    foreach ($stringIntoArray as $letter) {
        if (in_array($letter, $voyelles)) {
            $nombreVoyelles++;
        }
    }

    if ($nombreVoyelles === 0) {
        echo "Il y a $nombreVoyelles voyelle dans $string. <br />";
    } else {
        echo "Il y a $nombreVoyelles voyelles dans $string. <br />";
    }
    
};

// compterVoyelles("SNCF");
// compterVoyelles("Avion");



// *******************************************************************


// Exercice 16 : Vérifier si un nombre est pair ou impair

/*

Objectif : Écrire une fonction qui vérifie si un nombre est pair ou impair.

Consignes :
Crée une fonction estPair($nombre) qui prend un nombre entier en paramètre et retourne true s'il est pair, et false s'il est impair.

*/

function estPair($nombre) {
    // vérif si nb entier
    if (is_int($nombre)) {
        // 
        if ($nombre % 2 == 0) {
            echo "Le $nombre est pair. <br/ >";
            return true;
        } else {
            echo "Le $nombre est impair. <br />";
            return false;
        }
    } else {
        echo "Le nombre renseigné n'est pas un entier. <br />";
    }
}

// estPair(3);
// estPair(8);
// estPair(7.8);


// *******************************************************************


// Exercice 17 : Vérification d'une adresse e-mail

/*

Objectif : Valider une adresse e-mail.

Consignes :
Crée une fonction validerEmail($email) qui utilise une expression régulière pour vérifier si l'e-mail est valide.
L'adresse e-mail doit respecter le format standard (exemple: nom@domaine.com).

*/

function validerEmail($email) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "'$email' est une adresse mail valide. <br />";
    } else {
        echo "'$email' est une adresse mail invalide. <br />";
    }
};

function validerEmailWithRegex($email) {
    $email_regex = '/^\\S+@\\S+\\.\\S+$/';


    if (preg_match($email_regex, $email)) {
        echo "'$email' est une adresse mail valide. <br />";
    } else {
        echo "'$email' est une adresse mail invalide. <br />";
    }
};

// validerEmail("toto@truc.com");
// validerEmail("totote.truc.dev");

// validerEmailWithRegex("totoregex@truc.com");
// validerEmailWithRegex("tototeregex.truc.dev");


// *******************************************************************


// Exercice 18 : Manipulation des chaînes de caractères

/*

Objectif : Compter le nombre de mots dans une phrase.

Consignes :
Crée une fonction compterMots($phrase) qui retourne le nombre de mots dans une phrase donnée.
Utilise la fonction PHP str_word_count() pour t'aider.

*/

function compterMots($phrase) {
    $nombreMots = str_word_count($phrase);

    echo $nombreMots . "<br />";
};

// compterMots("Ma super phrase."); // doit donner 3


// *******************************************************************


// Exercice 19 : Manipulation des fichiers

/*

Objectif : Lire un fichier texte et afficher son contenu.

Consignes :
Crée une fonction lireFichier($nomFichier) qui ouvre un fichier texte et affiche son contenu.
Utilise les fonctions fopen(), fgets(), et fclose().

*/

$exoTxt = "exo19.txt";

function lireFichier($nomFichier) {
    // récupère le fichier
    $handle_file = fopen($nomFichier, 'r'); // r pour "read"

    if ($handle_file) {
        
        while (!feof($handle_file)) {
            // lis le fichier
            $buffer = fgets($handle_file);
            // affiche son contenu
            echo $buffer . "<br/>";
        }
        
    }

    // ferme le fichier
    fclose($handle_file);
};

// w/ fonction file_get_contents()  
function lireFichierAvecFonction ($nomFichier) {
    $display_file = file_get_contents($nomFichier);

    echo "Avec fonction 'file_get_contents' : " . $display_file . "<br/>";
}

// lireFichier($exoTxt);
// lireFichierAvecFonction($exoTxt);


// *******************************************************************


// Exercice 20 : Création d'un tableau associatif dynamique

/*

Objectif : Construire un tableau associatif où les clés sont des prénoms et les valeurs sont des âges.

Consignes :
Demande à l'utilisateur de saisir plusieurs prénoms et âges (par exemple via des formulaires ou des variables).
Crée un tableau associatif $personnes qui associe chaque prénom à son âge.

*/


function afficherFormulaire() {
    echo '<form method="POST" action="">
            <label for="prenom1">Veuillez saisir un 1er prénom :</label>
            <input type="text" name="prenom1" id="prenom1" required>

            <label for="age1">Veuillez saisir un 1er age :</label>
            <input type="number" name="age1" id="age1" required>

            <label for="prenom2">Veuillez saisir un 2nd prénom :</label>
            <input type="text" name="prenom2" id="prenom2" required>

            <label for="age2">Veuillez saisir un 2nd age :</label>
            <input type="number" name="age2" id="age2" required>

            <button type="submit" value="Valider">Valider</button>
          </form>';
};

function traiterFormulaire() {
    if($_SERVER["REQUEST_METHOD"] == "POST") {

        $personnes = [
            $_POST['prenom1'] => $_POST['age1'],
            $_POST['prenom2'] => $_POST['age2'],
        ];

        foreach ($personnes as $nom => $age) {
            echo "$nom a $age ans. <br />";
        }

    }
};

// Appel de la fonction pour afficher le formulaire la première fois
/* if ($_SERVER["REQUEST_METHOD"] == "POST") {
    traiterFormulaire();
} else {
    afficherFormulaire();
}
*/

// *******************************************************************


// Exercice 21 : Générer des nombres aléatoires

/*

Objectif : Générer 10 nombres aléatoires entre 1 et 100.

Consignes :
Utilise la fonction PHP rand() pour générer et afficher 10 nombres aléatoires.

*/

function getRandomNumber() {
    $random_number = rand(1, 100);

    echo $random_number;
};

// getRandomNumber();

// *******************************************************************


// Exercice 22 : Rechercher un élément dans un tableau

/*

Objectif : Vérifier si un élément donné existe dans un tableau.

Consignes :
Crée une fonction rechercherElement($tableau, $element) qui vérifie si un élément est présent dans un tableau.
Utilise la fonction PHP in_array() pour faciliter la recherche.

*/

$mots = ["un", "maison", "oiseau", "Didi", "huit"];


function rechercherElement($tableau, $element) {
    if (in_array($element, $tableau)) {
        echo "Le tableau contient bien l'élément $element. <br />";
    } else {
        echo "Le tableau ne contient pas l'élément $element. <br />";
    }
};

// rechercherElement($mots, "maison");
// rechercherElement($mots, "coucou");


// *******************************************************************


// Exercice 23 : Trier un tableau de chaînes de caractères

/*

Objectif : Trier un tableau de chaînes de caractères en ordre alphabétique.

Consignes :
Crée une fonction trierTableauAlphabetique($tableau) qui prend un tableau de chaînes de caractères en paramètre et retourne le tableau trié.
Utilise la fonction sort().

*/

$tableauATrier = ['z', 'c', 'a', 'y', 't'];
$tableauVide = [];

function trierTableauAlphabetique($tableau) {

    if (count($tableau) > 0) {
        sort($tableau);

        foreach ($tableau as $key) {
            echo $key . "<br />";
        }

    } else {
        echo "Le tableau est vide. <br />";
    }



};

// trierTableauAlphabetique($tableauATrier);
// trierTableauAlphabetique($tableauVide);


// *******************************************************************


// Exercice 24 : Gestion d'une session

/*

Objectif : Créer et manipuler une session utilisateur.

Consignes :
Crée une session utilisateur pour stocker des informations comme le nom, l'âge et le statut de connexion.
Crée une fonction creerSession() qui initialise la session avec des données et une fonction afficherSession() qui affiche les données de la session.

*/

// Voir fichier exo24.php


// *******************************************************************


// Exercice 25 : Fusionner deux tableaux

/*

Objectif : Fusionner deux tableaux en un seul.

Consignes :
Crée une fonction fusionnerTableaux($tableau1, $tableau2) qui prend deux tableaux en paramètres et les fusionne en un seul.
Utilise la fonction PHP array_merge() pour effectuer la fusion.

*/

$tab1 = [1, 3, 8];
$tab2 = ['camion', 'chat', "oiseau"];

function fusionnerTableaux($tableau1, $tableau2) {
    $tab_fusionnes = array_merge($tableau1, $tableau2);

    print_r($tab_fusionnes);

};

// fusionnerTableaux($tab1, $tab2);



// *******************************************************************


// Exercice 26 : Déterminer la date et l'heure actuelles

/*

Objectif : Afficher la date et l'heure actuelles dans un format spécifique.

Consignes :
Crée une fonction afficherDate() qui affiche la date et l'heure actuelles au format jj/mm/aaaa hh:mm:ss.
Utilise la fonction PHP date().

*/

function afficherDate() {
    $date = date("d/m/Y H:i:s");

    echo $date;
};

// afficherDate();


// *******************************************************************


// Exercice 27 : Vérification d'un palindrome

/*

Objectif : Vérifier si une chaîne de caractères est un palindrome.

Consignes :
Crée une fonction estPalindrome($chaine) qui vérifie si une chaîne de caractères est identique lorsqu'elle est lue de gauche à droite et de droite à gauche.
Ignore les espaces et les majuscules/minuscules dans la vérification.

*/

function estPalindrome($string) {
    // minuscule
    $string = strtolower($string);

    // retire tous les espaces
    $string = str_replace(' ', '', $string);

    // retire caractères spéciaux
    $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string);

    // retourne la chaine de caractères
    $reverse = strrev($string);

    // verif si les 2 chaines sont égales
    if ($string == $reverse) {
        echo "$string est un palindrome. <br />";
    } 
    else {
        echo "$string n'est pas un palindrome. <br />";
    }
};

// estPalindrome("kayak");
// estPalindrome("chat");


// *******************************************************************


// Exercice 28 : Tri des prénoms en fonction de la longueur

/*

Objectif : Trier un tableau de prénoms en fonction de la longueur de chaque prénom.

Consignes :
Crée une fonction trierParLongueur($prenoms) qui trie un tableau de prénoms par longueur croissante.
Utilise la fonction usort() pour définir ton propre critère de tri.

*/

$tab_de_prenoms = ['Camille', 'Thomas', 'Isis', 'Didi', 'Penelope'];

function trierParLongueur($prenoms) {

    usort($prenoms, function($prenomA, $prenomB) {

        // Compare la longueur des prénoms
        return strlen($prenomA) - strlen($prenomB); 
    });

    return $prenoms;
}

// trierParLongueur($tab_de_prenoms);
// $prenomsTries = trierParLongueur($tab_de_prenoms);

// print_r($prenomsTries);


// *******************************************************************


// Exercice 29 : Conversion de devises

/*

Objectif : Convertir un montant d'une devise à une autre.

Consignes :
Crée une fonction convertirDevise($montant, $taux) qui prend un montant et un taux de conversion, puis retourne le montant converti dans une autre devise.
Par exemple, convertir des euros en dollars avec un taux de 1.1.

*/

$taux_de_conversion = 1.1;

function convertirDevise($montant, $taux) {
    $montant_euros = $montant;

    $montant_dollars = $montant_euros * $taux;

    echo "$montant_euros € donne $montant_dollars $. <br />";
};

// convertirDevise(35, $taux_de_conversion);
// convertirDevise(80, $taux_de_conversion);


// *******************************************************************


// Exercice 30 : Calcul des statistiques d'un tableau

/*

Objectif : Calculer la somme, la moyenne, le minimum et le maximum d’un tableau de nombres.

Consignes :
Crée une fonction calculerStatistiques($tableau) qui prend un tableau de nombres comme paramètre et retourne un tableau associatif contenant la somme, la moyenne, le minimum et le maximum des valeurs.
Utilise les fonctions PHP comme array_sum(), min(), max() pour t'aider, mais tu peux aussi essayer de les calculer manuellement en parcourant le tableau.

*/

$tab_de_nombres = [1, 8, 7, 9, 13];

function calculerStatistiques($tableau) {

    $somme = array_sum($tableau);

    $moyenne = $somme / count($tableau);

    $min = min($tableau);

    $max = max($tableau);

    $tab_associatif = [
        "somme" => $somme,
        "moyenne" => $moyenne,
        "minimum" => $min,
        "maximum" => $max,
    ];

    print_r($tab_associatif);

};

// calculerStatistiques($tab_de_nombres);
// calculerStatistiques([10, 80, 67, 91, 134]);


// *******************************************************************


// Exercice 31 : Vérification de nombre premier

/*

Objectif : Vérifier si un nombre est premier.

Consignes :
Crée une fonction estPremier($nombre) qui retourne true si le nombre est premier et false sinon.
Un nombre premier est un nombre qui n’a que deux diviseurs : 1 et lui-même.

*/

function estPremier($nombre) {
    // vérif que bien un nombre
    if (is_int($nombre)) {

        // Un nombre premier est toujours supérieur à 1
        if ($nombre <= 1) {
            echo "$nombre n'est pas premier. <br />";
            return false;
        }

        // Vérifier si le nombre a d'autres diviseurs que 1 et lui-même.
        // parcourt ensuite les nombres de 2 à la racine carrée du nombre donné (car un diviseur éventuel serait trouvé dans cet intervalle).
        for ($i = 2; $i <= sqrt($nombre); $i++) {
            // Si le nombre est divisible par un des nombres dans cet intervalle, il n'est pas premier.
            if ($nombre % $i == 0) {
                echo "$nombre n'est pas premier. <br />";
                return false;
            }
        }

        // Si aucun diviseur n'est trouvé, la fonction retourne true, le nombre est premier.
        echo "$nombre est premier. <br />";
        return true;


    } else {
        echo "Veuillez entrer un nombre.";
    }
};

// estPremier(7); // true
// estPremier(15); // false
// estPremier("pouet"); // false


// *******************************************************************


// Exercice 32 : Inversion d'une chaîne de caractères

/*

Objectif : Inverser une chaîne de caractères sans utiliser de fonction intégrée PHP.

Consignes :
Crée une fonction inverserChaine($chaine) qui prend une chaîne de caractères et retourne la chaîne inversée.
Utilise une boucle pour parcourir la chaîne et la réorganiser dans l’ordre inverse.

*/

function inverserChaine($chaine) {
    $chaine_inversee = '';

    // Parcourir la chaîne de la fin vers le début
    for ($i = strlen($chaine) - 1; $i >= 0; $i--) {
        $chaine_inversee .= $chaine[$i]; // Ajouter chaque caractère à la nouvelle chaîne
    }

    echo $chaine_inversee . "<br />"; // Retourner la chaîne inversée
};

function inverserChaineSansBoucle($chaine) {
    echo strrev($chaine);
};

inverserChaine("Thomas"); // samohT
inverserChaineSansBoucle("Pigeon"); // noegiP


?>