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
    
    if (!isset($_GET['idreservation'])) {
        header("location: reservations_list.php");
    }
    
    $id = $_GET['idreservation'];
    
    $datas = new admin();
    $datas->crud("delete", "reservation", "place", "delete from reservation where idreservation = ?", [$id], "Suppression effectuée", null, $_SERVER['HTTP_REFERER']);