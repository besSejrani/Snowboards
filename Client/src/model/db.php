<?php

require_once(dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . "vendor" . DIRECTORY_SEPARATOR . "autoload.php");
$dotenv = Dotenv\Dotenv::createImmutable("./../");
$dotenv->load();

class DB
{
    private static $connection = null;

    public function connect()
    {
        if (self::$connection == null) {
            try {

                $port = getenv('MYSQL_PORT');
                $hostName = getenv('MYSQL_HOSTNAME');
                $databaseName = getenv('MYSQL_DATABASE');
                $userName = getenv('MYSQL_USER');
                $userPassword = getenv('MYSQL_PASSWORD');

                return new PDO('mysql:host=' . $hostName . ';dbname=' . $databaseName . ';port=' . $port, $userName, $userPassword);
            } catch (PDOException $exception) {
                echo 'Connection failed: ' . $exception->getMessage();
            }
        }
        return self::$connection;
    }


    public function executeQuery($query)
    {
        $queryResult = null;
        $dbConnexion = $this->connect();

        if ($dbConnexion != null) {
            $statement = $dbConnexion->prepare($query);
            $statement->execute();
            $queryResult = $statement->fetchAll();
        }

        $dbConnexion = null;
        return $queryResult;
    }


    public static function Disconnect()
    {
        self::$connection = null;
    }
}