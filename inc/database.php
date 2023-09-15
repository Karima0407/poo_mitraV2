<?php
class DbConnect
{
    // public $connexionDataBase;

    // public function __construct(){
    //     try{
    //         $this->connexionDataBase = new PDO("mysql:host=localhost;dbname=animalerie", "root", "");
    //     }catch(PDOException $e){
    //         $this->connexionDataBase = $e->getMessage();
    //     }
    // }

    public function dbConnexion()
    {
        $conn = null;
        try {
            $conn = new PDO("mysql:host=localhost;dbname=animalerie", "root", "");
        } catch (PDOException $e) {
            $conn = $e->getMessage();
        }
        return $conn;
    }
}