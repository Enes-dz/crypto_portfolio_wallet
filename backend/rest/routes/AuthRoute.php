<?php

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