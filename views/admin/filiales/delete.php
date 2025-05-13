<?php 

    require_once "../../../models/get_admin.php";

    if ($_SESSION["access"] != "oui") {
        header("location: ../../user/connexion.php");
        
        if ($_SESSION["superadmin"][1] != true) {
            header("location: ../../user/connexion.php");
        }
        if ($_SESSION["admin"][1] != true) {
            header("location: ../../user/connexion.php");
        }
    }
    
    if (!isset($_GET['idfiliale'])) {
        header("location: filiales_list.php");
    }
    
    $id = $_GET['idfiliale'];
    
    $datas = new admin();
    $datas->crud("delete", "filiale", "intitule","delete from filiale where idfiliale = ?", [$id], "Suppression effectuée", null, $_SERVER['HTTP_REFERER']);