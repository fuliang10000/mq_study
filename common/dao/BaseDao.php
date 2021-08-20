<?php


namespace common\dao;


abstract class BaseDao
{
    private $__connection;

    protected $_primaryKey = 'id';

    protected $_tableName;

    public function __construct($user, $pass, $host, $database)
    {
        $this->__connectToDB($user, $pass, $host, $database);
    }

    private function __connectToDB($user, $pass, $host, $database)
    {
        $this->__connection = mysql_connect($host, $user, $pass);
        mysql_select_db($database, $this->__connection);
    }

    public function fetch($value, $key = null)
    {
        if (is_null($key)) {
            $key = $this->_primaryKey;
        }

        $sql = "select * from {$this->_tableName} where {$key} = '{$value}'";
        $results = mysql_query($sql, $this->__connection);

        $rows = [];
        while ($result = mysql_fetch_array($results)) {
            $rows[] =  $result;
        }

        return $rows;
    }

    public function update($keyArray)
    {
        $sql = "update {$this->_tableName} set ";
        $updates = [];
        foreach ($keyArray as $key => $value) {
            if ($this->_primaryKey != $key) {
                $updates[] = " {$key}='{$value}' ";
            }
        }

        $sql .= implode(',', $updates);
        $sql .= " where {$this->_primaryKey}='{$keyArray[$this->_primaryKey]}' ";

        return mysql_query($sql, $this->__connection);
    }
}