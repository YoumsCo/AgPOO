<?php
    require_once "../../models/get_agency.php";

    if ($_SESSION["access"] != "oui") {
        header("location: connexion.php");
    }

    $a = new agence();
    $agences = $a->getAgence();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/dark css/user css/accueil.css" class="style">
    <link rel="stylesheet" type="text/css" href="../../css/dark css/background.css" class="background">
    <link rel="stylesheet" href="../../font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="../../icones/001-home.ico">
    <title>Accueil</title>
</head>
<body>
    <?php require_once "../../loaders/loader_2.php"; ?>
    <?php require_once "../nav bar && sidebar/side.php"; ?>

    <div id="search">
        <input type="search" placeholder="Rechercher ...">
    </div>

    <div id="container">
        <?php foreach( $agences as $agence ) : ?>
            <div class="container-items">
                <div class="container-image">
                    <img src="<?= $agence['image'] ?>" alt="<?= $agence['intitule'] ?>">
                </div>
                <span><a href="filiale_for_one_agency.php?id=<?= $agence['intitule'] ?>"><?= $agence['intitule'] ?></a></span>
            </div>
            
        <?php endforeach; ?>
    </div>

    <script src="../../js/user js/search.js" charset="UTF-8"></script>
    <!-- <script src="../../js/identify.js" charset="UTF-8"></script> -->
</body>
</html>