<?php

Flight::route('GET /crypto_chains_service/chains_for_token/@crypto_symbol', function($crypto_symbol){
    $chains = Flight::crypto_chains_service()->get_chains_for_crypto_symbol($crypto_symbol);
    Flight::json($chains);
});