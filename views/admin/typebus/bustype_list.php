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
    $types = $datas->crud("select", "typebus", "intitule", "select * from typebus order by intitule", null, null, null, null);
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
    <title>Liste des types de bus</title>
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
            <th class="th-visible">idmode</th>
            <th class="th-visible">Intitule</th>
            <th class="th-visible">Tarif</th>
            <th class="th-visible">Modifier</th>
            <th class="th-visible">Supprimer</th>
        </tr>
        <?php foreach($types as $type): ?>
            <tr class="container-elements">
                <td class="td-visible"><?= $type["idtypebus"] ?></td>
                <td class="td-visible"><?= $type["intitule"] ?></td>
                <td class="td-visible"><?= $type["tarif"] ?></td>
                <td class="td-visible"><a href="update.php?idtypebus=<?= $type["idtypebus"] ?>" class="fa fa-pencil-square-o"></a></td>
                <td class="td-visible"><a href="delete.php?idtypebus=<?= $type["idtypebus"] ?>" class="fa fa-trash-o"></a></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <script src="../../../js/user js/other_search.js" charset="UTF-8"></script>
    <script src="../../../js/delete.js" charset="UTF-8"></script>
    <script src="../../../js/identify.js" charset="UTF-8"></script>
</body>
</html>