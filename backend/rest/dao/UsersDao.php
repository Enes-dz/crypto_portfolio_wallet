<?php
require_once 'BaseDao.php';

class UsersDao extends BaseDao{
    protected $table_name;

    public function __construct(){
        $this->table_name = 'users';
        parent::__construct($this->table_name);
    }

    public function get_user_by_username($username){
        $query = "SELECT * FROM " . $this->table_name . " WHERE username = :username";
        return $this->query_unique($query, ['username' => $username]);
    }
    public function get_user_by_email($email){
        $query = "SELECT * FROM " . $this->table_name . " WHERE email = :email";
        return $this->query_unique($query, ['email' => $email]);
    }
    public function get_user_by_id($id){
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = :id";
        return $this->query_unique($query, ['id' => $id]);
    }
    public function create_new_user($name, $surname, $email, $password, $username, $role){
        $params = [
            'name' => $name,
            'surname' => $surname,
            'email' => $email,
            'password' => $password,
            'username' => $username,
            'role' => $role
        ];
        return $this->add($params);
    }
    public function update_password($new_password, $user_id){
        return $this->update(['password' => $new_password], $user_id);
    }
    public function update_username($new_username, $user_id){
        return $this->update(['username' => $new_username], $user_id);
    }

    public function delete_user_by_id($id){
        return $this->delete($id);
    }
    
    public function update_user_role($new_role, $user_id){
        return $this->update(['role' => $new_role], $user_id);
    }
}