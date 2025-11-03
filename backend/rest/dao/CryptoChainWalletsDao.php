<?php
require_once 'BaseDao.php';

class CryptoChainWalletsDao extends BaseDao{
    protected $table_name;

    public function __construct(){
        $this->table_name = 'crypto_chain_wallets';
        parent::__construct($this->table_name);
    }
}