<?php


namespace common\dao;


class UserDao extends BaseDao
{

    protected $_primaryKey = 'id';

    protected $_tableName = 'user';

    public function getUserByFirstName($name)
    {
        return $this->fetch($name, 'firstName');
    }
}