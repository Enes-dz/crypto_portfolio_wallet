<?php
require_once 'BaseDao.php';

class WalletsDao extends BaseDao{
    protected $table_name;

    public function __construct(){
        $this->table_name = 'wallets';
        parent::__construct($this->table_name);
    }
    public function get_wallet_by_id($id){
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = :id";
        return $this->query_unique($query, ['id' => $id]);
    }
    public function get_wallet_by_address($address){
        $query = "SELECT * FROM " . $this->table_name . " WHERE address = :address";
        return $this->query_unique($query, ['address' => $address]);
    }
    public function get_wallets_by_id_array($id_array){
        $placeholders = implode(',', array_fill(0, count($id_array), '?'));
        $query = "SELECT * FROM " . $this->table_name . " WHERE id IN ({$placeholders})";
        return $this->query_unique($query, $id_array);
    }
    public function create_new_wallet($address, $private_key, $chain_id){
        $params = [
            'address' => $address,
            'seed_phrase' => $private_key,
            'chain_id' => $chain_id
        ];
        return $this->add($params);
    }
    public function delete_wallet_by_id($id){
        return $this->delete($id);
    }
    public function get_wallet_by_address_and_chain($address, $chain_id){
        $query = "SELECT * FROM " . $this->table_name . " WHERE address = :address AND chain_id = :chain_id";
        return $this->query_unique($query, ['address' => $address, 'chain_id' => $chain_id]);
    }
}