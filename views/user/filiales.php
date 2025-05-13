<?php 

    require_once "../../models/get_filiales.php";

    if ($_SESSION["access"] != "oui") {
        header("location: connexion.php");
    }

    $datas = new filiales();
    $filiales = $datas->getFiliale();
?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/dark css/user css/filiales.css" class="style">
    <link rel="stylesheet" type="text/css" href="../../css/dark css/background.css" class="background">
    <link rel="stylesheet" href="../../font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="../../icones/BusIco.ico">
    <title>Accueil</title>
</head>
<body>
    <?php require_once "../../loaders/loader_2.php"; ?>
    <?php require_once "../nav bar && sidebar/side.php"; ?>

    <div id="search">
        <input type="search" placeholder="Rechercher ...">
    </div>

    <table>
        <tr>
            <th>Filiales</th>
            <th>Téléphone</th>
            <th>Adresse</th>
        </tr>
        <?php foreach($filiales as $filiale): ?>
            <tr class="container-elements">
                <td><a href="reservation.php?id=<?php echo $filiale["idfiliale"] ?>"><?php echo $filiale["intitule"] ?></a></td>
                <td><a href="reservation.php?id=<?php echo $filiale["idfiliale"] ?>"><?php echo $filiale["telephone"] ?></a></td>
                <td><a href="reservation.php?id=<?php echo $filiale["idfiliale"] ?>"><?php echo $filiale["adresse"] ?></a></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <script src="../../js/user js/other_search.js" charset="UTF-8"></script>
    <script src="../../js/identify.js" charset="UTF-8"></script>
</body>
</html>