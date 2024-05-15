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

       /**
     * To read database.
     *
     * @param string $query
     * @param string $paramType
     * @param array $paramArray
     * @return array
     */
    public function select($query, $paramType = "", $paramArray = array())
    {
        $statement = $this->execute($query, $paramType, $paramArray);
        $result = $statement->get_result();
        
        if ($result->num_rows > 0) {
            $resultset = null;
            while ($row = $result->fetch_assoc()) {
                $resultset[] = $row;
            }
            return $resultset;
        }
    }
    
    public function insert($query, $paramType, $paramArray)
    {
        $statement = $this->execute($query, $paramType, $paramArray);
        return $statement->insert_id;
    }
    
    public function update($query, $paramType, $paramArray)
    {
        $statement = $this->execute($query, $paramType, $paramArray);
        $affectedRows = $statement->affected_rows;
        return $affectedRows;
    }
    
    public function delete($query, $paramType, $paramArray)
    {
        $statement = $this->execute($query, $paramType, $paramArray);
        $affectedRows = $statement->affected_rows;
        return $affectedRows;
    }
    
    public function getRecordCount($query, $paramType = "", $paramArray = array())
    {
        $statement = $this->execute($query, $paramType, $paramArray);
        $statement->store_result();
        return $statement->num_rows;
    }
}

?>