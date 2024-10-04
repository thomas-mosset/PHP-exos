<?php

session_start();

// Exercice 24 : Gestion d'une session

/*

Objectif : Créer et manipuler une session utilisateur.

Consignes :
Crée une session utilisateur pour stocker des informations comme le nom, l'âge et le statut de connexion.
Crée une fonction creerSession() qui initialise la session avec des données et une fonction afficherSession() qui affiche les données de la session.

*/

function creerSession() {
    $_SESSION['name'] = 'Thomas';
    $_SESSION['age'] = 29;
    $_SESSION['is_logged'] = true;
};

creerSession();

function afficherSession() {
    $id_session = session_id();
    $name = $_SESSION['name'];
    $age = $_SESSION['age'];
    $is_logged = $_SESSION['is_logged'];

    echo "Données de la session : <br/>";
    echo "ID : $id_session ; <br/>";
    echo "Nom : $name ; <br/>";
    echo "Age : $age  ; <br/>";

    if ($is_logged) {
        echo 'Est connecté : oui ;';
    } else {
        echo 'Est connecté : non ;';
    }
};

afficherSession();

?>