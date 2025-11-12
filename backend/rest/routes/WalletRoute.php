<?php

Flight::route('POST /wallet_service/new_wallet', function(){
    $data = Flight::request()->data->getData();
    $new_wallet = Flight::wallet_service()->createWallet($data);
    Flight::json($new_wallet);
});
Flight::route('DELETE /wallet_service/@id', function($id){
    $wallet = Flight::wallet_service()->delete_wallet($id);
    Flight::json($wallet);
});