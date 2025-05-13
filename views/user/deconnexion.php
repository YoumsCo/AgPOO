<?php
    session_start();
    $_SESSION["access"] = "non";
    header("location: connexion.php");