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
                    $port = $_ENV['PORT'];
                    $hostName = $_ENV['HOST_NAME'];
                    $databaseName = $_ENV['DATABASE_NAME'];
                    $userName = $_ENV['USER_NAME'];
                    $userPassword = $_ENV['USER_PASSWORD'];

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
        public function executeQuerySelect($query)
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
        public static function disconnect()
        {
            self::$connection = null;
        }
    }
    ?>