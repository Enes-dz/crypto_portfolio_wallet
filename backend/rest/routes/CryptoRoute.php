<?php
/**
 * @OA\Delete(
 *     path="/crypto_service/@id",
 *     tags={"Crypto"},
 *     summary="Delete crypto",
 *     @OA\Parameter(
 *         name = "id",
 *         in="path",
 *         required=true,
 *         description="Chain id",
 *         @OA\Schema(type="integer", example=1)
 *     ),
 *     @OA\Response(
 *         response="200",
 *         description="Crypto deleted successfully"
 *         )
 *     )
 */

Flight::route('DELETE /crypto_service/@id', function($id){
    $crypto = Flight::crypto_service()->delete_crypto_by_id($id);
    Flight::json($crypto);
});
/**
 * @OA\Get(
 *     path="/crypto_service/cryptos",
 *     tags={"Crypto"},
 *     summary="Retrieve all cryptos",
 *     @OA\Response(
 *         response="200",
 *         description="All Crpytos"
 *         )
 *     )
 */

Flight::route('GET /crypto_service/cryptos', function(){
    $cryptos = Flight::crypto_service()->get_all_cryptos();
    Flight::json($cryptos);
});

/**
 * @OA\Get(
 *     path="/crypto_service/crypto/@symbol",
 *     tags={"Crypto"},
 *     summary="Retrieve all crypto by symbol",
 *     @OA\Parameter(
 *         name = "symbol",
 *         in="path",
 *         required=true,
 *         description="Chain symbol",
 *         @OA\Schema(type="string", example="ETH")
 *     ),
 *     @OA\Response(
 *         response="200",
 *         description="Crypto by symbol"
 *         )
 *     )
 */

Flight::route('GET /crypto_service/crypto/@symbol', function($symbol){
    $crypto = Flight::crypto_service()->get_crypto_by_symbol($symbol);
    Flight::json($crypto);
});