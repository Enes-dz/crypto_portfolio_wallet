<?php

Flight::route('PATCH /user/change_password', function(){
    $data = Flight::request()->data->getData();
    $user = Flight::users_service()->changePassword($data);
    Flight::json($user);
});
Flight::route('PATCH /user/change_username', function(){
    $data = Flight::request()->data->getData();
    $user = Flight::users_service()->changeUsername($data);
    Flight::json($user);
});
Flight::route('DELETE /user/delete_user', function(){
    $data = Flight::request()->data->getData();
    $user = Flight::users_service()->delete_user($data);
    Flight::json($user);
});