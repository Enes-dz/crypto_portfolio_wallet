<?php


/**
 * @OA\Post(
 *     path="/auth_service/register",
 *     tags={"Authorization"},
 *     summary="Register user",
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             required={"name", "surname", "email", "username", "password"},
 *             @OA\Property(property="name", type="string", example="Enes"),
 *             @OA\Property(property="surname", type="string", example="Dzihanovic"),
 *             @OA\Property(property="email", type="string", example="enes.dzihanovic@stu.ibu.edu.ba"),
 *             @OA\Property(property="username", type="string", example="enesdzihanovic"),
 *             @OA\Property(property="password", type="string", example="user123")
 *         )
 *     ),
 *     @OA\Response(
 *         response="200",
 *         description="User registered successfully"
 *         )
 *     )
 */

Flight::route('POST /auth_service/register', function(){
    $data = Flight::request()->data->getData();
    $response = Flight::auth_service()->register($data);

    if($response['success']){
        Flight::json([
            'message' => 'User registered successfully',
            'data' => $response['data']
        ]);
    }else{
        Flight::halt(500, $response['error']);
    }
});
/**
 * @OA\Post(
 *     path="/auth_service/login",
 *     tags={"Authorization"},
 *     summary="Login user",
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             required={"email", "password"},
 *             @OA\Property(property="email", type="string", example="enes.dzihanovic@stu.ibu.edu.ba"),
 *             @OA\Property(property="password", type="string", example="user123")
 *         )
 *     ),
 *     @OA\Response(
 *         response="200",
 *         description="User logged in successfully"
 *         )
 *     )
 */
Flight::route('POST /auth_service/login', function(){
    $data = Flight::request()->data->getData();
    $response = Flight::auth_service()->login($data);

    if($response['success']){
        Flight::json([
            'message' => 'User logged in successfully',
            'data' => $response['data']
        ]);
    }else{
        Flight::halt(500, $response['error']);
    }
});
?>