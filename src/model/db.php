 <?php

    require_once(dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . "vendor" . DIRECTORY_SEPARATOR . "autoload.php");

    $dotenv = Dotenv\Dotenv::createImmutable("./../");
    $dotenv->load();

    class DB
    {

        public function openDBConnexion()
        {
            $tempDbConnexion = null;
            $sqlDriver = 'mysql';
            $hostname = '127.0.0.1';
            $port = 3306;
            $charset = 'utf8';
            $dbName = 'snows';
            $userName = $_ENV['USER_NAMEE'];
            $userPwd = $_ENV['USER_PASSWORD'];
            // $dsn = "mysql:host=" . $hostname . ';dbname=' . $dbName . ';port=' . $port . ';charset=' . $charset;
            //$tempDbConnexion = new PDO($dsn, $userName, $userPwd);


            try {
                $dsn = new PDO('mysql:host=127.0.0.1;dbname=snows', $userName, $userPwd);
                return $dsn;
            } catch (PDOException $exception) {
                echo 'Connection failed: ' . $exception->getMessage();
            }
            return $tempDbConnexion;
        }

        public function executeQuerySelect($query)
        {
            $queryResult = null;
            $dbConnexion = $this->openDBConnexion();

            if ($dbConnexion != null) {
                $statement = $dbConnexion->prepare($query);
                $statement->execute();
                $queryResult = $statement->fetchAll();
            }

            $dbConnexion = null;
            return $queryResult;
        }
    }
    ?>