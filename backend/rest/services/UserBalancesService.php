<?php
require_once 'BaseService.php';
require_once __DIR__ . '/../dao/UserBalancesDao.php';
require_once __DIR__ . '/../dao/UserWalletsDao.php';
require_once __DIR__ . '/../dao/CryptoChainsDao.php';


class UserBalancesService extends BaseService{
    public function __construct(){
        $this->user_balances_dao = new UserBalancesDao();
        $this->user_wallets_dao = new UserWalletsDao();
        $this->crypto_chains_dao = new CryptoChainsDao();
        parent::__construct($this->user_balances_dao);
    }

    public function get_user_balances($user_id){
        $user_wallets = $this->user_wallets_dao->get_user_wallets_by_user_id($user_id);
        if(empty($user_wallets)){
            return [];
        }
        if(array_is_list($user_wallets) == false){
            $user_balances = [];
            $balances = $this->user_balances_dao->get_user_balances_by_user_wallets_id($user_wallets['id']);
            if(array_is_list($balances) == false){
                $balances = [$balances];
            }
            foreach($balances as $balance){
                $user_balances[] = $balance;
            }
            return $user_balances;
        }
        $user_balances = [];
        foreach($user_wallets as $user_wallet){
            $balances = $this->user_balances_dao->get_user_balances_by_user_wallets_id($user_wallet['id']);
            foreach($balances as $balance){
                $user_balances[] = $balance;
            }
        }
        return $user_balances;
    }
    public function dummy_add_balance($user_wallets_id, $crypto_chains_id, $value){
        $current_user_balance = $this->user_balances_dao->get_user_balance_by_user_wallets_and_crypto_chains_id($user_wallets_id, $crypto_chains_id);
        $new_total = $current_user_balance['total'] + $value;
        return $this->user_balances_dao->update_user_balance_total($new_total, $current_user_balance['id']);
    }
    
}