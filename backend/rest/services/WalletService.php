<?php
require_once 'BaseService.php';
require_once __DIR__ . '/../dao/WalletsDao.php';
require_once __DIR__ . '/../dao/UsersDao.php';
require_once __DIR__ . '/../dao/CryptoChainsDao.php';
require_once __DIR__ . '/../dao/UserWalletsDao.php';
require_once __DIR__ . '/../dao/ChainsDao.php';
require_once __DIR__ . '/../dao/CryptoDao.php';
require_once __DIR__ . '/../dao/UserBalancesDao.php';

class WalletService extends BaseService{
    public function __construct(){
        $this->wallets_dao = new WalletsDao();
        $this->users_dao = new UsersDao();
        $this->chains_dao = new ChainsDao();
        $this->crypto_dao = new CryptoDao();
        $this->user_wallets_dao = new UserWalletsDao();
        $this->crypto_chains_dao = new CryptoChainsDao();
        $this->user_balances_dao = new UserBalancesDao();

        parent::__construct($this->wallets_dao);
    }
    //Helper function to create a dummy wallet
    private function create_wallet_helper($network_symbol){
        //Currently creates a dummy wallet, and dummy private key because of complexity of real blockchain wallet generation
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $wallet_address = '';
        $wallet_private_key = '';
        for($i = 0; $i <32; $i++){
            $index = rand(0, $charactersLength - 1);
            $wallet_address .= $characters[$index];
        }
        for($i = 0; $i <48; $i++){
            $index = rand(0, $charactersLength - 1);
            $wallet_private_key .= $characters[$index];
        }
        return ["address" => $wallet_address, "private_key" => $wallet_private_key];
    }
    //Helper function to check if a user has a wallet for a chain
    private function get_if_chain_has_user_wallet($user_wallets, $chain_id){
        if(!$user_wallets){
            return ['has_wallet' => false, 'wallet_address' => ''];
        }
        $wallets_ids = array_column($user_wallets, 'wallet_id');
        $wallets = $this->wallets_dao->get_wallets_by_id_array($wallets_ids);
       
        foreach($wallets as $wallet){
            if($wallet['chain_id'] == $chain_id){
                return ['has_wallet' => true, 'wallet_address' => $wallet['address']];
            }
        }
        return ['has_wallet' => false, 'wallet_address' => ''];

    }
    
    //Entity contains: ["chain_symbol" => "", "username" => "", "crypto_symbol" => ""]
    public function createWallet($entity){
        //retrieve necessary ids
        $chain_id = $this->chains_dao->get_chain_by_symbol($entity['chain_symbol'])['id'];
        $user_id = $this->users_dao->get_user_by_username($entity['username'])['id'];
        $crypto_id = $this->crypto_dao->get_crypto_by_symbol($entity['crypto_symbol'])['id'];
        
        //Check if user has wallet for this chain
        $user_wallets = $this->user_wallets_dao->get_user_wallets_by_user_id($user_id);
        $wallet_already_exists = $this->get_if_chain_has_user_wallet($user_wallets, $chain_id); //Returns ["has_wallet" =>bool, "wallet_address"=>""]
        if($wallet_already_exists['has_wallet']){
            return $this->wallets_dao->get_wallet_by_id($wallet_already_exists['wallet_address']);
        }
        
        //User does not have wallet for this chain
        $new_wallet = $this->create_wallet_helper($entity['chain_symbol']);#Should return address and private key["address" => "", "private_key" => ""]
        $created_wallet = $this->wallets_dao->create_new_wallet($new_wallet['address'], $new_wallet['private_key'], $chain_id);
        //Create new user wallet
        $new_user_wallet = $this->user_wallets_dao->create_new_user_wallet($user_id, $created_wallet['id']);
        $crypto_chain_id = $this->crypto_chains_dao->get_crypto_chain_by_chain_and_crypto_id($chain_id, $crypto_id)['id'];
        $new_user_balance = $this->user_balances_dao->create_new_user_balance($new_user_wallet['id'], $crypto_chain_id, 0);
        return $created_wallet;
    }

    public function delete_wallet($id){
        return $this->wallets_dao->delete_wallet_by_id($id);
    }
}