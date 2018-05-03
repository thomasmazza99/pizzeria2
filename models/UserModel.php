<?php
require_once  $homedir.'/pizzeria2/models/db.php';
class UserModel{
 
    // database connection and table name
    private $conn;
    public $username;
    public $email;
    public $isAdmin;
    // constructor
    public function __construct(){
        $this->conn = new DB();
    }
    public function register($username, $password, $confirmPassword,$email){
        $result = $this->conn->insert('utenti',array('username'=>$username,'password'=>$password,'email'=>$email));
        if($result==true){
            $this->username = $username;
            $this->email=$email;
        }
        return $result;
    }
    public function login($username,$password){
        $conditions['where'] = array(
            'username' => $username,
            'password' => $password
        );
        $conditions['return_type'] = 'single';
        $row = $this->conn->getRows('utenti',$conditions);
        if(!empty($row)){
            $this->username=$row["username"];
            $this->email=$row["email"];
            return true;
        }
        return false;
    }
    public function delete($username){
        
    }
    
}