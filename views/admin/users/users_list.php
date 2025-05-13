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
    $users = $datas->crud("select", "user", "email", "select * from user where role = ? order by nom", ["Utilisateur"], null, null, null);
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
    <title>Liste des utilisateurs</title>
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
            <th class="th-hidden">Prénom</th>
            <th class="th-visible">Age</th>
            <th class="th-visible">Téléphone</th>
            <th class="th-visible">Sexe</th>
            <th class="th-hidden">Email</th>
            <th class="th-hidden">Role</th>
            <th class="th-visible">Supprimer</th>
        </tr>
        <?php foreach($users as $user): ?>
            <tr class="container-elements">
                <td class="td-visible"><?=$user["nom"] ?></td>
                <td class="td-hidden"><?=$user["prenom"] ?></td>
                <td class="td-visible"><?=$user["age"] ?></td>
                <td class="td-visible"><?=$user["telephone"] ?></td>
                <td class="td-visible"><?=$user["sexe"] ?></td>
                <td class="td-hidden"><?=$user["email"] ?></td>
                <td class="td-hidden"><?=$user["role"] ?></td>
                <td class="td-visible"><a href="delete.php?iduser=<?= $user["iduser"] ?>" class="fa fa-trash-o"></a></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <script src="../../../js/user js/other_search.js" charset="UTF-8"></script>
    <script src="../../../js/delete.js" charset="UTF-8"></script>
    <script src="../../../js/identify.js" charset="UTF-8"></script>
</body>
</html>