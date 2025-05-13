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
    
    if (!isset($_GET['idtypebus'])) {
        header("location: bustype_list.php");
    }
    
    $id = $_GET['idtypebus'];
    
    $datas = new admin();
    $datas->crud("delete", "typebus", "intitule","delete from typebus where idtypebus = ?", [$id], "Suppression effectuée", null, $_SERVER['HTTP_REFERER']);