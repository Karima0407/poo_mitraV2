<?php
// require_once "utilisateur.php";
// if(isset($_POST['inscription'])){
//     $nom = $_POST['nom'];
//     $prenom = $_POST['prenom'];
//     $email = $_POST['email'];
//     $password = $_POST['mdp'];

//     $mdp = password_hash($password, PASSWORD_DEFAULT);
//     $user = new Utilisateur($nom, $prenom, $email, $mdp);
//     $user->inscription();
// }

// if (isset($_POST['connexion'])){
//     $email=$_POST['email'];
//     $password=$_POST['mdp'];
//     // appel de la methode statique connnexion
//     Utilisateur::connexion($email,$password);
// }

// Mitra:
//fichier action.php
// Validation du formulaire d'animal 
require_once("./AnimalRepository.php");

if (isset($_POST['submit'])) {
    // récupération des données saisies par l'utilisateur dans le formulaire d'animal
    $name = htmlspecialchars($_POST['name']);
    $type = htmlspecialchars($_POST['type']);
    $breed = htmlspecialchars($_POST['breed']);

    // on appel le constructeur
    $animal = new AnimalRepository($type,$name,  $breed);
    $animal->insert();
}

// $_POST: toujours un tableau indexé.