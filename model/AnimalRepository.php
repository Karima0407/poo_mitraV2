<?php
// require_once "../animal.php";
// if (isset($_POST['envoi'])) {
   
//     $type = $_POST['type'];
//      $name = $_POST['name'];
//     $breed = $_POST['breed'];
  

   
//     $user = new Animal( $type,$name,  $breed);
//     $user->inscription();
// }

require_once "../inc/database.php";

require_once("../inc/functions.php");
class AnimalRepository
{

    private $id_animal;
    private $type;
    private $name;
    
    private $breed;

    public function __construct( $type,$name, $breed)
    {
        
        $this->type = $type;
        $this->name = $name;
        $this->breed = $breed;
    }

    public function insert()
    {
        // Créer une instance DbConnect
        $db = new dbConnect();

        // se connecter à la bd
        $connexionDb = $db->dbConnexion(); // methode 1
        // $db = $dbConnect->connexioDataBase; // methode 2

        //préparation de la requête
        $request = $connexionDb->prepare("INSERT INTO animal (type, name, breed) VALUES (?, ?, ?) ");

        //exécution de la requete
        try { // essayer d'enregister les infos dans la table animal
            $request->execute(array( $this->type,$this->name , $this->breed));
        } catch (PDOException $e) {
            echo $e->getMessage(); // afficher l'erreur sql généré
        }
    }

    public function findAll(){
        // Créer une instance DbConnect
        $db = new dbConnect();
        
        // se connecter à la bd
        $connexionDb = $db->dbConnexion(); // methode 1
        // $db = $dbConnect->connexioDataBase; // methode 2
        
        //préparation de la requête
        $request = $connexionDb->prepare("SELECT * FROM animal");

        //exécution de la requete
        try{ // essayer d'enregister les infos dans la table utilisateur
            $request->execute();
            $animaux = $request->fetchAll(PDO::FETCH_ASSOC);
            
        }catch(PDOException $e){
            echo $e->getMessage(); // afficher l'erreur sql généré
        }

    }
}