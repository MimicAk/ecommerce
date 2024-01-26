<?php
// Imports here
 
class UserModel
{   

    protected $con;
    protected $db;
    protected $table_name;
    protected $primary_key;
    public function __construct(){
        $this->con = new Connection();
        $this->db = $this->con->connect();

        // Table Variables
        $this->table_name = 'user';
        $this->primary_key = 'id';
    }
    
    public function Connect(){
        include 'config/connection.php';

        return $conn;
    }

        public function UserLogin()
    {
        $email = 'test@123.com';
        // $email = $_POST['email'];
        // $password = $_POST['password'];
        $password = '123';

        $query = "SELECT * FROM $this->table_name WHERE email ='$email'";
        $query_check_pw = "SELECT * FROM $this->table_name WHERE email='$email' AND password='$password'";

        $result = mysqli_query($this->db, $query);

        if(mysqli_num_rows($result)>0){
            $check = mysqli_query($this->db, $query_check_pw);
            if(mysqli_num_rows($check)>0){
                return 'Login Successfull';
            } else {
                return 'Check Your Password';
            }
        }else {
            return 'User Doesnot Exit';
        }
    }

}

?>