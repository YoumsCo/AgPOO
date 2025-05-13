<?php
    require_once "../../models/get_user.php";

    if ($_SESSION["access"] != "oui") {
        header("location: connexion.php");
    }

    $u = new users();
    $users = $u->get_user_by_email($_SESSION['email']);

    foreach($users as $user) {
        $nom = $user['nom'];
        $prenom = $user['prenom'];
        $age = $user['age'];
        $tel = $user['telephone'];
        $sexe = $user['sexe'];
        $email = $user['email'];
    }
    
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/dark css/user css/update.css" class="style">
    <link rel="stylesheet" type="text/css" href="../../css/dark css/background.css" class="background">
    <link rel="stylesheet" href="../../font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="../../icones/009-pen.ico">
    <title>Modifier le profile</title>
</head>
<body>
    <?php require_once "../../loaders/loader_2.php"; ?>
    <?php require_once "../nav bar && sidebar/side.php"; ?>

    <div id="container">
        <div class="container-form form-sign-up">
            <form action="<?php echo htmlspecialchars("../../controllers/userController.php"); ?>" method="POST">
                <div class="form-title">
                    <marquee direction="rigth">
                        <h1>Modification</h1>
                    </marquee>
                </div>
                <div>
                    <input type="text" name="nom" placeholder="Entrez votre nom" minlength="3" maxlength="30" title="Nom" pattern="[a-zA-Z]*[']?[a-zA-Z]*[\-]?[a-zA-Z]*\s?[a-zA-Z]*[']?[a-zA-Z]*[\-]?\s?[a-zA-Z]*[0-9]?" value="<?= $nom; ?>" required>
                    <label class="label">Nom</label>
                    <i class="fa fa-user-circle-o"></i>
                </div>
                <div>
                    <input type="text" name="prenom" placeholder="Entrez votre prénom" minlength="3" maxlength="30" title="Prénom" pattern="[a-zA-Z]*[']?[a-zA-Z]*[\-]?[a-zA-Z]*\s?[a-zA-Z]*[']?[a-zA-Z]*[\-]?\s?[a-zA-Z]*[0-9]?" value="<?= $prenom; ?>" required>
                    <label class="label">Prénom</label>
                    <i class="fa fa-user-circle-o"></i>
                </div>
                <div>
                    <input type="number" name="age" placeholder="Entrez votre age" value="18" min="18" max="90" title="Age" value="<?= $age; ?>" required>
                    <label class="label">Age</label>
                    <i class="fa fa-male"></i>
                </div>
                <div>
                    <input type="tel" name="tel" placeholder="Entrez votre téléphone" pattern="\+237\s[6][0-9]{8}" value="+237 6" title="Téléphone" value="<?= $tel; ?>" required>
                    <label class="label">Téléphone</label>
                    <i class="fa fa-phone"></i>
                </div>
                <div>
                    <input type="email" name="email" placeholder="Entrez votre email" minlength="10" maxlength="45" title="Email" pattern="[a-zA-Z]*[0-9]{0,3}[a-zA-Z]*[@](gmail|yahoo|outlook)\.(com|fr)" value="<?= $email; ?>" required>
                    <label class="label">Email</label>
                    <i class="fa fa-envelope-o"></i>
                </div>
                <div>
                    <input type="password" name="password" placeholder="Entrez votre mot de passe" minlength="8" maxlength="30" title="Mot de passe" required>
                    <label class="label">Mot de passe</label>
                    <i class="fa fa-eye" id="eye"></i>
                </div>
                <div>
                    <input type="submit" name="update" value="Modifier" title="Envoyer">
                </div>
            </form>
        </div>
        <div class="ears left"></div>
        <div class="ears right"></div>
    </div>


    <script src="../../js/user js/update.js" charset="UTF-8"></script>
    <script src="../../js/identify.js" charset="UTF-8"></script>
</html>