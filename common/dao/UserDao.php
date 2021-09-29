<?php

declare(strict_types=1);
/**
 * This file is part of Shoplinke.
 * Developed By Middle Platform Team Of Starlinke
 *
 * @link     https://www.starlinke.com
 * @document https://starlink.feishu.cn/docs/doccnuhsKZVumq24kIecc4oefbf
 * $contact  dev@starlinke.com
 */
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
