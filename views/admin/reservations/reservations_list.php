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

    $datas = new admin();
    $reservations = $datas->crud("select", "reservation", "place", "select * from reservation order by place", null, null, null, null);
?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../css/dark css/admin css/list.css">
    <link rel="stylesheet" href="../../../css/dark css/background.css">
    <link rel="stylesheet" href="../../../font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="../../../icones/115-users.ico">
    <title>Liste des Agences</title>
</head>
<body>
    <?php require_once "../../../admin loaders/loader_2.php"; ?>
    <?php require_once "../../nav bar && sidebar/admin side.php"; ?>

    <div id="search">
        <input type="search" placeholder="Rechercher ...">
    </div>

    <table>
        <tr>
            <th class="th-visible">Nom</th>
            <th class="th-visible">Prénom</th>
            <th class="th-visible">Email</th>
            <th class="th-visible">Place</th>
            <th class="th-visible">Destination</th>
            <th class="th-visible">Reference</th>
            <th class="th-visible">Montant</th>
            <th class="th-visible">Mode de paiement</th>
            <th class="th-visible">Type</th>
            <th class="th-visible">Statut</th>
            <th class="th-visible">Date voyage</th>
            <th class="th-visible">Date de reservation</th>
            <th class="th-visible">Modifier</th>
            <th class="th-visible">Supprimer</th>
        </tr>
        <?php foreach($reservations as $reservation): ?>
            <tr class="container-elements">
                <td class="td-visible"><?= $reservation["nom"] ?></td>
                <td class="td-visible"><?= $reservation["prenom"] ?></td>
                <td class="td-visible"><?= $reservation["email"] ?></td>
                <td class="td-visible"><?= $reservation["place"] ?></td>
                <td class="td-visible"><?= $reservation["destination"] ?></td>
                <td class="td-visible"><?= $reservation["reference"] ?></td>
                <td class="td-visible"><?= $reservation["montant"] ?></td>
                <td class="td-visible"><?= $reservation["mode_paiement"] ?></td>
                <td class="td-visible"><?= $reservation["type_bus"] ?></td>
                <td class="td-visible"><?= $reservation["statut"] ?></td>
                <td class="td-visible"><?= $reservation["date_voyage"] ?></td>
                <td class="td-visible"><?= $reservation["date_reservation_effectuee"] ?></td>
                <td class="td-visible"><a href="update.php?idreservation=<?= $reservation["idreservation"] ?>" class="fa fa-pencil-square-o"></a></td>
                <td class="td-visible"><a href="delete.php?idreservation=<?= $reservation["idreservation"] ?>" class="fa fa-trash-o"></a></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <script src="../../../js/user js/other_search.js" charset="UTF-8"></script>
    <script src="../../../js/delete.js" charset="UTF-8"></script>
    <script src="../../../js/identify.js" charset="UTF-8"></script>
</body>
</html>