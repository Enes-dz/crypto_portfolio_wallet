<?php
require_once 'BaseService.php';
require_once __DIR__ . '/../dao/UsersDao.php';

class AuthService extends BaseService{
    public function __construct(){
        $this->users_dao = new UsersDao();
        parent::__construct($this->users_dao);
    }
    public function register($entity){
        //Check for empty fields
        if(empty($entity['name']) || empty($entity['surname']) || empty($entity['email']) || empty($entity['password']) || empty($entity['username'])){
            return ['success' => false, 'error' => 'Fields required cannot be empty'];
        }
        //Check for duplicate email or username
        $username_exists = $this->users_dao->get_user_by_username($entity['username']);
        $email_exists = $this->users_dao->get_user_by_email($entity['email']);
        if($username_exists){
            return ['success' => false, 'error' => 'Username already exists'];
        }elseif($email_exists){
            return ['success' => false, 'error' => 'Email already exists'];
        }
        $entity['password'] = password_hash($entity['password'], PASSWORD_BCRYPT);
        $new_user = $this->users_dao->create_new_user($entity['name'], $entity['surname'], $entity['email'], $entity['password'], $entity['username'], 'user');
        unset($new_user['password']);
        return ['success' => true, 'data' => $new_user];
    }
    public function login($entity){
        //Check for empty fields
        if(empty($entity['email']) || empty($entity['password'])){
            return ['success' => false, 'error' => 'Fields required cannot be empty'];
        }
        $user = $this->users_dao->get_user_by_email($entity['email']);
        if(!$user){
            return ['success' => false, 'error' => 'Invalid email or password'];
        }
        if(!password_verify($entity['password'], $user['password'])){
            return ['success' => false, 'error' => 'Invalid email or password.'];
        }else{
            unset($user['password']);
            return ['success' => true, 'data' => $user];
        }
    }
}