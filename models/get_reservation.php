<?php 

    require_once "dbConnexion.php";
    require_once "get_villes.php";

    class reservation {
        private static $db;
        private static $villes;
        
        function __construct() {
            self::$db  = new database();
            self::$villes  = new villes();
        }

        function get_user_by_email($email) {
            $stmt = self::$db -> returnDB() -> prepare("select * from user where email = ?");
            $stmt -> execute([$email]);
            return $stmt->fetchAll();
        }
        
        function get_place() {
            $pdo = self::$db -> returnDB();
            try {
                $sql = "select * from reservation";
                $req = $pdo -> prepare($sql);
                $req -> execute();

                return $req -> fetchAll();
            } catch(Exception $e) {
                echo "Erreur : ".$e->getMessage()."<br>A la ligne : ".$e->getLine()."<br>";
            }
        }
        
        function check_if_place_choised($p, $r) {
            $places = $this->get_place();
            $found = false;
            foreach($places as $sit) {
                if ($sit['place'] == $p && $sit['reference'] == $r) {
                    $found = true;
                    break;
                }
            }
            return $found;
        }

        function check_if_exist_destination($d) {
            $town = self::$villes -> get_villes();
            $found = false;
            foreach($town as $city) {
                if ($city['intitule'] == $d) {
                    $found = true;
                    break;
                }
            }
            return $found;
        }

        function insert($iduser, $idmode, $nom, $prenom, $email, $place, $destination, $reference, $montant, $mode_paiement, $type_bus, $date_voyage, $statut) {

            $pdo = self::$db -> returnDB();
            $val = $this->check_if_place_choised($place, $reference);
            $ville = $this->check_if_exist_destination($destination);
            
            try {
                if ($val == false) {
                    if ($ville == true) {
                        $pdo -> beginTransaction();
    
                        $stmt = $pdo->prepare("insert into reservation(iduser, idmode, nom, prenom, email, place, destination, reference, montant, mode_paiement, type_bus, date_voyage, statut) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                        $stmt->execute([$iduser, $idmode, $nom, $prenom, $email, $place, $destination, $reference, $montant, $mode_paiement, $type_bus, $date_voyage, $statut]);
                        
                        $pdo -> commit();
                        
                        echo "<script>";
                        echo "alert('Reservation effectuée');";
                        echo "document.location.href = '../views/user/ticket.php';";
                        echo "</script>";
                    }
                    else {
                        echo "<script>";
                        echo "alert('Veuillez selectionner votre destination dans la liste');";
                        echo "document.location.href = '../views/user/reservation.php';";
                        echo "</script>";
                    }
                }
                else {
                    echo "<script>";
                    echo "alert('Place déjà prise');";
                    echo "document.location.href = '../views/user/reservation.php';";
                    echo "</script>";
                }
                
            } catch (Exception $e) {
                $pdo->rollBack();
                echo "<script>";
                echo "alert('Echec');";
                echo "</script>";
                echo "Erreur : " . $e->getMessage()."<>A la ligne : ".$e->getLine();
            }
        }
        
        function get_all_reservation_from_self($email) {
            $pdo = self::$db -> returnDB();
            try {
                $sql = "select * from reservation where email = ? order by date_voyage";
                $req = $pdo -> prepare($sql);
                $req -> execute([$email]);
    
                return $req -> fetchAll();
            } catch(Exception $e) {
                echo "Erreur : ".$e->getMessage()."<br>A la ligne : ".$e->getLine()."<br>";
            }
        }
    }