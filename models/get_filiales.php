<?php 

    require_once "dbConnexion.php";
    class filiales {
        private $db;

        function __construct() {
            $this->db = new database();
        }

        function getFiliale() {
            try {
                $pdo = $this->db->returnDB();
                $sql = "select * from filiale order by intitule";
                $req = $pdo -> prepare($sql);
                $req -> execute();
                $datas = $req -> fetchAll();

                return $datas;
            } catch(Exception $e) {
                echo "Erreur : ".$e->getMessage()."<br>A la ligne : ".$e->getLine()."<br>";
            }
        }
        
        function getFiliale_from_agency($id) {
            try {
                $pdo = $this->db->returnDB();
                $sql = "select * from filiale where intitule = ?";
                $req = $pdo -> prepare($sql);
                $req -> execute([$id]);
                $datas = $req -> fetchAll();
    
                return $datas;
            } catch(Exception $e) {
                echo "Erreur : ".$e->getMessage()."<br>A la ligne : ".$e->getLine()."<br>";   
            }
        }

        function get_reference($id) {
            try {
                $pdo = $this->db->returnDB();
                $sql = "select intitule from filiale where idfiliale = ?";
                $req = $pdo -> prepare($sql);
                $req -> execute([$id]);
                $datas = $req -> fetchAll();
                
                return $datas;
            }catch(Exception $e) {
                echo "Erreur : ".$e->getMessage()."<br>A la ligne : ".$e->getLine();   
            }
        }
    }