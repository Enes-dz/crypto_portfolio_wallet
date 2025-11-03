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
}