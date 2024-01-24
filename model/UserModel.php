<?php

 
class UserModel
{
    public function Connect(){
        include 'config/connection.php';

        return $conn;
    }

    public function UserLogin()
    {
        $table_name = 'user';
        $primary_key = 'id';

        $email = 'test@123.com';
        // $email = $_POST['email'];
        // $password = $_POST['password'];
        $password = '123';

        $query = "SELECT * FROM $table_name WHERE email ='$email'";
        $query_check_pw = "SELECT * FROM $table_name WHERE email='$email' AND password='$password'";

        $conn = $this->Connect();

        $result = mysqli_query($conn, $query);

        if(mysqli_num_rows($result)>0){
            $check = mysqli_query($conn, $query_check_pw);
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