<?php

/**
 * @OA\Post(
 *     path="/admin_service/new_chain",
 *     tags={"Admin"},
 *     summary="Insert new chain",
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             required={"name", "symbol", "rpc_url"},
 *             @OA\Property(property="name", type="string", example="Ethereum"),
 *             @OA\Property(property="symbol", type="string", example="ETH"),
 *             @OA\Property(property="rpc_url", type="string", example="https://mainnet.infura.io/v3/e4e8f9f0c5f64c1c8c2d1d5d0a2e0f4c")
 *         )
 *     ),
 *     @OA\Response(
 *         response="200",
 *         description="Chain created"
 *         )
 *     )
 */
Flight::route('POST /admin_service/new_chain', function(){
    $data = Flight::request()->data->getData();
    $new_chain = Flight::admin_service()->insert_new_chain($data);
    Flight::json($new_chain);
});

/**
 * @OA\Post(
 *     path="/admin_service/new_crypto",
 *     tags={"Admin"},
 *     summary="Insert new Crypto",
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             required={"entity", "chains"},
 *             @OA\Property(property="entity", 
 *                 type="object",
 *                 @OA\Property(property="name", type="string", example="Ethereum"),
 *                 @OA\Property(property="symbol", type="string", example="ETH"),
 *                 @OA\Property(property="color", type="string", example="#00ff00"),
 *                 @OA\Property(property="logo", type="string", example="https://cryptologos.cc/logos/ethereum-eth-logo.png")
 *             ),
 *             @OA\Property(property="chains", type="array", @OA\Items(type="string"), example={"ETH", "BTC"})
 *         )
 *     ),
 *     @OA\Response(
 *         response="200",
 *         description="Crypto created"
 *         )
 *     )
 */


Flight::route('POST /admin_service/new_crypto', function(){
    $data = Flight::request()->data->getData();
    $new_crypto = Flight::admin_service()->insert_new_crypto($data['entity'], $data['chains']);
    Flight::json($new_crypto);
});
/**
 * @OA\Patch(
 *     path="/admin_service/user_role/@user_id/@new_role",
 *     tags={"Admin"},
 *     summary="Update user role",
 *     @OA\Parameter(
 *         name = "user_id",
 *         in="path",
 *         required=true,
 *         description="User id",
 *         @OA\Schema(type="integer", example=1)
 *     ),
 *     @OA\Parameter(
 *         name = "new_role",
 *         in="path",
 *         required=true,
 *         description="New role",
 *         @OA\Schema(type="string", example="admin")
 *     ),
 *     @OA\Response(
 *         response="200",
 *         description="User role updated successfully"
 *         )
 *     )
 */

Flight::route('PATCH /admin_service/user_role/@user_id/@new_role', function($user_id, $new_role){
    $user = Flight::admin_service()->update_user_role($user_id, $new_role);
    Flight::json($user);
});
/**
 * @OA\Patch(
 *     path="/admin_service/password/@user_id/@new_password",
 *     tags={"Admin"},
 *     summary="Update user password",
 *     @OA\Parameter(
 *         name = "user_id",
 *         in="path",
 *         required=true,
 *         description="User id",
 *         @OA\Schema(type="integer", example=1)
 *     ),
 *     @OA\Parameter(
 *         name = "new_password",
 *         in="path",
 *         required=true,
 *         description="New password",
 *         @OA\Schema(type="string", example="user123")
 *     ),
 *     @OA\Response(
 *         response="200",
 *         description="User password updated successfully"
 *         )
 *     )
 */
Flight::route('PATCH /admin_service/password/@user_id/@new_password', function($user_id, $new_password){
    $user = Flight::admin_service()->update_user_password($user_id, $new_password);
    Flight::json($user);
});
/**
 * @OA\Patch(
 *     path="/admin_service/user_balance",
 *     tags={"Admin"},
 *     summary="Update user balance",
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             required={"user_email", "crypto_symbol", "new_balance", "wallet_address", "chain_symbol"},
 *             @OA\Property(property="user_email", type="string", example="enes.dzihanovic@stu.ibu.edu.ba"),
 *             @OA\Property(property="crypto_symbol", type="string", example="ETH"),
 *             @OA\Property(property="new_balance", type="integer", example=100),
 *             @OA\Property(property="wallet_address", type="string", example="0x1234567890"),
 *             @OA\Property(property="chain_symbol", type="string", example="ETH")
 *         )
 *     ),
 *     @OA\Response(
 *         response="200",
 *         description="User password updated successfully"
 *         )
 *     )
 */
Flight::route('PATCH /admin_service/user_balance', function(){
    $data = Flight::request()->data->getData();
    $updated_balance = Flight::admin_service()->update_user_balance($data['user_email'], $data['crypto_symbol'], $data['new_balance'], $data['wallet_address'], $data['chain_symbol']);
    Flight::json($updated_balance);
});