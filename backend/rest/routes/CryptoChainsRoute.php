<?php
/**
 * @OA\Get(
 *     path="/crypto_chains_service/chains_for_token/@crypto_symbol",
 *     tags={"Crypto Chains"},
 *     summary="Get all chains for crypto symbol",
 *     @OA\Parameter(
 *         name = "crypto_symbol",
 *         in="path",
 *         required=true,
 *         description="Crypto symbol",
 *         @OA\Schema(type="string", example="ETH")
 *     ),
 *     @OA\Response(
 *         response="200",
 *         description="Chains for crypto symbol"
 *         )
 *     )
 */


Flight::route('GET /crypto_chains_service/chains_for_token/@crypto_symbol', function($crypto_symbol){
    $chains = Flight::crypto_chains_service()->get_chains_for_crypto_symbol($crypto_symbol);
    Flight::json($chains);
});