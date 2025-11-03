<?php
require_once 'BaseDao.php';

class CryptoChainsDao extends BaseDao{
    protected $table_name;

    public function __construct(){
        $this->table_name = 'crypto_chains';
        parent::__construct($this->table_name);
    }
}