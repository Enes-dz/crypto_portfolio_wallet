<?php
require_once 'BaseDao.php';

class CryptoChainsDao extends BaseDao{
    protected $table_name;

    public function __construct(){
        $this->table_name = 'crypto_chains';
        parent::__construct($this->table_name);
    }

    public function get_crypto_chain_by_crypto_id($id){
        $query = "SELECT * FROM " . $this->table_name . " WHERE crypto_id = :id";
        return $this->query_unique($query, ['id' => $id]);
    }
    public function get_crypto_chain_by_chain_id($id){
        $query = "SELECT * FROM " . $this->table_name . " WHERE chain_id = :id";
        return $this->query_unique($query, ['id' => $id]);
    }
    public function get_crypto_chain_by_chain_and_crypto_id($chain_id, $crypto_id){
        $query = "SELECT * FROM " . $this->table_name . " WHERE chain_id = :chain_id AND crypto_id = :crypto_id";
        return $this->query_unique($query, ['chain_id' => $chain_id, 'crypto_id' => $crypto_id]);
    }


    public function create_new_crypto_chain($entity){
        $params = [
            'crypto_id' => $entity['crypto_id'],
            'chain_id' => $entity['chain_id']
        ];
        return $this->add($params);
    }
}