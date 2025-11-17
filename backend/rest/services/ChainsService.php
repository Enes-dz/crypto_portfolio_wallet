<?php
require_once 'BaseService.php';
require_once __DIR__ . '/../dao/ChainsDao.php';

class ChainsService extends BaseService{
    public function __construct(){
        $this->chains_dao = new ChainsDao();
        parent::__construct($this->chains_dao);
    }
    public function get_chain_by_symbol($symbol){
        return $this->chains_dao->get_chain_by_symbol($symbol);
    }
    public function get_all_chains(){
        return $this->chains_dao->get_all_chains();
    }
}