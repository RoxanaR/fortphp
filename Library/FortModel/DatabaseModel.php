<?php
namespace FortModel;

class DatabaseModel {
    private $connection;

    public function __construct()
    {
        $this->databaseConnect();
    }

    /**
     * Connect to mysqli database. Return true if successfully connect to db.
     * If error return false and print on screen error message.
     * @return boolean {true | false}
     */
    public function databaseConnect()
    {
        $this->connection = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
        if (mysqli_connect_errno()) {
            echo mysqli_connect_error();
            return false;
        }
        return true;
    }

    /**
     * Close database connection.
     * @return boolean {true | false} - returns true if successfully closed
     */
    public function databaseDisconnect()
    {
        return mysqli_close($this->getConnection());
    }

    /**
     * Returns db connection.
     * @return mysqli connection
     */
    public function getConnection()
    {
        return $this->connection;
    }

    public function query($sql, $mappedObject)
    {
        $request = mysqli_query($this->getConnection(), $sql);
        $result = array();
        while ($row = mysqli_fetch_object($request, $mappedObject)) {
            $result[] = $row;
        }
        return $result;
    }
}
