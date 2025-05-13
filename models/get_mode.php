<?php 

    require_once "dbConnexion.php";
    class modes {
        private static $db;

        function __construct() {
            self::$db = new database();
        }

        function get_modes() {
            try {
                $pdo = self::$db->returnDB();
                $sql = "select * from mode order by intitule";
                $req = $pdo -> prepare($sql);
                $req -> execute();
                $datas = $req -> fetchAll();

                return $datas;
            } catch(Exception $e) {
                echo "Erreur : ".$e->getMessage()."<br>A la ligne : ".$e->getLine()."<br>";
            }
        }

        function get_idmode_by_intitule($intitule) {
            $pdo = self::$db -> returnDB();
            try {
                $sql = "select idmode from mode where intitule = ?";
                $req = $pdo-> prepare($sql);
                $req -> execute([$intitule]);

                return $req -> fetchAll();
            } catch(Exception $e) {
                echo "<script>alert('Erreur');</script>";
                echo "Erreur : " . $e->getMessage() . "<br> A la ligne " .$e -> getLine();
            }
        }
    }