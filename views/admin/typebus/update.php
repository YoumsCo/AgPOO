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
    if (!isset($_GET['idtypebus'])) {
        header("location: bustype_list.php");
    }

    $id = $_GET['idtypebus'];

    $u = new admin();
    $types = $u->crud("select", "typebus", "intitule", "select * from typebus where idtypebus = ?", [$id], null, null, null);

    foreach($types as $type) {
        $intitule = $type['intitule'];
        $tarif = $type['tarif'];
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
    <title>Modifier <?= $intitule ?> </title>
</head>
<body>
    <?php require_once "../../../admin loaders/loader_2.php"; ?>

    <div id="container">
        <div class="container-form form-sign-up">
            <form action="<?php echo htmlspecialchars('../../../controllers/adminController.php?idtypebus='.$id); ?>" method="POST">
                <div class="form-title">
                    <marquee direction="rigth">
                        <h1>Modifier <?= $intitule ?></h1>
                    </marquee>
                </div>
                <div>
                    <input type="text" name="intitule" placeholder="Entrez l'intitule" minlength="3" title="Intitule" pattern="[a-zA-Z]{3,}\s?[a-zA-Z]*\s?[a-zA-Z]*" value="<?= $intitule; ?>" required>
                    <label class="label">Intitule</label>
                </div>
                <div>
                    <input type="text" name="tarif" placeholder="Entrez le tarif" title="tarif" pattern="\d{4,5}" value="<?= $tarif; ?>" required>
                    <label class="label">Tarif</label>
                </div>
                <div>
                    <input type="submit" name="update_type" value="Modifier" title="Modifier">
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