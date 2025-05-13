<?php
session_start();

class database
{
    private $dsn;
    private const server = $_ENV["SERVER"];
    private const dbname = $_ENV["DB_NAME"];
    private const port = $_ENV["PORT"];
    private const user = $_ENV["PORT"];
    private const password = $_ENV["PASSWORD"];
    private $pdo;

    function __construct()
    {
        // $this->dsn = "mysql:host=".self::server.";dbname=".self::dbname.";charset=utf8";
        $this->dsn = "mysql:host=" . self::server . "; dbname=" . self::dbname . "; port=" . self::port . "; charset=utf8";

        try {
            $this->pdo = new PDO($this->dsn, self::user, self::password);
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
