<?php

/**
 * @OA\Get(
 *     path="/chains_service/chains",
 *     tags={"Chains"},
 *     summary="Retrieve all chains",
 *     @OA\Response(
 *         response="200",
 *         description="All chains"
 *         )
 *     )
 */

Flight::route('GET /chains_service/chains', function(){
    $chains = Flight::chains_service()->get_all_chains();
    Flight::json($chains);
});
/**
 * @OA\Get(
 *     path="/chains_service/chain/@symbol",
 *     tags={"Chains"},
 *     summary="Retrieve chain by symbol",
 *     @OA\Parameter(
 *         name = "symbol",
 *         in="path",
 *         required=true,
 *         description="Chain symbol",
 *         @OA\Schema(type="string", example="ETH")
 *     ),
 *     @OA\Response(
 *         response="200",
 *         description="Chain info by symbol"
 *         )
 *     )
 */
Flight::route('GET /chains_service/chain/@symbol', function($symbol){
    $chain = Flight::chains_service()->get_chain_by_symbol($symbol);
    Flight::json($chain);
});