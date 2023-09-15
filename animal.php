<?php
session_start();
// de creer la classe Utilisateur avec les proprietes:
// nom, prenom, email, mot de passe
// les methodes : inscription, connexion, deconnexion
include "database.php";
class Animal
{
  
    private $type;
      private $name;
    private $breed;



    public function __construct($type ,$name,  $breed)
    {

        $this->type = $type;
        $this->name = $name;

        $this->breed = $breed;

    }
    // methode inscription
    public function inscription()
    {
        // creer une instance DbConnect
        $dbConnect = new DbConnect();
        // se conecter a la bd
        $db = $dbConnect->dbConnexion(); // methode 1
        // $db = $dbConnect->connexionDataBase; // methode 2
        // preparer la requete
        $request = $db->prepare("INSERT INTO `animal`(`type`, `name`, `breed`) VALUES (?,?,?)");
        try {
            // executer la requete
            $request->execute(array($this->type, $this->name, $this->breed));
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    // une methode stiatique c'est une methode qui appartient a la elle meme et pas aux instances de cette classe
    // une methode statique peut etre executer sans instancier la classe qui l'encapsule

    // // methode connexion
    // public static function connexion($email, $password)
    // {
    //     // creer une instance DbConnect
    //     $dbConnect = new DbConnect();
    //     $db = $dbConnect->dbConnexion();
    //     // preparer la requete 
    //     $request = $db->prepare("SELECT * FROM utilisateur WHERE email=?");

    //     // executer la requete
    //     try {
    //         $request->execute(array($email));
    //         $user = $request->fetch();

    //         if (empty($user)) {
    //             echo "utilisateur inconnu";
    //         } else {
    //             if (password_verify($password, $user['password'])) {
    //                 // creation des variables de session et de redirection vers la bonne page
    //                 $_SESSION['prenom'] = $user['prenom']; // prenom ça vient du tableau $user qui est reference à ce qu'il ya dans la base de donnes
    //                 header("Location:acceuil.php");
    //             } else {
    //                 echo "mot de passe incorrect";
    //             }
    //         }

    //     } catch (PDOException $e) {
    //         echo $e->getMessage();
    //     }

    // }

}