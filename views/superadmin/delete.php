<?php 

    require_once "../../models/get_admin.php";

    if ($_SESSION["access"] != "oui") {
        header("location: ../user/connexion.php");
        
        if ($_SESSION["superadmin"][1] != true) {
            header("location: admins_list.php");
        }
        if ($_SESSION["admin"][1] != true) {
            header("location: admins_list.php");
        }
    }
    
    if (!isset($_GET['iduser'])) {
        header("location: list.php");
    }
    
    $id = $_GET['iduser'];
    
    $datas = new admin();
    $d = $datas->crud("delete", "user", "email", "delete from user where iduser = ?", [$id], "Suppression effectuée", null, null);
    header("location:".$_SERVER['HTTP_REFERER']);