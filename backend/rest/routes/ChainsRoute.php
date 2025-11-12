<?php

Flight::route('GET /chains_service/chains', function(){
    $chains = Flight::chains_service()->get_all_chains();
    Flight::json($chains);
});
Flight::route('GET /chains_service/chain/@symbol', function($symbol){
    $chain = Flight::chains_service()->get_chain_by_symbol($symbol);
    Flight::json($chain);
});