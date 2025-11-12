<?php
Flight::route('GET /user_balances/@user_id', function($user_id){
    $user_balances = Flight::user_balances()->get_user_balances($user_id);
    Flight::json($user_balances);
});

Flight::route('POST /user_balances/add_balance', function(){
    $data = Flight::request()->data->getData();
    $new_balance = Flight::user_balances()->dummy_add_balance($data['user_wallets_id'], $data['crypto_chains_id'], $data['value']);
    Flight::json($new_balance);
});