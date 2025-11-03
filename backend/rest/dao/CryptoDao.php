<?php

require_once 'BaseDao.php';

class CryptoDao extends BaseDao{
    protected $table_name;

    public function __construct(){
        $this->table_name = 'crypto';
        parent::__construct($this->table_name);
    }
}