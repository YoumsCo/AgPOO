<?php
    require_once "../../models/get_user.php";

    if ($_SESSION["access"] != "oui") {
        header("location: connexion.php");
    }

    $u = new users();
    $users = $u->get_user_by_email($_SESSION['email']);

    foreach($users as $user) {
        $nom = $user['nom'];
        $prenom = $user['prenom'];
        $age = $user['age'];
        $tel = $user['telephone'];
        $sexe = $user['sexe'];
        $email = $user['email'];
    }
    
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/dark css/user css/profile.css" class="style">
    <link rel="stylesheet" type="text/css" href="../../css/dark css/background.css" class="background">
    <link rel="stylesheet" href="../../font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="../../icones/036-profile.ico">
    <title>Profile</title>
</head>
<body>
    <?php require_once "../../loaders/loader_2.php"; ?>
    <?php require_once "../nav bar && sidebar/side.php"; ?>

    <div id="container">
        <div id="container-image">
            <img src="<?= $_SESSION['img'] ?>" alt="Photo">
        </div>
        <div id="container-information">
                <span>Nom : &nbsp;<?= $nom ?></span>
                &nbsp;
                <span>Prénom : &nbsp;<?= $prenom ?></span>
                &nbsp;
                <span>Age : &nbsp;<?= $age ?></span>
                &nbsp;
                <span>Sexe : &nbsp;<?= $sexe ?></span>
                &nbsp;
                <span>Téléphone : &nbsp;<?= $tel ?></span>
                &nbsp;
                <span>Email : &nbsp;<?= $email ?></span>
        </div>
        <button onclick="update()">Modifier &nbsp; <i class="fa fa-edit" aria-hidden="true"></i></button>
    </div>

    <script src="../../js/user js/profile.js" charset="UTF-8"></script>
</html>