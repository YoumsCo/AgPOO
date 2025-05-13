<?php 

    require_once "dbConnexion.php";
    
    class typebus {
        private $db;

        function __construct() {
            $this->db = new database();
        }

        function get_type_bus() {
            try {
                $pdo = $this->db->returnDB();
                $sql = "select * from typebus order by intitule";
                $req = $pdo -> prepare($sql);
                $req -> execute();
                $datas = $req -> fetchAll();

                return $datas;
            } catch(Exception $e) {
                echo "Erreur : ".$e->getMessage()."<br>A la ligne : ".$e->getLine()."<br>";
            }
        }
    }