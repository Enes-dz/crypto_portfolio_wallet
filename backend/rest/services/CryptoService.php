<?php
require_once 'BaseService.php';
require_once __DIR__ . '/../dao/CryptoDao.php';

class CryptoService extends BaseService{
    public function __construct(){
        $this->crypto_dao = new CryptoDao();
        parent::__construct($this->crypto_dao);
    }
    public function get_crypto_by_symbol($symbol){
        return $this->crypto_dao->get_crypto_by_symbol($symbol);
    }
    public function get_all_cryptos(){
        return $this->crypto_dao->get_all_cryptos();
    }
    public function delete_crypto_by_id($id){
        return $this->crypto_dao->delete_crypto_by_id($id);
    }
}