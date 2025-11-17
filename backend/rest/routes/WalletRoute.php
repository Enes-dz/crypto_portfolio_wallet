<?php

/**
 * @OA\Post(
 *     path="/wallet_service/new_wallet",
 *     tags={"Wallets"},
 *     summary="Create new wallet",
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             required={"chain_symbol", "username", "crypto_symbol"},
 *             @OA\Property(property="chain_symbol", type="string", example="ETH"),
 *             @OA\Property(property="username", type="string", example="enes.dzihanovic"),
 *             @OA\Property(property="crypto_symbol", type="string", example="ETH")
 *         )
 *     ),
 *     @OA\Response(
 *         response="200",
 *         description="Wallet created successfully"
 *         )
 *     )
 */

Flight::route('POST /wallet_service/new_wallet', function(){
    $data = Flight::request()->data->getData();
    $new_wallet = Flight::wallet_service()->createWallet($data);
    Flight::json($new_wallet);
});
/**
 * @OA\Delete(
 *     path="/wallet_service/@id",
 *     tags={"Wallets"},
 *     summary="Delete Wallet",
 *     @OA\Parameter(
 *         name = "id",
 *         in="path",
 *         required=true,
 *         description="Wallet id",
 *         @OA\Schema(type="integer", example=1)
 *     ),
 *     @OA\Response(
 *         response="200",
 *         description="Wallet deleted successfully"
 *         )
 *     )
 */
Flight::route('DELETE /wallet_service/@id', function($id){
    $wallet = Flight::wallet_service()->delete_wallet($id);
    Flight::json($wallet);
});