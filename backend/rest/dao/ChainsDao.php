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
}