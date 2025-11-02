<?php
require_once 'BaseDao.php';

class WalletsDao extends BaseDao{
    protected $table_name;

    public function __construct(){
        $this->table_name = 'wallets';
        parent::__construct($this->table_name);
    }
}