<?php

    require_once "controllers.php";
    
    function testData($d) {
        $d = trim($d);
        $d = stripslashes($d);
        $d = strip_tags($d);
        $d = htmlspecialchars($d);

        return $d;
    }

    // **********************************************************************************
    // Agences
    // **********************************************************************************
    
    if(isset($_POST["insert"])) {
        if($_SERVER['REQUEST_METHOD'] === "POST") {
            
                if(preg_match("/^[a-zA-Z]{3,}\s?[a-zA-Z]*\s?[a-zA-Z]*$/",$_POST['intitule']) && strlen($_POST["intitule"]) >= 3 && strlen($_POST["intitule"]) <= 30) {
                    $intitule = ucfirst(strtoupper(testData($_POST["intitule"])));
                    
                    if(preg_match("/^[6]\d{8}$/",$_POST['telephone']) && strlen($_POST["telephone"]) == 9) {
                        $tel = testData($_POST["telephone"]);
                        
                        // if(preg_match("/^[a-zA-Z]+\d*[a-zA-Z]*\d*[@](gmail|yahoo|outlook)[\.](com|fr)$/",$_POST['email']) && strlen($_POST["email"]) && $_POST["email"] >= 10 && strlen($_POST["email"]) <= 55) {
                        if(isset($_POST["email"])) {
                            $email = testData(strtolower($_POST["email"]));
                            $adresse = testData($_POST["adresse"]);
                            $image = testData($_POST["image"]);
                            
                            $admin = new admin();
                            $sql = "insert into agence (intitule, telephone, email, adresse, image) values(?, ?, ?, ?, ?)";
                            $params =  [$intitule, $tel, $email, $adresse, $image];
                            $admin -> crud("insert", "agence", "intitule", $sql, $params, "Ajout effectué", "Cette agence existe déjà dans la base de données", "../views/admin/agences/agencies_list.php");
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
                        echo "alert('Téléphone invalide');";
                        echo "document.location.href = '".$_SERVER['HTTP_REFERER']."';";
                        echo "</script>";
                    }
                }
                else {
                    echo "<script>";
                    echo "alert('Intitule invalide');";
                    echo "document.location.href = '".$_SERVER['HTTP_REFERER']."';";
                    echo "</script>";
                }
            }
    }

    elseif(isset($_POST["update"])) {
        if($_SERVER['REQUEST_METHOD'] === "POST") {
            
            if(preg_match("/^[a-zA-Z]{3,}\s?[a-zA-Z]*\s?[a-zA-Z]*$/",$_POST['intitule']) && strlen($_POST["intitule"]) >= 3 && strlen($_POST["intitule"]) <= 30) {
                $intitule = ucfirst(strtoupper(testData($_POST["intitule"])));
                
                if(preg_match("/^[6]\d{8}$/",$_POST['telephone']) && strlen($_POST["telephone"]) == 9) {
                        $tel = testData($_POST["telephone"]);

                        // if(preg_match("/^[a-zA-Z]+\d*[a-zA-Z]*\d*[@](gmail|yahoo|outlook)[\.](com|fr)$/",$_POST['email']) && strlen($_POST["email"]) && $_POST["email"] >= 10 && strlen($_POST["email"]) <= 55) {
                            if(isset($_POST["email"])) {
                                $email = testData(strtolower($_POST["email"]));
                            $adresse = testData($_POST["adresse"]);
                            $image = testData($_POST["image"]);
                            $id = $_GET['idagence'];
                            
                            $admin = new admin();
                            $sql = "update agence set intitule = ?, telephone = ?, email = ?, adresse = ?, image = ? where idagence = ?";
                            $params =  [$intitule, $tel, $email, $adresse, $image, $id];
                            $admin -> crud("update", "agence", "intitule", $sql, $params, "Modification effectuée", "Cette agence existe déjà dans la base de données", "../views/admin/agences/agencies_list.php");
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
                        echo "alert('Téléphone invalide');";
                        echo "document.location.href = '".$_SERVER['HTTP_REFERER']."';";
                        echo "</script>";
                    }
                }
                else {
                    echo "<script>";
                    echo "alert('Intitule invalide');";
                    echo "document.location.href = '".$_SERVER['HTTP_REFERER']."';";
                    echo "</script>";
                }
        }
    }

    // **********************************************************************************
    // Filiales 
    // **********************************************************************************
    
    if(isset($_POST["insert_filiale"])) {
        if($_SERVER['REQUEST_METHOD'] === "POST") {
            
            if(preg_match("/^[a-zA-Z]{3,}\s?[a-zA-Z]*\s?[a-zA-Z]*$/",$_POST['intitule']) && strlen($_POST["intitule"]) >= 3 && strlen($_POST["intitule"]) <= 30) {
                $intitule = ucfirst(strtoupper(testData($_POST["intitule"])));
                    
                if(preg_match("/^[6]\d{8}$/",$_POST['telephone']) && strlen($_POST["telephone"]) == 9) {
                    $tel = testData($_POST["telephone"]);
                        
                    // if(preg_match("/^[a-zA-Z]+\d*[a-zA-Z]*\d*[@](gmail|yahoo|outlook)[\.](com|fr)$/",$_POST['email']) && strlen($_POST["email"]) && $_POST["email"] >= 10 && strlen($_POST["email"]) <= 55) {
                    if(isset($_POST["email"])) {
                        $email = testData(strtolower($_POST["email"]));
                        $adresse = testData($_POST["adresse"]);
                        
                        $admin = new admin();
                        $sql = "insert into filiale (intitule, telephone, email, adresse) values(?, ?, ?, ?)";
                        $params =  [$intitule, $tel, $email, $adresse];
                        $admin -> crud("insert", "filiale", "intitule", $sql, $params, "Ajout effectué", "Cette filiale existe déjà dans la base de données", "../views/admin/filiales/filiales_list.php");
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
                    echo "alert('Téléphone invalide');";
                    echo "document.location.href = '".$_SERVER['HTTP_REFERER']."';";
                    echo "</script>";
                }
            }
            else {
                echo "<script>";
                echo "alert('Intitule invalide');";
                echo "document.location.href = '".$_SERVER['HTTP_REFERER']."';";
                echo "</script>";
            }
        }
    }

    elseif(isset($_POST["update_filiale"])) {
        if($_SERVER['REQUEST_METHOD'] === "POST") {
            if(preg_match("/^[a-zA-Z]{3,}\s?[a-zA-Z]*\s?[a-zA-Z]*$/",$_POST['intitule']) && strlen($_POST["intitule"]) >= 3 && strlen($_POST["intitule"]) <= 30) {
                $intitule = ucfirst(strtoupper(testData($_POST["intitule"])));
                
                if(preg_match("/^[6]\d{8}$/",$_POST['telephone']) && strlen($_POST["telephone"]) == 9) {
                    $tel = testData($_POST["telephone"]);

                    // if(preg_match("/^[a-zA-Z]+\d*[a-zA-Z]*\d*[@](gmail|yahoo|outlook)[\.](com|fr)$/",$_POST['email']) && strlen($_POST["email"]) && $_POST["email"] >= 10 && strlen($_POST["email"]) <= 55) {
                    if(isset($_POST["email"])) {
                        $email = testData(strtolower($_POST["email"]));
                        $adresse = testData($_POST["adresse"]);
                        $id = $_GET['idfiliale'];
                        
                        $admin = new admin();
                        $sql = "update filiale set intitule = ?, telephone = ?, email = ?, adresse = ? where idfiliale = ?";
                        $params =  [$intitule, $tel, $email, $adresse, $id];
                        $table = "filiale";
                        $admin -> crud("update", $table, "intitule", $sql, $params, "Modification effectuée", "Cette filiale existe déjà dans la base de données", "../views/admin/filiales/filiales_list.php");
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
                    echo "alert('Téléphone invalide');";
                    echo "document.location.href = '".$_SERVER['HTTP_REFERER']."';";
                    echo "</script>";
                }
            }
            else {
                echo "<script>";
                echo "alert('Intitule invalide');";
                echo "document.location.href = '".$_SERVER['HTTP_REFERER']."';";
                echo "</script>";
            }
        }
    }



    // **********************************************************************************
    // Modes 
    // **********************************************************************************
    
    if(isset($_POST["insert_mode"])) {
        if($_SERVER['REQUEST_METHOD'] === "POST") {
            
            if(preg_match("/^[a-zA-Z]{3,}\s?[a-zA-Z]*\s?[a-zA-Z]*$/",$_POST['intitule']) && strlen($_POST["intitule"]) >= 3 && strlen($_POST["intitule"]) <= 30) {
                $intitule = ucfirst(strtoupper(testData($_POST["intitule"])));
                        
                $admin = new admin();
                $sql = "insert into mode(intitule) values(?)";
                $params =  [$intitule];
                $admin -> crud("insert", "mode", "intitule", $sql, $params, "Ajout effectué", "Ce mode existe déjà dans la base de données", "../views/admin/modes/modes_list.php");
            }
            else {
                echo "<script>";
                echo "alert('Intitule invalide');";
                echo "document.location.href = '".$_SERVER['HTTP_REFERER']."';";
                echo "</script>";
            }
        }
    }

    elseif(isset($_POST["update_mode"])) {
        if($_SERVER['REQUEST_METHOD'] === "POST") {
            if(preg_match("/^[a-zA-Z]{3,}\s?[a-zA-Z]*\s?[a-zA-Z]*$/",$_POST['intitule']) && strlen($_POST["intitule"]) >= 3 && strlen($_POST["intitule"]) <= 30) {
                $intitule = ucfirst(strtoupper(testData($_POST["intitule"])));
                $id = $_GET['idmode'];
                        
                $admin = new admin();
                $sql = "update mode set intitule = ? where idmode = ?";
                $params =  [$intitule, $id];
                $table = "mode";
                $column = "intitule";
                $admin -> crud("update", $table, $column, $sql, $params, "Modification effectuée", "Ce mode existe déjà dans la base de données", "../views/admin/modes/modes_list.php");
            }
            else {
                echo "<script>";
                echo "alert('Intitule invalide');";
                echo "document.location.href = '".$_SERVER['HTTP_REFERER']."';";
                echo "</script>";
            }
        }
    }


    
    // **********************************************************************************
    // Reservations 
    // **********************************************************************************
    
    if(isset($_POST["update_reservation"])) {
        if($_SERVER['REQUEST_METHOD'] === "POST") {
            if(preg_match("/^\d{1,2}$/", $_POST['place'])) {
                $place = testData($_POST["place"]);
                $id = $_GET['idreservation'];
                        
                $admin = new admin();
                $sql = "update reservation set place = ? where idreservation = ?";
                $params =  [$place, $id];
                $table = "reservation";
                $column = "place";
                $admin -> crud("update", $table, $column, $sql, $params, "Modification effectuée", "Cette place est déjà prise", "../views/admin/reservations/reservations_list.php");
            }
            else {
                echo "<script>";
                echo "alert('Place invalide');";
                echo "document.location.href = '".$_SERVER['HTTP_REFERER']."';";
                echo "</script>";
            }
        }
    }

    
    // **********************************************************************************
    // Typebus 
    // **********************************************************************************

    if(isset($_POST["insert_type"])) {
        if($_SERVER['REQUEST_METHOD'] === "POST") {
            
            if(preg_match("/^[a-zA-Z]{3,}\s?[a-zA-Z]*\s?[a-zA-Z]*$/",$_POST['intitule']) && strlen($_POST["intitule"]) >= 3 && strlen($_POST["intitule"]) <= 30) {
                $intitule = ucfirst(strtoupper(testData($_POST["intitule"])));
                
                if(preg_match("/^\d{4,5}$/",$_POST['tarif'])) {
                    $tarif = testData($_POST["tarif"]);
                            
                    $admin = new admin();
                    $sql = "insert into typebus(intitule, tarif) values(?, ?)";
                    $params =  [$intitule, $tarif];
                    $admin -> crud("insert", "typebus", "intitule", $sql, $params, "Ajout effectué", "Ce type de bus existe déjà dans la base de données", "../views/admin/typebus/bustype_list.php");
                }
                else {
                    echo "<script>";
                    echo "alert('Tarif invalide');";
                    echo "document.location.href = '".$_SERVER['HTTP_REFERER']."';";
                    echo "</script>";
                }
            }
            else {
                echo "<script>";
                echo "alert('Intitule invalide');";
                echo "document.location.href = '".$_SERVER['HTTP_REFERER']."';";
                echo "</script>";
            }
        }
    }
    
    if(isset($_POST["update_type"])) {
        if($_SERVER['REQUEST_METHOD'] === "POST") {
            if(preg_match("/^[a-zA-Z]{3,}\s?[a-zA-Z]*\s?[a-zA-Z]*$/", $_POST['intitule'])) {
                $intitule = ucfirst(strtoupper(testData($_POST["intitule"])));

                if(preg_match("/^\d{4,5}$/", $_POST['tarif'])) {
                    $tarif = testData($_POST["tarif"]);
                    $id = $_GET['idtypebus'];
                            
                    $admin = new admin();
                    $sql = "update typebus set intitule = ?, tarif = ? where idtypebus = ?";
                    $params =  [$intitule, $tarif, $id];
                    $table = "typebus";
                    $column = "intitule";
                    $admin -> crud("update", $table, $column, $sql, $params, "Modification effectuée", "Ce type de bus existe déjà dans notre base de données", "../views/admin/typebus/bustype_list.php");
                }
                else {
                    echo "<script>";
                    echo "alert('Tarif invalide');";
                    echo "document.location.href = '".$_SERVER['HTTP_REFERER']."';";
                    echo "</script>";
                }
            }
            else {
                echo "<script>";
                echo "alert('Ville invalide');";
                echo "document.location.href = '".$_SERVER['HTTP_REFERER']."';";
                echo "</script>";
            }
        }
    }

    
    // **********************************************************************************
    // Villes 
    // **********************************************************************************
    
    if(isset($_POST["insert_ville"])) {
        if($_SERVER['REQUEST_METHOD'] === "POST") {
            
            if(preg_match("/^[a-zA-Z]{3,}\s?[a-zA-Z]*\s?[a-zA-Z]*$/",$_POST['intitule']) && strlen($_POST["intitule"]) >= 3 && strlen($_POST["intitule"]) <= 30) {
                $intitule = ucfirst(strtoupper(testData($_POST["intitule"])));
                
                if(preg_match("/^\d{4,6}$/",$_POST['montant'])) {
                    $montant = testData($_POST["montant"]);
                            
                    $admin = new admin();
                    $sql = "insert into ville(intitule, montant) values(?, ?)";
                    $params =  [$intitule, $montant];
                    $admin -> crud("insert", "ville", "intitule", $sql, $params, "Ajout effectué", "Cette ville existe déjà dans la base de données", "../views/admin/villes/towns_list.php");
                }
                else {
                    echo "<script>";
                    echo "alert('Montant invalide');";
                    echo "document.location.href = '".$_SERVER['HTTP_REFERER']."';";
                    echo "</script>";
                }
            }
            else {
                echo "<script>";
                echo "alert('Intitule invalide');";
                echo "document.location.href = '".$_SERVER['HTTP_REFERER']."';";
                echo "</script>";
            }
        }
    }

    if(isset($_POST["update_ville"])) {
        if($_SERVER['REQUEST_METHOD'] === "POST") {
            if(preg_match("/^[a-zA-Z]{3,}\s?[a-zA-Z]*\s?[a-zA-Z]*$/", $_POST['intitule'])) {
                $intitule = ucfirst(strtoupper(testData($_POST["intitule"])));

                if(preg_match("/^\d{4,6}$/", $_POST['montant'])) {
                    $montant = testData($_POST["montant"]);
                    $id = $_GET['idville'];
                            
                    $admin = new admin();
                    $sql = "update ville set intitule = ?, montant = ? where idville = ?";
                    $params =  [$intitule, $montant, $id];
                    $table = "ville";
                    $column = "intitule";
                    $admin -> crud("update", $table, $column, $sql, $params, "Modification effectuée", "Cette ville existe déjà dans notre base de données", "../views/admin/villes/towns_list.php");
                }
                else {
                    echo "<script>";
                    echo "alert('Montant invalide');";
                    echo "document.location.href = '".$_SERVER['HTTP_REFERER']."';";
                    echo "</script>";
                }
            }
            else {
                echo "<script>";
                echo "alert('Ville invalide');";
                echo "document.location.href = '".$_SERVER['HTTP_REFERER']."';";
                echo "</script>";
            }
        }
    }