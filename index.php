<?php

include 'model/UserModel.php';

$UserModel = new UserModel();

// $data = $UserModel->UserLogin();

// echo $data;
$name = 'Yuvaraj';
$email = 'yuva@gmail.com';
// $email = 'test@123.com';
$password = '123';
$con_p = '123';
$data = $UserModel->UserRegister($name, $email, $password, $con_p);
echo $data;
?>