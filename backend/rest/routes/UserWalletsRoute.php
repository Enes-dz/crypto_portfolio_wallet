<?php

Flight::route('DELETE /user_wallets_service/@id', function($id){
    $user_wallet = Flight::user_wallets_service()->delete_user_wallet_by_id($id);
    Flight::json($user_wallet);
});