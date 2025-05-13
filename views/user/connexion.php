<?php 
    session_start();
    $_SESSION["access"] = "non";
    $_SESSION["superadmin"][1] = false;
    $_SESSION["admin"][1] = false;
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../css/dark css/user css/form.css" class="style">
    <link rel="stylesheet" type="text/css" href="../../css/dark css/background.css" class="background">
    <link rel="stylesheet" href="../../font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="../../icones/114-user.ico">
    <title>Inscription/Connexion</title>
</head>
<body>
    <?php require_once "../../loaders/loader_1.php"; ?>
    <div id="side">
        <?php require_once "../nav bar && sidebar/side.php"; ?>
    </div>
    <div id="container">
        <!-- Formulaire d'inscription -->
        <div class="container-form form-sign-up">
            <form action="<?php echo htmlspecialchars("../../controllers/userController.php"); ?>" method="POST">
                <div class="form-title">
                    <marquee direction="rigth">
                        <h1>Inscrivez-vous</h1>
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
                <div id="sexe">
                    <label>Sexe : </label>
                    <input type="radio" name="sexe" title="Masculin" value="masculin">
                    &nbsp;
                    <label>Masculin</label>
                    &nbsp;
                    <input type="radio" name="sexe" title="Féminin" value="feminin">
                    &nbsp;
                    <label>Féminin</label>
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
                    <input type="submit" name="sign" value="Soumettre" title="Envoyer">
                    <br>
                    <span>Vous avez déjà un compte ? &nbsp; <a href="#" class="link-form">Connexion. &nbsp; <a href="whatsapp://send?phone=+237690552385">Aide?</a></a></span>
                </div>
            </form>
        </div>
        <!-- Formulaire de connexion -->
        <div class="container-form form-login">
            <form action="<?php echo htmlspecialchars("../../controllers/userController.php"); ?>" method="POST">
                <div class="form-title">
                    <marquee bgcolor="transparent" direction="rigth">
                        <h1>Connectez-vous</h1>
                    </marquee>
                </div>
                <div>
                    <input type="text" name="nom" placeholder="Entrez votre nom" minlength="3" maxlength="30" title="Nom" pattern="[a-zA-Z]*[']?[a-zA-Z]*[\-]?[a-zA-Z]*\s?[a-zA-Z]*[']?[a-zA-Z]*[\-]?\s?[a-zA-Z]*[0-9]?" required>
                    <label class="label">Nom</label>
                    <i class="fa fa-user-circle-o"></i>
                </div>
                <div>
                    <input type="email" name="email" placeholder="Entrez votre email"  minlength="10" maxlength="45" title="Email" pattern="[a-zA-Z]*[0-9]*[a-zA-Z]*[@](gmail|yahoo|outlook)\.(com|fr)" required>
                    <label class="label">Email</label>
                    <i class="fa fa-envelope-o"></i>
                </div>
                <div>
                    <input type="password" name="pass" placeholder="Entrez votre mot de passe" minlength="8" maxlength="30" title="Mot de passe" required>
                    <label class="label">Mot de passe</label>
                    <i class="fa fa-eye"></i>
                </div>
                <div>
                    <input type="submit" name="login" value="Soumettre" title="Envoyer">
                    <span>Pas encore de compte ? &nbsp; <a href="#" class="link-form">Inscription. &nbsp; <a href="mailto:youmschoco@gmail.com">Aide?</a></a></span>
                </div>
            </form>
        </div>
        <!-- Informations -->
        <div id="container-info">
            <div class="container-info sign-up">
                <div class="info">
                    <p>
                        Vous avez peut-etre un compte !
                    </p>
                    <button type="button" class="button">Connectez-vous</button>
                </div>
            </div>
            <div class="container-info login">
                <div class="info">
                    <p>
                        Vous n'avez pas de compte ?
                    </p>
                    <button type="button" class="button">Inscrivez-vous</button>
                </div>
            </div>
        </div>
        <div class="ears left"></div>
        <div class="ears right"></div>
    </div>

    <script charset="UTF-8" src="../../js/user js/script.js"></script>
    <script src="../../js/identify.js" charset="UTF-8"></script>
    <script src="../../js/user js/even.js" charset="UTF-8"></script>
</body>
</html>