<?php
require_once 'BaseService.php';
require_once __DIR__ . '/../dao/UsersDao.php';

class UsersService extends BaseService{
    public function __construct(){
        $this->users_dao = new UsersDao();
        parent::__construct($this->users_dao);
    }
    //Entity contatins: ["email" => "", "current_password" => "", "new_password" => ""] 
    public function changePassword($entity){
        $user = $this->users_dao->get_user_by_email($entity['email']);
        if(!password_verify($entity['current_password'], $user['password'])){
            return ['success' => false, 'error' => 'Invalid current password'];
        }
        $new_password_hashed = password_hash($entity['new_password'], PASSWORD_BCRYPT);
        $this->users_dao->update_password($new_password_hashed, $user['id']);
        return ['success' => true, 'data' => 'Password updated successfully'];


    }
    //Entity contains: ["email" => "", "new_username" => ""]
    public function changeUsername($entity){
        $user = $this->users_dao->get_user_by_email($entity['email']);
        $new_username = $entity['new_username'];
        if($this->users_dao->get_user_by_username($new_username)){
            return ['success' => false, 'error' => 'Username already exists'];
        }
        $this->users_dao->update_username($new_username, $user['id']);
        return ['success' => true, 'data' => 'Username updated successfully'];
    }
    public function delete_user($email){
        $user_id = $this->users_dao->get_user_by_email($email)['id'];
        $this->users_dao->delete_user_by_id($user_id);
        return ['success' => true, 'data' => 'User deleted successfully'];
    }
}