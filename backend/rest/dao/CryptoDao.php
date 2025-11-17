<?php

require_once 'BaseDao.php';

class CryptoDao extends BaseDao{
    protected $table_name;

    public function __construct(){
        $this->table_name = 'crypto';
        parent::__construct($this->table_name);
    }

    public function get_crypto_by_symbol($symbol){
        $query = "SELECT * FROM " . $this->table_name . " WHERE symbol = :symbol";
        return $this->query_unique($query, ['symbol' => $symbol]);
    }
    public function create_new_crypto($entity){
        $params = [
            'name' => $entity['name'],
            'symbol' => $entity['symbol'],
            'color' => $entity['color'],
            'logo' => $entity['logo']
        ];
        return $this->add($params);
    }
    public function get_all_cryptos(){
        return $this->getAll();
    }
    public function delete_crypto_by_id($id){
        return $this->delete($id);
    }
}