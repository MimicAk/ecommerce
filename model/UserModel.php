<?php
// Imports here
include 'config/connection.php';
class UserModel
{

    protected $con;
    protected $db;
    protected $table_name;
    protected $primary_key;
    public function __construct()
    {
        $this->con = new Connection();
        $this->db = $this->con->connect();

        // Table Variables
        $this->table_name = 'user';
        $this->primary_key = 'id';
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

        if (mysqli_num_rows($result) > 0) {
            $check = mysqli_query($this->db, $query_check_pw);
            if (mysqli_num_rows($check) > 0) {
                return 'Login Successfull';
            } else {
                return 'Check Your Password';
            }
        } else {
            return 'User Doesnot Exit';
        }
    }

    public function UserRegister($name, $email, $password, $con_password)
    {
        // Name
        // $name = 'yuva';
        // $email = '';
        // $password = '';
        // $con_password = '';

        if (isset($email)) {
            $query = "SELECT email FROM $this->table_name WHERE email = '$email'";

            $check_user = mysqli_query($this->db, $query);

            if(mysqli_num_rows($check_user) > 0){
                return "User Already Exist";
            }elseif($password != $con_password){
                return "Password Missmatch";
            }
            else{
                // INSERT INTO `user`(`id`, `name`, `email`, `password`, `last_login`, `status`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]','[value-6]')
                $register_query = "INSERT INTO $this->table_name(name, email, password) VALUES ('$name','$email','$password')";

                if(mysqli_query($this->db,$register_query)){
                    return "User Register Successful";
                }
            }
        }else {
            return 'Enter Email';
        }

    }

}

?>