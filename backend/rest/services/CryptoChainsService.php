<?php
require_once 'BaseService.php';
require_once __DIR__ . '/../dao/CryptoChainsDao.php';
require_once __DIR__ . '/../dao/CryptoDao.php';
require_once __DIR__ . '/../dao/ChainsDao.php';

class CryptoChainsService extends BaseService{
    public function __construct(){
        $this->crypto_chains_dao = new CryptoChainsDao();
        $this->crypto_dao = new CryptoDao();
        $this->chains_dao = new ChainsDao();
        parent::__construct($this->crypto_chains_dao);
    }
    public function get_chains_for_crypto_symbol($crypto_symbol){
        $crypto = $this->crypto_dao->get_crypto_by_symbol($crypto_symbol);
        $crypto_chains = $this->crypto_chains_dao->get_crypto_chain_by_crypto_id($crypto['id']);
        if(array_is_list($crypto_chains) == false){
            return [$this->chains_dao->get_chain_by_id($crypto_chains['chain_id'])];
        }
        $chains = [];
        foreach($crypto_chains as $crypto_chain){
            $chains[] = $this->chains_dao->get_chain_by_id($crypto_chain['chain_id']);
        }
        return $chains;
        
    }    
}