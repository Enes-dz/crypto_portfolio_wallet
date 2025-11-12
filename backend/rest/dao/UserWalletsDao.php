<?php
require_once 'BaseDao.php';

class UserWalletsDao extends BaseDao{
    protected $table_name;

    public function __construct(){
        $this->table_name = 'user_wallets';
        parent::__construct($this->table_name);
    }
    public function get_user_wallets_by_user_id($user_id){
        $query = "SELECT * FROM " . $this->table_name . " WHERE user_id = :user_id";
        return $this->query_unique($query, ['user_id' => $user_id]);
    }
    public function get_user_wallets_by_wallet_id($wallet_id){
        $query = "SELECT * FROM " . $this->table_name . " WHERE wallet_id = :wallet_id";
        return $this->query_unique($query, ['wallet_id' => $wallet_id]);
    }
    public function get_user_wallet_by_user_id_and_wallet_id($user_id, $wallet_id){
        $query = "SELECT * FROM " . $this->table_name . " WHERE user_id = :user_id AND wallet_id = :wallet_id";
        return $this->query_unique($query, ['user_id' => $user_id, 'wallet_id' => $wallet_id]);
    }
    public function create_new_user_wallet($user_id, $wallet_id){
        $params = [
            'user_id' => $user_id,
            'wallet_id' => $wallet_id
        ];
        return $this->add($params);
    }
    public function delete_user_wallet_by_id($id){
        return $this->delete($id);
    }
}