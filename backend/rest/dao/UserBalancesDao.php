<?php
require_once 'BaseDao.php';

class UserBalancesDao extends BaseDao{
    protected $table_name;

    public function __construct(){
        $this->table_name = 'user_balances';
        parent::__construct($this->table_name);
    }

}