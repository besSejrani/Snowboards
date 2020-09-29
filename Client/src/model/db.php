<?php

require_once(dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . "vendor" . DIRECTORY_SEPARATOR . "autoload.php");
$dotenv = Dotenv\Dotenv::createImmutable("./../");
$dotenv->load();

class DB
{
    private static $connection = null;


    /**
     * @return [type]
     */
    public function connect()
    {
        if (self::$connection == null) {
            try {

                $port = $_ENV['MYSQL_PORT'];
                $hostName = $_ENV['MYSQL_HOSTNAME'];
                $databaseName = $_ENV['MYSQL_DATABASE'];
                $userName = $_ENV['MYSQL_USER'];
                $userPassword = $_ENV['MYSQL_PASSWORD'];

                return new PDO('mysql:host=' . $hostName . ';dbname=' . $databaseName . ';port=' . $port, $userName, $userPassword);
            } catch (PDOException $exception) {
                echo 'Connection failed: ' . $exception->getMessage();
            }
        }
        return self::$connection;
    }

    /**
     * @param mixed $query
     * 
     * @return [type]
     */
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

    /**
     * @return [type]
     */
    public static function Disconnect()
    {
        self::$connection = null;
    }
}
