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
    
    if (!isset($_GET['idmode'])) {
        header("location: modes_list.php");
    }
    
    $id = $_GET['idmode'];
    
    $datas = new admin();
    $datas->crud("delete", "mode", "intitule","delete from mode where idmode = ?", [$id], "Suppression effectuée", null, $_SERVER['HTTP_REFERER']);