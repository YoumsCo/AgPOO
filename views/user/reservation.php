<?php

    require_once "../../models/get_reservation.php";
    require_once "../../models/get_filiales.php";
    require_once "../../models/get_villes.php";
    require_once "../../models/get_mode.php";
    require_once "../../models/get_typebus.php";

    if ($_SESSION["access"] != "oui") {
        header("location: connexion.php");
    }

    if (!isset($_REQUEST["id"])) {
        header("location: accueil.php");
    }
    else if(!is_numeric($_REQUEST["id"])) {
        header("location: accueil.php");
    }

    $id = $_REQUEST["id"];

    $user = new reservation();
    $ref = new filiales();
    $cities = new villes();
    $mode = new modes();
    $type = new typebus();


    $reference = $ref -> get_reference($id);
    $one = $user -> get_user_by_email($_SESSION['email']);
    $towns = $cities -> get_villes();
    $modes = $mode -> get_modes();
    $typebus = $type -> get_type_bus();

    foreach($one as $self) {
        $nom = $self["nom"];
        $prenom = $self["prenom"];
    }

    foreach($reference as $reffe) {
        $reff = $reffe["intitule"];
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/dark css/user css/reservation.css" class="style">
    <link rel="stylesheet" type="text/css" href="../../css/dark css/background.css" class="background">
    <link rel="stylesheet" href="../../font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="../../icones/058-ticket.ico">
    <title>Reservation</title>
</head>
<body">
    <?php require_once "../../loaders/loader_2.php"; ?>
    <?php require_once "../nav bar && sidebar/side.php"; ?>
    
    <div id="container">
        <form action="../../controllers/reservationController.php" method="POST">
            <div id="title">
                <h2>Reservation</h2>
            </div>
            <div class="contain names">
                <div>
                    <input type="text" name="nom" placeholder="Entrez votre nom" minlength="3" maxlength="30" title="Nom" pattern="[a-zA-Z]*[']?[a-zA-Z]*[\-]?[a-zA-Z]*\s?[a-zA-Z]*[']?[a-zA-Z]*[\-]?\s?[a-zA-Z]*[0-9]?" value="<?php echo $nom ?>" required>
                    <label class="label">Nom</label>
                    <i class="fa fa-user-circle-o"></i>
                </div>
                <div>
                    <input type="text" name="prenom" placeholder="Entrez votre prénom" minlength="3" maxlength="30" title="Prénom" pattern="[a-zA-Z]*[']?[a-zA-Z]*[\-]?[a-zA-Z]*\s?[a-zA-Z]*[']?[a-zA-Z]*[\-]?\s?[a-zA-Z]*[0-9]?" value="<?php echo $prenom ?>" required>
                    <label class="label">Prénom</label>
                    <i class="fa fa-user-circle-o"></i>
                </div>
                <div>
                    <button type="button" class="contain-button">Suivant</button>
                </div>
            </div>
            
            <div class="contain destination position translateX">
                <div>
                    <label>Place n°_</label>
                    <input type="text" name="place" class="event-none first" required>
                </div>
                <div>   
                    <label>Destination</label>
                    <input type="text" placeholder="Sélectionnez votre destination dans la liste" name="destination" list="town-list" id="list">
                    <datalist id="town-list">
                        <?php foreach ($towns as $city): ?>
                            <option class="list-option" value="<?php echo $city["intitule"] ?>"><?php echo $city["montant"] ?></option>
                        <?php endforeach; ?>
                    </datalist>
                </div>
                <div class="button">
                    <button type="button" class="contain-button-cancel">Précédent</button>
                    &nbsp;
                    <button type="button" class="contain-button">Suivant</button>
                </div>
            </div>
            
            <div class="contain reference position translateX">
                <div>
                    <label>Reference</label>
                    <input type="text" name="reference" class="event-none" value="<?php echo $reff; ?>" required>
                </div>
                <div>
                    <label>Montant (FCFA * 2 <span id="info">si</span> VIP)</label>
                    <input type="text" name="montant" class="event-none" required>
                </div>
                <div class="button">
                    <button type="button" class="contain-button-cancel">Précédent</button>
                    &nbsp;
                    <button type="button" class="contain-button">Suivant</button>
                </div>
            </div>

            <div class="contain mode position translateX">
                <div>
                    <label>Mode de paiement</label>
                    <select name="mode">
                        <?php foreach ($modes as $m): ?>
                            <option class="list-option" value="<?php echo $m["intitule"] ?>"><?php echo $m["intitule"] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div>
                    <label>Type de bus &nbsp;<span id="type-info" title="Le prix va de doubler si vous etes passé en VIP"></span></label>
                    <select name="type" id="select-type">
                        <?php foreach ($typebus as $bus): ?>
                            <option class="type-option" value="<?php echo $bus["intitule"] ?>"><?php echo $bus["intitule"] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="button">
                    <button type="button" class="contain-button-cancel">Précédent</button>
                    &nbsp;
                    <button type="button" class="contain-button">Suivant</button>
                </div>
            </div>

            <div class="contain date position translateX">
                <div>
                    <label>Date</label>
                    <input type="date" name="date" required>
                </div>
                <div class="button">
                    <button type="button" class="contain-button-cancel">Précédent</button>
                    &nbsp;
                    <input type="submit" name="reserver" value="Reserver" id="valider">
                </div>
            </div>
        </form>
    </div>

    <script src="../../js/user js/reservation.js" charset="UTF-8"></script>
    <script src="../../js/identify.js" charset="UTF-8"></script>
    <script src="../../js/user js/even.js" charset="UTF-8"></script>
</body>
</html>