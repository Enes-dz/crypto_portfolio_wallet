<?php
require_once 'BaseDao.php';

class UserBalancesDao extends BaseDao{
    protected $table_name;

    public function __construct(){
        $this->table_name = 'user_balances';
        parent::__construct($this->table_name);
    }

    public function get_user_balance_by_user_wallets_and_crypto_chains_id($user_wallets_id, $crypto_chains_id){ 
        $query = "SELECT * FROM " . $this->table_name . " WHERE user_wallets_id = :user_wallets_id AND crypto_chains_id = :crypto_chains_id";
        return $this->query_unique($query, ['user_wallets_id' => $user_wallets_id, 'crypto_chains_id' => $crypto_chains_id]);
    }
    public function create_new_user_balance($user_wallets_id, $crypto_chains_id){
        $params = [
            'user_wallets_id' => $user_wallets_id,
            'crypto_chains_id' => $crypto_chains_id,
            'total' => 0
        ];
        return $this->add($params);
    }
    public function get_user_balances_by_user_wallets_id($user_wallets_id){
        $query = "SELECT * FROM " . $this->table_name . " WHERE user_wallets_id = :user_wallets_id";
        return $this->query_unique($query, ['user_wallets_id' => $user_wallets_id]);
    }
    public function update_user_balance_total($new_total, $user_balance_id){
        $params = [
            'total' => $new_total,
        ];
        return $this->update($params, $user_balance_id);
    }

}