<?php
namespace FortModel;
use Entity\Comment;

class GenericEntityModel {

    /**
     * @var $connection mysql connection
     */
    private $connection;

    /**
     * @var $tableName string - mysql table name
     */
    private $tableName;

    /**
     * @var $mappedObject string - name of the class to map on db queries
     */
    private $mappedObject;

    private $databaseModel;

    /**
     * Constructor - init database connection variable.
     * Echo if error.
     */
    public function __construct($tableName, $mappedObject)
    {
        $this->tableName = $tableName;
        $this->mappedObject = $mappedObject;
        $this->databaseModel = new DatabaseModel();
    }

    /**
     * Exec a specific sql query
     * @var $sql string - sql for request
     * @return array - array of objects instantiated by class with the name
     *      stored into the mappedObject class variable
     */
    public function query($sql)
    {
        return $this->getDatabaseModel()->query($sql, $this->mappedObject);
    }

    public function getDatabaseModel()
    {
        return $this->databaseModel;
    }

    /**
     * Returns table name
     * @return string - table name
     */
    public function getTableName()
    {
        return $this->tableName;
    }
}
