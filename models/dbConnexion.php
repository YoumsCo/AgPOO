<?php
session_start();

use Dotenv\Dotenv;

require_once __DIR__ . "/../vendor/autoload.php";

class database
{
    private $pdo;

    function __construct()
    {
        $dotenv = Dotenv::createImmutable(__DIR__ . "/../");
        $dotenv->load();

        $server = $_ENV["SERVER"];
        $dbname = $_ENV["DB_NAME"];
        $port = $_ENV["PORT"];
        $user = $_ENV["USER"];
        $password = $_ENV["PASSWORD"];

        $dsn = (string) "mysql:host=" . $server . "; dbname=" . $dbname . "; port=" . $port . "; charset=utf8";

        try {
            $this->pdo = new PDO($dsn, $user, $password);
            $this->pdo->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES utf8");
            $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connexion echouée : " . $e->getMessage() . "<br>A la ligne : " . $e->getLine();
        }
    }

    function returnDB()
    {
        return $this->pdo;
    }
}
