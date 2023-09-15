<?php
session_start();
// de creer la classe Utilisateur avec les proprietes:
// nom, prenom, email, mot de passe
// les methodes : inscription, connexion, deconnexion
include "./inc/database.php";
class Utilisateur{
    private $name;
    private $firstname;
    private $email;
    private $password;


    public function __construct($name, $firstname, $email, $password){
        $this->name = $name;
        $this->firstname = $firstname;
        $this->email = $email;
        $this->password = $password;
    }
    // methode inscription
    public  function inscription(){
        // creer une instance DbConnect
        $dbConnect = new DbConnect();
        // se conecter a la bd
        $db = $dbConnect->dbConnexion(); // methode 1
        // $db = $dbConnect->connexionDataBase; // methode 2
        // preparer la requete
        $request = $db->prepare("INSERT INTO `utilisateur`(`name`, `firstname`, `email`, `password`) VALUES (?,?,?,?)");
        try{
            // executer la requete
            $request->execute(array($this->name, $this->firstname, $this->email, $this->password));
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    // une methode stiatique c'est une methode qui appartient a la elle meme et pas aux instances de cette classe
    // une methode statique peut etre executer sans instancier la classe qui l'encapsule

    // methode connexion
    public static function connexion($email, $password){
        // creer une instance DbConnect
        $dbConnect = new DbConnect();
        $db = $dbConnect->dbConnexion();
        // preparer la requete 
        $request=$db-> prepare ("SELECT * FROM utilisateur WHERE email=?");

        // executer la requete
        try{
            $request->execute(array($email));
            $user=$request->fetch();

            if(empty($user)){
                echo "utilisateur inconnu";
            }else{
                if(password_verify($password , $user['password'])){
                   // creation des variables de session et de redirection vers la bonne page
                   $_SESSION['prenom']=$user['prenom']; // prenom ça vient du tableau $user qui est reference à ce qu'il ya dans la base de donnes
                    header("Location:acceuil.php");
                }else{
                    echo "mot de passe incorrect";
                }
            }

        }catch(PDOException $e){
            echo $e->getMessage();
        }
           
    }

}
