<?php 

    require_once "../../models/dbConnexion.php";
    class agence {
        private $db;

        function __construct() {
            $this->db = new database();
        }
        
        function getAgence() {
            try {
                $pdo = $this->db->returnDB();
                $sql = "select * from agence order by intitule";
                $req = $pdo -> prepare($sql);
                $req -> execute();
                $datas = $req -> fetchAll();
                
                return $datas;
            }catch(Exception $e) {
                echo "Erreur : ".$e->getMessage()."<br>A la ligne : ".$e->getLine();   
            }
        }
    }