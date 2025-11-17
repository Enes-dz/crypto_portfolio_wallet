<?php
require_once 'BaseDao.php';
require_once 'ChainsDao.php';
require_once 'CryptoDao.php';
require_once 'UsersDao.php';
require_once 'UserBalancesDao.php';
require_once 'WalletsDao.php';
require_once 'CryptoChainWalletsDao.php';
require_once 'CryptoChainsDao.php';
require_once 'UserWalletsDao.php';

$chains_dao = new ChainsDao();
$crypto_dao = new CryptoDao();
$users_dao = new UsersDao();
$user_balances_dao = new UserBalancesDao();
$wallets_dao = new WalletsDao();
$crypto_chain_wallets_dao = new CryptoChainWalletsDao();
$crypto_chains_dao = new CryptoChainsDao();
$user_wallets_dao = new UserWalletsDao();




$wallets_dao->delete_wallet_by_id(1);
