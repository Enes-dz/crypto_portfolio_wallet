<?php

Flight::route('POST /admin_service/new_chain', function(){
    $data = Flight::request()->data->getData();
    $new_chain = Flight::admin_service()->insert_new_chain($data);
    Flight::json($new_chain);
});
Flight::route('POST /admin_service/new_crypto', function(){
    $data = Flight::request()->data->getData();
    $new_crypto = Flight::admin_service()->insert_new_crypto($data['entity'], $data['chains']);
    Flight::json($new_crypto);
});
Flight::route('PATCH /admin_service/user_role/@user_id/@new_role', function($user_id, $new_role){
    $user = Flight::admin_service()->update_user_role($user_id, $new_role);
    Flight::json($user);
});
Flight::route('PATCH /admin_service/password/@user_id/@new_password', function($user_id, $new_password){
    $user = Flight::admin_service()->update_user_password($user_id, $new_password);
    Flight::json($user);
});
Flight::route('PATCH /admin_service/user_balance', function(){
    $data = Flight::request()->data->getData();
    $updated_balance = Flight::admin_service()->update_user_balance($data['user_email'], $data['crypto_symbol'], $data['new_balance'], $data['wallet_address'], $data['chain_symbol']);
    Flight::json($updated_balance);
});