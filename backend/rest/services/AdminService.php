<?php
require_once 'BaseService.php';
require_once __DIR__ . '/../dao/UsersDao.php';
require_once __DIR__ . '/../dao/WalletsDao.php';
require_once __DIR__ . '/../dao/ChainsDao.php';
require_once __DIR__ . '/../dao/CryptoDao.php';
require_once __DIR__ . '/../dao/UserWalletsDao.php';
require_once __DIR__ . '/../dao/CryptoChainsDao.php';
require_once __DIR__ . '/../dao/UserBalancesDao.php';

class AdminService extends BaseService{
    public function __construct(){
        $this->users_dao = new UsersDao();
        $this->wallets_dao = new WalletsDao();
        $this->chains_dao = new ChainsDao();
        $this->crypto_dao = new CryptoDao();
        $this->user_wallets_dao = new UserWalletsDao();
        $this->crypto_chains_dao = new CryptoChainsDao();
        $this->user_balances_dao = new UserBalancesDao();

        parent::__construct($this->users_dao);
    }
    public function update_user_role($user_id, $new_role){
        return $this->users_dao->update_user_role($new_role, $user_id);
    }
    public function update_user_password($user_id, $new_password){
        $new_password = password_hash($new_password, PASSWORD_BCRYPT);
        return $this->users_dao->update_password($new_password, $user_id);
    }
    // $entity = ['name' => '', 'symbol' => '', 'color' => '', 'logo' => ''], $chain_symbols = ['ETH', 'BTC' ...]
    public function insert_new_crypto($entity, $chains){
        $new_crypto = $this->crypto_dao->create_new_crypto($entity);
        $chain_ids = [];
        foreach ($chains as $chain_symbol){
            $chain_id = $this->chains_dao->get_chain_by_symbol($chain_symbol);
            $chain_ids[] = $chain_id;
        }

        foreach ($chain_ids as $chain_id){
            $this->crypto_chains_dao->create_new_crypto_chain(["crypto_id" => $new_crypto['id'], "chain_id" => $chain_id["id"]]);
        }
        return $new_crypto;
    }
        // $entity = ['name' => '', 'symbol' => '', 'rpc_url' => '']
    public function insert_new_chain($entity){
        return $this->chains_dao->create_new_chain($entity);
    }
    public function update_user_balance($user_email, $crypto_symbol, $new_balance, $wallet_address, $chain_symbol){
        $user_id = $this->users_dao->get_user_by_email($user_email)['id'];
        $crypto_id = $this->crypto_dao->get_crypto_by_symbol($crypto_symbol)['id'];
        $chain_id = $this->chains_dao->get_chain_by_symbol($chain_symbol)['id'];
        $wallet_id = $this->wallets_dao->get_wallet_by_address_and_chain($wallet_address, $chain_id)['id'];
        
        $user_wallet_id = $this->user_wallets_dao->get_user_wallet_by_user_id_and_wallet_id($user_id, $wallet_id)['id'];
        $crypto_chain_id = $this->crypto_chains_dao->get_crypto_chain_by_chain_and_crypto_id($chain_id, $crypto_id)['id'];
        $user_balance = $this->user_balances_dao->get_user_balance_by_user_wallets_and_crypto_chains_id($user_wallet_id, $crypto_chain_id);
        return $this->user_balances_dao->update_user_balance_total($new_balance, $user_balance['id']);   
    }
    
}
