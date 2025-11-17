<?php
/**
 * @OA\Delete(
 *     path="/user_wallets_service/@id",
 *     tags={"User Wallets"},
 *     summary="Delete User Wallet",
 *     @OA\Parameter(
 *         name = "id",
 *         in="path",
 *         required=true,
 *         description="User Wallet id",
 *         @OA\Schema(type="integer", example=1)
 *     ),
 *     @OA\Response(
 *         response="200",
 *         description="User Wallet deleted successfully"
 *         )
 *     )
 */

Flight::route('DELETE /user_wallets_service/@id', function($id){
    $user_wallet = Flight::user_wallets_service()->delete_user_wallet_by_id($id);
    Flight::json($user_wallet);
});