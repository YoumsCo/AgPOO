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


<link rel="stylesheet" href="../../css/dark css/side.css" class="style">
<link rel="stylesheet" href="../../font-awesome-4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="../../bootstrap-icons-1.11.3/font/bootstrap-icons.css">

<div id="nav">
    <ul>
        <a href="../user/connexion.php" class="links" title="Se connecter" id="signUp">
            <span>Connexion</span>
            &nbsp;
            <i class="fa fa-user-circle-o"></i>
        </a>
        <a href="../../views/user/filiales.php" class="links  <?= current_page('filiales') ?>" title="Voir les filiales">
            <span>Filiales</span>
            &nbsp;
            <i class="fa fa-bus"></i>
        </a>
        <a href="#" class="links  <?= current_page('#') ?>" title="A propos de nous">
            <span>A propos</span>
            &nbsp;
            <i class="fa fa-info"></i>
        </a>
        <a href="../user/deconnexion.php" class="links" title="Se déconnexion" id="signOut">
            <span>Quitter</span>
            &nbsp;
            <i class="fa fa-sign-out"></i>
        </a>
    </ul>
</div>

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
            <?= $_SESSION['admin'][0] ?>
            <?= $_SESSION['superadmin'][0] ?>
        </div>
        <span><?= $_SESSION['nom'] ?></span>
    </div>
    <ul id="container-itens">
        <a href="../../views/user/accueil.php" class="items <?= current_page('accueil') ?>">
            <i class="fa fa-home"></i>
            &nbsp;
            Accueil
        </a>
        <a href="https://www.google.com/maps/" class="items" target="_blank">
            <i class="fa fa-map-marker"></i>
            &nbsp;
            Localiser une agence
        </a>
        <a href="#" class="items">
            <i class="bi bi-palette"></i>
            &nbsp;
            Thème
            <ul class="items-child">
                <li class="childs">
                    <div id="theme">
                        <div id="theme-button">
                            <i class="fa fa-moon-o"></i>
                        </div>
                    </div>
                </li>
            </ul>
        </a>
        <a href="../user/profile.php" class="items <?= current_page('profile') ?>">
            <i class="fa fa-user-secret"></i>
            &nbsp;
            Profile
        </a>
        <a href="../user/historique.php" class="items <?= current_page('historique') ?>">
            <i class="fa fa-angle-double-up"></i>
            &nbsp;
            Historique
        </a>
        <li class="items">
            <i class="fa fa-phone-square"></i>
            &nbsp;
            Contact
            <ul class="items-child">
                <a href="tel:690552385" class="childs">
                    <i class="fa fa-phone"></i>
                    &nbsp;
                    Appelez-nous</a>
                <a href="mailto:youmsc.co@gmail.com" class="childs">
                    <i class="fa fa-envelope-o"></i>
                    &nbsp;
                    Email</a>
                <a href="whatsapp://send?phone=+237690552385" class="childs">
                    <i class="fa fa-whatsapp"></i>
                    &nbsp;
                    Whatsapp</a>
                <a href="sms:+237690552385" class="childs">
                    <i class="fa fa-comments"></i>
                    &nbsp;
                    SMS</a>
            </ul>
        </li>
    </ul>
</div>

<script src="../../js/side.js"></script>
<script src="../../js/identify.js" charset="UTF-8"></script>