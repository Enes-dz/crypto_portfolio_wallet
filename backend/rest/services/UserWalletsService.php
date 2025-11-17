<?php
require_once 'BaseService.php';
require_once __DIR__ . '/../dao/UserWalletsDao.php';

class UserWalletsService extends BaseService{
    public function __construct(){
        $this->user_wallets_dao = new UserWalletsDao();
        parent::__construct($this->user_wallets_dao);
    }
    public function delete_user_wallet_by_id($id){
        return $this->user_wallets_dao->delete_user_wallet_by_id($id);
    }
}