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
    if (!isset($_GET['idreservation'])) {
        header("location: reservations_list.php");
    }

    $id = $_GET['idreservation'];

    $u = new admin();
    $reservations = $u->crud("select", "reservation", "place", "select * from reservation where idreservation = ?", [$id], null, null, null);

    foreach($reservations as $reservation) {
        $id = $reservation['idreservation'];
        $nom = $reservation['nom'];
        $place = $reservation['place'];
    }
    
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../css/dark css/admin css/update.css">
    <link rel="stylesheet" type="text/css" href="../../../css/dark css/background.css">
    <link rel="stylesheet" href="../../../font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="../../../icones/009-pen.ico">
    <title>Modifier la reservation de  <?= $nom ?></title>
</head>
<body>
    <?php require_once "../../../admin loaders/loader_2.php"; ?>

    <div id="container">
        <div class="container-form form-sign-up">
            <form action="<?php echo htmlspecialchars('../../../controllers/adminController.php?idreservation='.$id); ?>" method="POST">
                <div class="form-title">
                    <marquee direction="rigth">
                        <h1>Modifier la reservation de  <?= $nom ?></h1>
                    </marquee>
                </div>
                <div>
                    <input type="text" name="place" title="Place" pattern="\d{1,2}" value="<?= $place; ?>" required>
                    <label class="label">Place</label>
                </div>
                <div>
                    <input type="submit" name="update_reservation" value="Modifier" title="Modifier">
                </div>
            </form>
        </div>
        <div class="ears left"></div>
        <div class="ears right"></div>
    </div>


    <script src="../../../js/identify.js" charset="UTF-8"></script>
    <script src="../../../js/user js/even.js" charset="UTF-8"></script>
</body>
</html>