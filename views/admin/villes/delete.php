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
    
    if (!isset($_GET['idville'])) {
        header("location: towns_list.php");
    }
    
    $id = $_GET['idville'];
    
    $datas = new admin();
    $datas->crud("delete", "ville", "intitule","delete from ville where idville = ?", [$id], "Suppression effectuée", null, $_SERVER['HTTP_REFERER']);