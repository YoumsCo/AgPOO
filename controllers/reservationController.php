<?php

    require_once "controllers.php";
        
    function testData($d) {
        $d = trim($d);
        $d = stripslashes($d);
        $d = strip_tags($d);
        $d = htmlspecialchars($d);

        return $d;
    }

    if(preg_match("/^[a-zA-Z]{3,}[\']?[\-]?\s?[a-zA-Z]*\s?[a-zA-Z]*[1-9]?$/",$_POST['nom']) && strlen($_POST["nom"]) >= 3 && strlen($_POST["nom"]) <= 30) {
        $_SESSION['nom'] = ucfirst(strtolower(testData($_POST["nom"])));

        if(preg_match("/^[a-zA-Z]{3,}[\']?[\-]?\s?[a-zA-Z]*\s?[a-zA-Z]*[1-9]?$/", $_POST['prenom']) && strlen($_POST["prenom"]) >= 3 && strlen($_POST["prenom"]) <= 30) {
            $_SESSION['prenom'] = ucfirst(strtolower(testData($_POST["prenom"])));

            if (preg_match("/^\d{1,2}$/", $_POST['place']) && $_POST["place"] > 0) {
                $_SESSION['place'] = testData($_POST["place"]);

                if (preg_match("/^[a-zA-Z]{4,}$/", $_POST['destination'])) {
                    $_SESSION['destination'] = testData($_POST["destination"]);
                    $_SESSION['reference'] = testData($_POST["reference"]);

                    if (preg_match("/^\d{4,}$/", $_POST['montant'])) {
                        $_SESSION['montant'] = testData($_POST["montant"]);
                        $_SESSION['mode'] = testData($_POST["mode"]);
                        $_SESSION['type'] = testData($_POST["type"]);
    
                        if (preg_match("/^\d{4}[-]\d{2}[-]\d{2}$/", $_POST['date'])) {
                            $_SESSION['date'] = testData($_POST["date"]);
                            $_SESSION['statut'] = "Valide";

                            $reservation = new reservation();
                            $modes = new modes();
                            $users = new users();

                            foreach($users -> get_iduser_by_email($_SESSION['email']) as $user) {
                                $iduser = $user['iduser'];
                            }

                            foreach($modes -> get_idmode_by_intitule($_SESSION['mode']) as $mode) {
                                $idmode = $mode['idmode'];
                            }

                            $reservation -> insert($iduser, $idmode, $_SESSION['nom'], $_SESSION['prenom'], $_SESSION['email'], $_SESSION['place'], $_SESSION['destination'], $_SESSION['reference'], $_SESSION['montant'], $_SESSION['mode'], $_SESSION['type'], $_SESSION['date'], $_SESSION['statut']);
                        }
                        else {
                            echo "<script>";
                            echo "alert('Date invalide');";
                            echo "document.location.href = '../views/user/reservation.php';";
                            echo "</script>";
                        }
                    }
                    else {
                        echo "<script>";
                        echo "alert('Montant invalide');";
                        echo "document.location.href = '../views/user/reservation.php';";
                        echo "</script>";
                    }
                }
                else {
                    echo "<script>";
                    echo "alert('Destination invalide');";
                    echo "document.location.href = '../views/user/reservation.php';";
                    echo "</script>";
                }
            }
            else {
                echo "<script>";
                echo "alert('Place invalide');";
                echo "document.location.href = '../views/user/reservation.php';";
                echo "</script>";
            }
        }
        else {
            echo "<script>";
            echo "alert('Prénom invalide');";
            echo "document.location.href = '../views/user/reservation.php';";
            echo "</script>";
        }
    }
    else {
        echo "<script>";
        echo "alert('Nom invalide');";
        echo "document.location.href = '../views/user/reservation.php';";
        echo "</script>";
    }
