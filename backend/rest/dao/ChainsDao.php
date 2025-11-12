<?php

require_once 'BaseDao.php';

class ChainsDao extends BaseDao{
    protected $table_name;

    public function __construct(){
        $this->table_name = 'chains';
        parent::__construct($this->table_name);
    }

    public function get_chain_by_symbol($symbol){
        $query = "SELECT * FROM " . $this->table_name . " WHERE symbol = :symbol";
        return $this->query_unique($query, ['symbol' => $symbol]);
    }

    public function get_chain_by_id($id){
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = :id";
        return $this->query_unique($query, ['id' => $id]);
    }

    public function create_new_chain($entity){
        $params = [
            'name' => $entity['name'],
            'symbol' => $entity['symbol'],
            'rpc_link' => $entity['rpc_link'],
        ];
        return $this->add($params);
    }
    public function get_all_chains(){
        return $this->getAll();
    }
}