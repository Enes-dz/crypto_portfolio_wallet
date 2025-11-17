<?php
/**
 * @OA\Patch(
 *     path="/user/change_password",
 *     tags={"Users"},
 *     summary="Update user password",
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             required={"email", "current_password", "new_password"},
 *             @OA\Property(property="email", type="string", example="enes.dzihanovic@stu.ibu.edu.ba"),
 *             @OA\Property(property="current_password", type="string", example="user123"),
 *             @OA\Property(property="new_password", type="string", example="user1234")
 *         )
 *     ),
 *     @OA\Response(
 *         response="200",
 *         description="User password updated successfully"
 *         )
 *     )
 */

Flight::route('PATCH /user/change_password', function(){
    $data = Flight::request()->data->getData();
    $user = Flight::users_service()->changePassword($data);
    Flight::json($user);
});
/**
 * @OA\Patch(
 *     path="/user/change_username",
 *     tags={"Users"},
 *     summary="Update user username",
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             required={"email", "new_username"},
 *             @OA\Property(property="email", type="string", example="enes.dzihanovic@stu.ibu.edu.ba"),
 *             @OA\Property(property="new_username", type="string", example="enesdzihanovic")
 *         )
 *     ),
 *     @OA\Response(
 *         response="200",
 *         description="User username updated successfully"
 *         )
 *     )
 */
Flight::route('PATCH /user/change_username', function(){
    $data = Flight::request()->data->getData();
    $user = Flight::users_service()->changeUsername($data);
    Flight::json($user);
});

/**
 * @OA\Delete(
 *     path="/user/delete_user",
 *     tags={"Users"},
 *     summary="Delete user",
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             required={"email"},
 *             @OA\Property(property="email", type="string", example="enes.dzihanovic@stu.ibu.edu.ba")
 *         )
 *     ),
 *     @OA\Response(
 *         response="200",
 *         description="User deleted successfully"
 *         )
 *     )
 */
Flight::route('DELETE /user/delete_user', function(){
    $data = Flight::request()->data->getData();
    $user = Flight::users_service()->delete_user($data);
    Flight::json($user);
});