<?php
Flight::route('DELETE /crypto_service/@id', function($id){
    $crypto = Flight::crypto_service()->delete_crypto_by_id($id);
    Flight::json($crypto);
});

Flight::route('GET /crypto_service/cryptos', function(){
    $cryptos = Flight::crypto_service()->get_all_cryptos();
    Flight::json($cryptos);
});
Flight::route('GET /crypto_service/crypto/@symbol', function($symbol){
    $crypto = Flight::crypto_service()->get_crypto_by_symbol($symbol);
    Flight::json($crypto);
});