<?php

    require_once "controllers.php";
    
    function testData($d) {
        $d = trim($d);
        $d = stripslashes($d);
        $d = strip_tags($d);
        $d = htmlspecialchars($d);

        return $d;
    }

    if(isset($_POST["sign"])) {
        if($_SERVER['REQUEST_METHOD'] === "POST") {

            if (isset($_POST["sexe"]) && $_POST["sexe"] === "masculin") {
                $sexe = "Masculin";

                if(preg_match("/^[a-zA-Z]{3,}[\']?[\-]?\s?[a-zA-Z]*\s?[a-zA-Z]*[1-9]?$/",$_POST['nom']) && strlen($_POST["nom"]) >= 3 && strlen($_POST["nom"]) <= 30) {
                    $_SESSION['nom'] = ucfirst(strtolower(testData($_POST["nom"])));
    
                    if(preg_match("/^[a-zA-Z]{3,}[\']?[\-]?\s?[a-zA-Z]*\s?[a-zA-Z]*[1-9]?$/",$_POST['prenom']) && strlen($_POST["prenom"]) >= 3 && strlen($_POST["prenom"]) <= 30) {
                        $_SESSION['prenom'] = ucfirst(strtolower(testData($_POST["prenom"])));

                        if(preg_match("/^\d{2}$/",$_POST['age']) && strlen($_POST["age"]) === 2 && $_POST["age"] >= 18) {
                            $age = testData($_POST["age"]);

                            if(preg_match("/^\+237\s[6](2|5|8|9)[0-9]{7}$/",$_POST['tel'])) {
                                $tel = testData($_POST["tel"]);

                                if(preg_match("/^[a-zA-Z]+\d*[a-zA-Z]*\d*[@](gmail|yahoo|outlook)[\.](com|fr)$/",$_POST['email']) && strlen($_POST['email']) <= 45 && strlen($_POST['email']) >= 10) {
                                    $_SESSION['email'] = strtolower(testData($_POST["email"]));
                                    
                                    if(strlen($_POST['password']) <= 30 && strlen($_POST['password']) >= 8) {
                                        $password = md5(testData($_POST["password"]));
                                        $role = "Utilisateur";

                                        $add = new users();
                                        $add -> insert($_SESSION['nom'], $_SESSION['prenom'], $age, $tel, $sexe, $_SESSION['email'], $password, $role);
                                    }
                                    else {
                                        echo "<script>";
                                        echo "alert('Mot de passe invalide');";
                                        echo "document.location.href = '../views/user/connexion.php';";
                                        echo "</script>";
                                    }
                                }
                                else {
                                    echo "<script>";
                                    echo "alert('Email invalide');";
                                    echo "document.location.href = '../views/user/connexion.php';";
                                    echo "</script>";
                                }
                            }
                            else {
                                echo "<script>";
                                echo "alert('Téléphone invalide!!\nRemarque: Il doit avoir un espce entre l'indicatif du pays et le numéro de téléphone);";
                                echo "document.location.href = '../views/user/connexion.php';";
                                echo "</script>";
                            }
                        }
                        else {
                            echo "<script>";
                            echo "alert('Age invalide');";
                            echo "document.location.href = '../views/user/connexion.php';";
                            echo "</script>";
                        }
                    }
                    else {
                        echo "<script>";
                        echo "alert('Prénom invalide');";
                        echo "document.location.href = '../views/user/connexion.php';";
                        echo "</script>";
                    }
                }
                else {
                    echo "<script>";
                    echo "alert('Nom invalide');";
                    echo "document.location.href = '../views/user/connexion.php';";
                    echo "</script>";
                }
            }

            elseif (isset($_POST["sexe"]) && $_POST["sexe"] === "feminin") {
                $sexe = "Féminin";

                if(preg_match("/^[a-zA-Z]{3,}[\']?[\-]?\s?[a-zA-Z]*\s?[a-zA-Z]*[1-9]?$/",$_POST['nom']) && strlen($_POST["nom"]) >= 3 && strlen($_POST["nom"]) <= 30) {
                    $_SESSION['nom'] = ucfirst(strtolower(testData($_POST["nom"])));
    
                    if(preg_match("/^[a-zA-Z]{3,}[\']?[\-]?\s?[a-zA-Z]*\s?[a-zA-Z]*[1-9]?$/",$_POST['prenom']) && strlen($_POST["prenom"]) >= 3 && strlen($_POST["prenom"]) <= 30) {
                        $_SESSION['prenom'] = ucfirst(strtolower(testData($_POST["prenom"])));

                        if(preg_match("/^\d{2}$/",$_POST['age']) && strlen($_POST["age"]) === 2 && $_POST["age"] >= 18) {
                            $age = testData($_POST["age"]);

                            if(preg_match("/^\+237\s[6](2|5|8|9)[0-9]{7}$/",$_POST['tel'])) {
                                $tel = testData($_POST["tel"]);

                                if(preg_match("/^[a-zA-Z]+\d*[a-zA-Z]*\d*[@](gmail|yahoo|outlook)[\.](com|fr)$/",$_POST['email']) && strlen($_POST['email']) <= 45 && strlen($_POST['email']) >= 10) {
                                    $_SESSION['email'] = strtolower(testData($_POST["email"]));
                                    
                                    if(strlen($_POST['password']) <= 30 && strlen($_POST['password']) >= 8) {
                                        $password = md5(testData($_POST["password"]));
                                        $role = "Utilisateur";

                                        $add = new users();
                                        $add -> insert($_SESSION['nom'], $_SESSION['prenom'], $age, $tel, $sexe, $_SESSION['email'], $password, $role);
                                    }
                                    else {
                                        echo "<script>";
                                        echo "alert('Mot de passe invalide');";
                                        echo "document.location.href = '../views/user/connexion.php';";
                                        echo "</script>";
                                    }
                                }
                                else {
                                    echo "<script>";
                                    echo "alert('Email invalide');";
                                    echo "document.location.href = '../views/user/connexion.php';";
                                    echo "</script>";
                                }
                            }
                            else {
                                echo "<script>";
                                echo "alert('Téléphone invalide!!\nRemarque: Il doit avoir un espce entre l'indicatif du pays et le numéro de téléphone);";
                                echo "document.location.href = '../views/user/connexion.php';";
                                echo "</scripalert>";
                            }
                        }
                        else {
                            echo "<script>";
                            echo "alert('Age invalide');";
                            echo "document.location.href = '../views/user/connexion.php';";
                            echo "</script>";
                        }
                    }
                    else {
                        echo "<script>";
                        echo "alert('Prénom invalide');";
                        echo "document.location.href = '../views/user/connexion.php';";
                        echo "</script>";
                    }
                }
                else {
                    echo "<script>";
                    echo "alert('Nom invalide');";
                    echo "document.location.href = '../views/user/connexion.php';";
                    echo "</script>";
                }
            }
            else {
                echo "<script>";
                echo "alert('Le sexe est obligatoire !');";
                echo "document.location.href = '../views/user/connexion.php';";
                echo "</script>";
            }
        }
    }

    elseif(isset($_POST["login"])) {
        if($_SERVER['REQUEST_METHOD'] === "POST") {
            if(preg_match("/^[a-zA-Z]{3,}[\']?[\-]?\s?[a-zA-Z]*\s?[a-zA-Z]*[1-9]?$/",$_POST['nom']) && strlen($_POST["nom"]) >= 3 && strlen($_POST["nom"]) <= 30) {
                $_SESSION['nom'] = ucfirst(strtolower(testData($_POST["nom"])));

                if(preg_match("/^[a-zA-Z]+\d*[a-zA-Z]*\d*[@](gmail|yahoo|outlook)[\.](com|fr)$/",$_POST['email']) && strlen($_POST['email']) <= 45 && strlen($_POST['email']) >= 10) {
                    $_SESSION['email'] = strtolower(testData($_POST["email"]));
                                
                    if(strlen($_POST['pass']) <= 30 && strlen($_POST['pass']) >= 8) {
                        $pass = md5(testData($_POST["pass"]));
                        
                        $select = new users();
                        $select->checkUser($_SESSION['nom'], $_SESSION['email'], $pass);
                    }
                    else {
                        echo "<script>";
                        echo "alert('Mot de passe invalide');";
                        echo "document.location.href = '../views/user/connexion.php';";
                        echo "</script>";
                    }
                }
                else {
                    echo "<script>";
                    echo "alert('Email invalide');";
                    echo "document.location.href = '../views/user/connexion.php';";
                    echo "</script>";
                }
            }
            else {
                echo "<script>";
                echo "alert('Nom invalide');";
                echo "document.location.href = '../views/user/connexion.php';";
                echo "</script>";
            }
        }
    }

    elseif(isset($_POST["update"])) {
        $_SESSION['last_email'] = $_SESSION['email'];
        if($_SERVER['REQUEST_METHOD'] === "POST") {

            if(preg_match("/^[a-zA-Z]{3,}[\']?[\-]?\s?[a-zA-Z]*\s?[a-zA-Z]*[1-9]?$/",$_POST['nom']) && strlen($_POST["nom"]) >= 3 && strlen($_POST["nom"]) <= 30) {
                $_SESSION['nom'] = ucfirst(strtolower(testData($_POST["nom"])));
    
                if(preg_match("/^[a-zA-Z]{3,}[\']?[\-]?\s?[a-zA-Z]*\s?[a-zA-Z]*[1-9]?$/",$_POST['prenom']) && strlen($_POST["prenom"]) >= 3 && strlen($_POST["prenom"]) <= 30) {
                    $_SESSION['prenom'] = ucfirst(strtolower(testData($_POST["prenom"])));

                    if(preg_match("/^\d{2}$/",$_POST['age']) && strlen($_POST["age"]) === 2 && $_POST["age"] >= 18) {
                        $age = testData($_POST["age"]);

                        if(preg_match("/^\+237\s[6](2|5|8|9)[0-9]{7}$/",$_POST['tel'])) {
                            $tel = testData($_POST["tel"]);

                            if(preg_match("/^[a-zA-Z]+\d*[a-zA-Z]*\d*[@](gmail|yahoo|outlook)[\.](com|fr)$/",$_POST['email']) && strlen($_POST['email']) <= 45 && strlen($_POST['email']) >= 10) {
                                $_SESSION['email'] = strtolower(testData($_POST["email"]));
                                    
                                if(strlen($_POST['password']) <= 30 && strlen($_POST['password']) >= 8) {
                                    $password = md5(testData($_POST["password"]));

                                    $update = new users();

                                    $users = $update -> get_iduser_by_email($_SESSION['last_email']);

                                    foreach($users as $user) {
                                        $iduser = $user['iduser'];
                                    }

                                    $update -> update($_SESSION['nom'], $_SESSION['prenom'], $age, $tel, $_SESSION['email'], $password, $iduser);
                                }
                                else {
                                    echo "<script>";
                                    echo "alert('Mot de passe invalide');";
                                    echo "document.location.href = '../views/user/update.php';";
                                    echo "</script>";
                                }
                            }
                            else {
                                echo "<script>";
                                echo "alert('Email invalide');";
                                echo "document.location.href = '../views/user/update.php';";
                                echo "</script>";
                            }
                        }
                        else {
                            echo "<script>";
                            echo "alert('Téléphone invalide!!\nRemarque: Il doit avoir un espce entre l'indicatif du pays et le numéro de téléphone);";
                            echo "document.location.href = '../views/user/update.php';";
                            echo "</script>";
                        }
                    }
                    else {
                        echo "<script>";
                        echo "alert('Age invalide');";
                        echo "document.location.href = '../views/user/update.php';";
                        echo "</script>";
                    }
                }
                else {
                    echo "<script>";
                    echo "alert('Prénom invalide');";
                    echo "document.location.href = '../views/user/update.php';";
                    echo "</script>";
                }
            }
            else {
                echo "<script>";
                echo "alert('Nom invalide');";
                echo "document.location.href = '../views/user/update.php';";
                echo "</script>";
            }
        }
    }