 <?php class DB
    {

        public function __construct()
        {
        }

        public function openDBConnexion()
        {
            $tempDbConnexion = null;
            $sqlDriver = 'mysql';
            $hostname = '127.0.0.1';
            $port = 3306;
            $charset = 'utf8';
            $dbName = 'snows';
            $userName = 'bes';
            $userPwd = 'Golan-1815';
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

        public function getSnows()
        {
            $sql = "SELECT * FROM snows order by idSnow";
            $result = $this->executeQuerySelect($sql);
            return $result;
        }

        public function updateSnow()
        {
            // $sql = "DELETE FROM snows where idSnow=$_GET[idSnow]";
            // $result = $this->executeQuerySelect($sql);
            // return $result;
        }

        public function deleteSnow()
        {
            $sql = "DELETE FROM snows where idSnow=$_GET[idSnow]";
            $result = $this->executeQuerySelect($sql);
            return $result;
        }
    }
    ?>