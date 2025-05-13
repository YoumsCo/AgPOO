<?php 

    require_once "../../models/get_reservation.php";

    if ($_SESSION["access"] != "oui") {
        header("location: connexion.php");
    }

    $datas = new reservation();
    $reservations = $datas -> get_all_reservation_from_self($_SESSION['email']);
?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/dark css/user css/historique.css" class="style">
    <link rel="stylesheet" type="text/css" href="../../css/dark css/background.css" class="background">
    <link rel="stylesheet" href="../../font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="../../icones/BusIco.ico">
    <title>Historique</title>
</head>
<body">

    <?php require_once "../../loaders/loader_2.php"; ?>
    <?php require_once "../nav bar && sidebar/side.php"; ?>

    <div id="search">
        <input type="search" placeholder="Rechercher ...">
    </div>

    <table>
        <tr>
            <th class="th-visible">Nom</th>
            <th class="th-hidden">Prénom</th>
            <th class="th-visible">Place</th>
            <th class="th-visible">Destination</th>
            <th class="th-visible">Reférence</th>
            <th class="th-hidden">Montant</th>
            <th class="th-hidden">Moe de paiement</th>
            <th class="th-hidden">Type de bus</th>
            <th class="th-hidden">Voyage</th>
            <th class="th-visible">Statut</th>
        </tr>
        <?php foreach($reservations as $reservation): ?>
            <tr class="container-elements">
                <td class="td-visible"><?php echo $reservation["nom"] ?></td>
                <td class="td-hidden"><?php echo $reservation["prenom"] ?></td>
                <td class="td-visible"><?php echo $reservation["place"] ?></td>
                <td class="td-visible"><?php echo $reservation["destination"] ?></td>
                <td class="td-visible"><?php echo $reservation["reference"] ?></td>
                <td class="td-hidden"><?php echo $reservation["montant"] ?>&nbsp;FCFA</td>
                <td class="td-hidden"><?php echo $reservation["mode_paiement"] ?></td>
                <td class="td-hidden"><?php echo $reservation["type_bus"] ?></td>
                <td class="td-hidden"><?php echo $reservation["date_voyage"] ?></td>
                <td class="td-visible"><?php echo $reservation["statut"] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <script src="../../js/user js/other_search.js" charset="UTF-8"></script>
    <script src="../../js/identify.js" charset="UTF-8"></script>
</body>
</html>