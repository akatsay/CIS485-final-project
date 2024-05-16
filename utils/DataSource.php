<?php

class DataSource {

    private $connection;
        
    /**
     * PHP implicitly takes care of cleanup for default database connection types.
     * So no need to close connection explicitly.
     *
     * Singletons not required in PHP as there is no concept of shared memory.
     * Every object lives only for a request.
     *
     * Keeping things simple and that works!
     */
    function __construct()
    {
        $this->connection = $this->getConnection();
    }

    public function getConnection()
    {
        $db =
        "(DESCRIPTION =
        (ADDRESS = (PROTOCOL = TCP)(HOST = 10.0.2.15)(PORT = 8989))
        (CONNECT_DATA =
        (SERVER = DEDICATED)
        (SERVICE_NAME = KATSAY1)
        )
        )";
        $connection = new PDO("oci:dbname=".$db, 'alexandr', 'alexandr');
        return $connection;
    }
    
    private function runQuery($query, $paramArray) {
        $statement = $this->connection->prepare($query);
        foreach ($paramArray as $key => $value) {
            $statement->bindValue($key, $value);
        }
        $statement->execute();
        return $statement;
    }

    public function insert($query, $paramArray) {
        $statement = $this->runQuery($query, $paramArray);
        return $statement->rowCount(); // Return the number of affected rows
    }
      
}

?>