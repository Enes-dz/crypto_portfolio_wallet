<?php
require 'vendor/autoload.php'; //run autoloader
require_once __DIR__ . '/rest/services/AuthService.php';
require_once __DIR__ . '/rest/services/WalletService.php';
require_once __DIR__ . '/rest/services/AdminService.php';
require_once __DIR__ . '/rest/services/UsersService.php';
require_once __DIR__ . '/rest/services/ChainsService.php';
require_once __DIR__ . '/rest/services/CryptoService.php';
require_once __DIR__ . '/rest/services/CryptoChainsService.php';
require_once __DIR__ . '/rest/services/UserBalancesService.php';
require_once __DIR__ . '/rest/services/UserWalletsService.php';

Flight::register('auth_service', 'AuthService');
Flight::register('wallet_service', 'WalletService');
Flight::register('admin_service', 'AdminService');
Flight::register('users_service', 'UsersService');
Flight::register('chains_service', 'ChainsService');
Flight::register('crypto_service', 'CryptoService');
Flight::register('crypto_chains_service', 'CryptoChainsService');
Flight::register('user_balances', 'UserBalancesService');
Flight::register('user_wallets_service', 'UserWalletsService');

Flight::route('GET /', function(){
    
    Flight::json([
        'message' => 'Welcome to Crypto Portfolio Wallet'
    ]);
});





require_once __DIR__ . '/rest/routes/AuthRoute.php';
require_once __DIR__ . '/rest/routes/AdminRoute.php';
require_once __DIR__ . '/rest/routes/WalletRoute.php';
require_once __DIR__ . '/rest/routes/CryptoRoute.php';
require_once __DIR__ . '/rest/routes/UserWalletsRoute.php';
require_once __DIR__ . '/rest/routes/UserBalancesRoute.php';
require_once __DIR__ . '/rest/routes/ChainsRoute.php';
require_once __DIR__ . '/rest/routes/UsersRoute.php';
require_once __DIR__ . '/rest/routes/CryptoChainsRoute.php';

Flight::start();  //start FlightPHP
?>
