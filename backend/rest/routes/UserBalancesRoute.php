<?php
/**
 * @OA\Get(
 *     path="/user_balances/@user_id",
 *     tags={"User Balances"},
 *     summary="Retrieve user balances",
 *     @OA\Parameter(
 *         name = "user_id",
 *         in="path",
 *         required=true,
 *         description="User id",
 *         @OA\Schema(type="integer", example=1)
 *     ),
 *     @OA\Response(
 *         response="200",
 *         description="User balances"
 *         )
 *     )
 */
Flight::route('GET /user_balances/@user_id', function($user_id){
    $user_balances = Flight::user_balances()->get_user_balances($user_id);
    Flight::json($user_balances);
});
/**
 * @OA\Post(
 *     path="/user_balances/add_balance",
 *     tags={"User Balances"},
 *     summary="Add balance to user",
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             required={"user_wallets_id", "crypto_chains_id", "value"},
 *             @OA\Property(property="user_wallets_id", type="integer", example=1),
 *             @OA\Property(property="crypto_chains_id", type="integer", example=1),
 *             @OA\Property(property="value", type="integer", example=100)
 *         )
 *     ),
 *     @OA\Response(
 *         response="200",
 *         description="User balance added successfully"
 *         )
 *     )
 */
Flight::route('POST /user_balances/add_balance', function(){
    $data = Flight::request()->data->getData();
    $new_balance = Flight::user_balances()->dummy_add_balance($data['user_wallets_id'], $data['crypto_chains_id'], $data['value']);
    Flight::json($new_balance);
});