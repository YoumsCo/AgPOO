<?php

    require_once "controllers.php";
        
    function testData($d) {
        $d = trim($d);
        $d = stripslashes($d);
        $d = strip_tags($d);
        $d = htmlspecialchars($d);

        return $d;
    }


    if(isset($_POST["insert"])) {
        
        if($_SERVER['REQUEST_METHOD'] === "POST") {

            if(preg_match("/^[a-zA-Z]{3,}[\']?[\-]?\s?[a-zA-Z]*\s?[a-zA-Z]*[1-9]?$/",$_POST['nom']) && strlen($_POST["nom"]) >= 3 && strlen($_POST["nom"]) <= 30) {
                $nom = ucfirst(strtolower(testData($_POST["nom"])));
    
                if(preg_match("/^[a-zA-Z]{3,}[\']?[\-]?\s?[a-zA-Z]*\s?[a-zA-Z]*[1-9]?$/",$_POST['prenom']) && strlen($_POST["prenom"]) >= 3 && strlen($_POST["prenom"]) <= 30) {
                    $prenom = ucfirst(strtolower(testData($_POST["prenom"])));

                    if(preg_match("/^\d{2}$/",$_POST['age']) && strlen($_POST["age"]) === 2 && $_POST["age"] >= 18) {
                        $age = testData($_POST["age"]);

                        if(preg_match("/^\+237\s[6](2|5|8|9)[0-9]{7}$/",$_POST['tel'])) {
                            $tel = testData($_POST["tel"]);

                            if(preg_match("/^[a-zA-Z]+\d*[a-zA-Z]*\d*[@](gmail|yahoo|outlook)[\.](com|fr)$/",$_POST['email']) && strlen($_POST['email']) <= 45 && strlen($_POST['email']) >= 10) {
                                $email = strtolower(testData($_POST["email"]));
                                    
                                if(strlen($_POST['password']) <= 30 && strlen($_POST['password']) >= 8) {
                                    $password = md5(testData($_POST["password"]));
                                    $role = "Administrateur";

                                    $admin = new admin();
                                    $sql = "insert into user(email, prenom, age, telephone, nom, password, role) values(?, ?, ?, ?, ?, ?, ?)";
                                    $params =  [$email, $prenom, $age, $tel, $nom, $password, $role];
                                    $admin -> crud("insert", "user", "email", $sql, $params, "Ajout effectué", "Cet administrateur existe déjà dans la base de données", "../views/superadmin/admins_list.php");
                                }
                                else {
                                    echo "<script>";
                                    echo "alert('Mot de passe invalide');";
                                    echo "document.location.href = '".$_SERVER['HTTP_REFERER']."';";
                                    echo "</script>";
                                }
                            }
                            else {
                                echo "<script>";
                                echo "alert('Email invalide');";
                                echo "document.location.href = '".$_SERVER['HTTP_REFERER']."';";
                                echo "</script>";
                            }
                        }
                        else {
                            echo "<script>";
                            echo "alert('Téléphone invalide!!\nRemarque: Il doit avoir un espce entre l'indicatif du pays et le numéro de téléphone);";
                            echo "document.location.href = '".$_SERVER['HTTP_REFERER']."';";
                            echo "</script>";
                        }
                    }
                    else {
                        echo "<script>";
                        echo "alert('Age invalide');";
                        echo "document.location.href = '".$_SERVER['HTTP_REFERER']."';";
                        echo "</script>";
                    }
                }
                else {
                    echo "<script>";
                    echo "alert('Prénom invalide');";
                    echo "document.location.href = '".$_SERVER['HTTP_REFERER']."';";
                    echo "</script>";
                }
            }
            else {
                echo "<script>";
                echo "alert('Nom invalide');";
                echo "document.location.href = '".$_SERVER['HTTP_REFERER']."';";
                echo "</script>";
            }
        }
    }


    elseif(isset($_POST["update"])) {
        
        if($_SERVER['REQUEST_METHOD'] === "POST") {

            if(preg_match("/^[a-zA-Z]{3,}[\']?[\-]?\s?[a-zA-Z]*\s?[a-zA-Z]*[1-9]?$/",$_POST['nom']) && strlen($_POST["nom"]) >= 3 && strlen($_POST["nom"]) <= 30) {
                $nom = ucfirst(strtolower(testData($_POST["nom"])));
    
                if(preg_match("/^[a-zA-Z]{3,}[\']?[\-]?\s?[a-zA-Z]*\s?[a-zA-Z]*[1-9]?$/",$_POST['prenom']) && strlen($_POST["prenom"]) >= 3 && strlen($_POST["prenom"]) <= 30) {
                    $prenom = ucfirst(strtolower(testData($_POST["prenom"])));

                    if(preg_match("/^\d{2}$/",$_POST['age']) && strlen($_POST["age"]) === 2 && $_POST["age"] >= 18) {
                        $age = testData($_POST["age"]);

                        if(preg_match("/^\+237\s[6](2|5|8|9)[0-9]{7}$/",$_POST['tel'])) {
                            $tel = testData($_POST["tel"]);

                            if(preg_match("/^[a-zA-Z]+\d*[a-zA-Z]*\d*[@](gmail|yahoo|outlook)[\.](com|fr)$/",$_POST['email']) && strlen($_POST['email']) <= 45 && strlen($_POST['email']) >= 10) {
                                $email = strtolower(testData($_POST["email"]));
                                    
                                if(strlen($_POST['password']) <= 30 && strlen($_POST['password']) >= 8) {
                                    $password = md5(testData($_POST["password"]));
                                    $role = "Administrateur";

                                    if (!isset($_GET['iduser'])) {
                                        header("location: ".$_SERVER['HTTP_REFERER']);
                                    }
                                    $id = $_GET["iduser"];
                                    $admin = new admin();
                                    $sql = "update user set email = ?, prenom = ?, age = ?, telephone = ?, nom = ?, password = ?, role = ? where iduser = ?";
                                    $params =  [$email, $prenom, $age, $tel, $nom, $password, $role, $id];
                                    $admin -> crud("update", "user", "email", $sql, $params, "Modification effectuée", "Cet administrateur existe déjà dans la base de données", "../views/superadmin/admins_list.php");
                                }
                                else {
                                    echo "<script>";
                                    echo "alert('Mot de passe invalide');";
                                    echo "document.location.href = '".$_SERVER['HTTP_REFERER']."';";
                                    echo "</script>";
                                }
                            }
                            else {
                                echo "<script>";
                                echo "alert('Email invalide');";
                                echo "document.location.href = '".$_SERVER['HTTP_REFERER']."';";
                                echo "</script>";
                            }
                        }
                        else {
                            echo "<script>";
                            echo "alert('Téléphone invalide!!\nRemarque: Il doit avoir un espce entre l'indicatif du pays et le numéro de téléphone);";
                            echo "document.location.href = '".$_SERVER['HTTP_REFERER']."';";
                            echo "</script>";
                        }
                    }
                    else {
                        echo "<script>";
                        echo "alert('Age invalide');";
                        echo "document.location.href = '".$_SERVER['HTTP_REFERER']."';";
                        echo "</script>";
                    }
                }
                else {
                    echo "<script>";
                    echo "alert('Prénom invalide');";
                    echo "document.location.href = '".$_SERVER['HTTP_REFERER']."';";
                    echo "</script>";
                }
            }
            else {
                echo "<script>";
                echo "alert('Nom invalide');";
                echo "document.location.href = '".$_SERVER['HTTP_REFERER']."';";
                echo "</script>";
            }
        }
    }