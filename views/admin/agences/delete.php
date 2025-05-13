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
    
    if (!isset($_GET['idagence'])) {
        header("location: agencies_list.php");
    }
    
    $id = $_GET['idagence'];
    
    $datas = new admin();
    $datas->crud("delete", "agence", "intitule", "delete from agence where idagence = ?", [$id], "Suppression effectuée", null, $_SERVER['HTTP_REFERER']);