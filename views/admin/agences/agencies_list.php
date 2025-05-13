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
    $agences = $datas->crud("select", "agence", "intitule", "select * from agence order by intitule", null, null, null, null);
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

    <a href="add.php" id="link-add">Ajouter</a>

    <div id="search">
        <input type="search" placeholder="Rechercher ...">
    </div>

    <table>
        <tr>
            <th class="th-visible">Nom</th>
            <th class="th-visible">Téléphone</th>
            <th class="th-visible">Email</th>
            <th class="th-visible">Adresse</th>
            <th class="th-visible">Image</th>
            <th class="th-visible">Modifier</th>
            <th class="th-visible">Supprimer</th>
        </tr>
        <?php foreach($agences as $agence): ?>
            <tr class="container-elements">
                <td class="td-visible"><?= $agence["intitule"] ?></td>
                <td class="td-visible"><?= $agence["telephone"] ?></td>
                <td class="td-visible"><?= $agence["email"] ?></td>
                <td class="td-visible"><?= $agence["adresse"] ?></td>
                <td class="td-visible"><img src="<?= $agence["image"] ?>" alt="<?= $agence["intitule"] ?>"></td>
                <td class="td-visible"><a href="update.php?idagence=<?= $agence["idagence"] ?>" class="fa fa-pencil-square-o"></a></td>
                <td class="td-visible"><a href="delete.php?idagence=<?= $agence["idagence"] ?>" class="fa fa-trash-o"></a></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <script src="../../../js/user js/other_search.js" charset="UTF-8"></script>
    <script src="../../../js/delete.js" charset="UTF-8"></script>
    <script src="../../../js/identify.js" charset="UTF-8"></script>
</body>
</html>