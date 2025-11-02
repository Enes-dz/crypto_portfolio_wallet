<?php
require_once 'BaseDao.php';

class UserWalletsDao extends BaseDao{
    protected $table_name;

    public function __construct(){
        $this->table_name = 'user_wallets';
        parent::__construct($this->table_name);
    }
}