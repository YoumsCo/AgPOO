<?php
    session_start();
    if ($_SESSION["access"] != "oui") {
        header("location: connexion.php");
    }

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/dark css/user css/ticket.css" class="style">
    <link rel="stylesheet" type="text/css" href="../../css/dark css/background.css" class="background">
    <link rel="stylesheet" href="../../font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="../../icones/058-ticket.ico">
    <title>Ticket</title>
</head>

<body>
    <?php require_once "../../loaders/loader_3.php"; ?>
    <?php require_once "../nav bar && sidebar/side.php"; ?>
    
    <div id="ticket">
        <div id="title">
            <h2>Ticket de voyage</h2>
        </div>
        <div id="nom">
            <label for="nom">Nom</label>
            <input type="text" value="<?php echo $_SESSION['nom'] ?>">
        </div>
        <div id="prenom">
            <label for="prenom">Prénom</label>
            <input type="text" value="<?php echo $_SESSION['prenom'] ?>">
        </div>
        <div id="from">
            <label for="depart">Ville de départ</label>
            <input type="text" value="Douala-Cameroun">
        </div>
        <div id="statut">
            <label for="depart">Statut</label>
            <input type="text" value="<?= $_SESSION['statut'] ?>">
        </div>
        <div id="to">
            <label for="nom">Destination</label>
            <input type="text" value="<?= $_SESSION['destination'] ?>">
        </div>
        <div id="place">
            <label for="place">Place n_°</label>
            <input type="text" value="<?= $_SESSION['place'] ?>">
        </div>
        <div id="date">
            <label for="place">Date</label>
            <input type="text" value="<?= $_SESSION['date'] ?>">
        </div>
        <div id="reference">
            <label for="place">Reference</label>
            <input type="text" value="<?= $_SESSION['reference'] ?>">
        </div>
        <div id="categorie">
            <label for="place">Catégorie</label>
            <input type="text" value="<?= $_SESSION['type'] ?>">
        </div>
        <div id="mode">
            <label for="place">Mode de paiement</label>
            <input type="text" value="<?= $_SESSION['mode'] ?>">
        </div>
    </div>
    <div id="button">
        <div id="button-2">
            <button id="button_2">Télécharger <span class="text-hide">(ctrl + e)</span></button>
        </div>
        <div id="button-1">
            <button id="button_1">Télécharger en pdf <span class="text-hide">(ctrl + p)</span></button>
        </div>
    </div>
    
    <script src="../../js/identify.js" charset="UTF-8"></script>
    <script src="../../js/user js/ticket.js"></script>
    <script src="../../jsShot/html2canvas.js"></script>    
    <script src="https://cdn.jsdelivr.net/npm/pdfmake@0.1.68/build/pdfmake.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/pdfmake@0.1.68/build/vfs_fonts.js"></script>
</body>
</html>