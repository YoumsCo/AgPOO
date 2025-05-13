<?php

    require_once "../../controllers/sideCondroller.php";
    $_SESSION['img'] = "../../img/use.png";

    $rep = "../../profile";
    $dir = scandir($rep);
    $count = count($dir) - 2;
    if ($count !== 0) {
        foreach($dir as $d) {
            $img = substr($d, 0, strlen($_SESSION["email"]));
            if ($img === $_SESSION["email"]) {
                $_SESSION['img'] = $rep.'/'.$d;
            }
        }
    }

    if (isset($_POST['envoyer'])) {
        if (isset($_FILES['profile']) && $_FILES['profile']['error'] === 0) {
            $file_name = $_FILES['profile']['name'];
            $file_type = $_FILES['profile']['type'];
            $file_tmp = $_FILES['profile']['tmp_name'];
            
            if ($file_type === "image/jpeg" || $file_type === "image/jpg" || $file_type === "image/png" || $file_type === "image/gif") {
                $rep = "../../profile/";
                $new_name = $_SESSION["email"].'_'.uniqid()."_".$file_name;
                $new_rep = $rep.$new_name;
                $found = check_profile($dir, $file_name, $_SESSION["email"]);
                if ($found == false) {
                    if (move_uploaded_file($file_tmp, $new_rep)) {
                        $_SESSION['img'] = $new_rep;
                    }
                    else {
                        echo "<script>alert('Erreur lors du chargement');</script>";
                    }
                }
            }
        }
        else {
            echo "<script>alert('Erreur survenue lors de la recupération du fichier');</script>";
        }
    }
    if (isset($_POST['supprimer'])) {
                
        foreach($dir as $d) {
            if (substr($d, 0, strlen($_SESSION["email"])) == $_SESSION["email"]) {
                $path = $rep."/".$d;
                unlink($path);       
            }
        }
        $_SESSION['img'] = "../../img/use.png";
    }

?>


<link rel="stylesheet" href="../../css/dark css/superadmin css/superadmin side.css">
<link rel="stylesheet" href="../../font-awesome-4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="../../bootstrap-icons-1.11.3/font/bootstrap-icons.css">


<div id="menu">
    <div></div>
    <div></div>
    <div></div>
</div>
<div id="change-profile">
    <i class="fa fa-close"></i>
    <div id="container-profile">
        <div>
            <img src="<?= $_SESSION['img'] ?>" class="img" alt="photo">
        </div>
        <div>
            <form action="#" method="POST" enctype="multipart/form-data">
                <input type="file" name="profile" id="file">
                <input type="submit" name="envoyer" id="envoyer">
            </form>
            <form action="#" method="POST">
                <input type="submit" name="supprimer" id="supprimer">
            </form>
            <label for="file" id="label-profile">Ajouter</label>
            &nbsp;
            <button id="reset">Supprimer</button>
        </div>
    </div>
</div>
<div id="side-bar">
    <div id="picture">
        <img src="<?= $_SESSION['img'] ?>" class="img" alt="photo">
        <label class="fa fa-camera"></label>
        <div id="contain-admin">
        </div>
        <span><?= $_SESSION['nom'] ?></span>
    </div>
    <ul id="container-itens">
        <a href="../superadmin/admins_list.php" class="items <?= current_page('admins_list') ?>">
            <i class="fa fa-user-secret"></i>
            &nbsp;
            Administrateurs
        </a>
        <a href="../admin/users/users_list.php" class="items <?= current_page('users_list') ?>">
            <i class="fa fa-angle-double-up"></i>
            &nbsp;
            Espace administrateurs
        </a>
        <a href="../user/deconnexion.php" class="items" id="signOut">
            <i class="fa fa-sign-out"></i>
            &nbsp;
            Deconnexion
        </a>
    </ul>
</div>

<script src="../../js/superadmin side.js"></script>
<script src="../../js/identify.js" charset="UTF-8"></script>