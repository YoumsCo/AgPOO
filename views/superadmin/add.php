<?php

    session_start();

    if ($_SESSION["access"] != "oui") {
        header("location: ../user/connexion.php");
        
        if ($_SESSION["superadmin"][1] != true) {
            header("location: admins_list.php");
        }
        if ($_SESSION["admin"][1] != true) {
            header("location: admins_list.php");
        }
    }
    
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/dark css/superadmin css/update.css">
    <link rel="stylesheet" type="text/css" href="../../css/dark css/background.css">
    <link rel="stylesheet" href="../../font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="../../icones/267-plus.ico">
    <title>Ajouter un administrateur</title>
</head>
<body>
    <?php require_once "../../superadmin loaders/loader_2.php"; ?>
    <?php require_once "../../views/nav bar && sidebar/superadmin side.php"; ?>

    <div id="container">
        <div class="container-form form-sign-up">
            <form action="<?php echo htmlspecialchars("../../controllers/superadminController.php"); ?>" method="POST">
                <div class="form-title">
                    <marquee direction="rigth">
                        <h1>Ajouter administrateur</h1>
                    </marquee>
                </div>
                <div>
                    <input type="text" name="nom" placeholder="Entrez votre nom" minlength="3" maxlength="30" title="Nom" pattern="[a-zA-Z]*[']?[a-zA-Z]*[\-]?[a-zA-Z]*\s?[a-zA-Z]*[']?[a-zA-Z]*[\-]?\s?[a-zA-Z]*[0-9]?" required>
                    <label class="label">Nom</label>
                    <i class="fa fa-user-circle-o"></i>
                </div>
                <div>
                    <input type="text" name="prenom" placeholder="Entrez votre prénom" minlength="3" maxlength="30" title="Prénom" pattern="[a-zA-Z]*[']?[a-zA-Z]*[\-]?[a-zA-Z]*\s?[a-zA-Z]*[']?[a-zA-Z]*[\-]?\s?[a-zA-Z]*[0-9]?" required>
                    <label class="label">Prénom</label>
                    <i class="fa fa-user-circle-o"></i>
                </div>
                <div>
                    <input type="number" name="age" placeholder="Entrez votre age" value="18" min="18" max="90" title="Age" required>
                    <label class="label">Age</label>
                    <i class="fa fa-male"></i>
                </div>
                <div>
                    <input type="tel" name="tel" placeholder="Entrez votre téléphone" pattern="\+237\s[6][0-9]{8}" value="+237 6" title="Téléphone" required>
                    <label class="label">Téléphone</label>
                    <i class="fa fa-phone"></i>
                </div>
                <div>
                    <input type="email" name="email" placeholder="Entrez votre email" minlength="10" maxlength="45" title="Email" pattern="[a-zA-Z]*[0-9]{0,3}[a-zA-Z]*[@](gmail|yahoo|outlook)\.(com|fr)" required>
                    <label class="label">Email</label>
                    <i class="fa fa-envelope-o"></i>
                </div>
                <div>
                    <input type="password" name="password" placeholder="Entrez votre mot de passe" minlength="8" maxlength="30" title="Mot de passe" required>
                    <label class="label">Mot de passe</label>
                    <i class="fa fa-eye" id="eye"></i>
                </div>
                <div>
                    <input type="submit" name="insert" value="Ajouter" title="Envoyer">
                </div>
            </form>
        </div>
        <div class="ears left"></div>
        <div class="ears right"></div>
    </div>


    <script src="../../js/user js/script.js" charset="UTF-8"></script>
    <script src="../../js/identify.js" charset="UTF-8"></script>
    <script src="../../js/user js/even.js" charset="UTF-8"></script>
</html>