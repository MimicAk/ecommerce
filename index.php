<?php

include 'model/UserModel.php';

$UserModel = new UserModel();

$data = $UserModel->UserLogin();

echo $data;

?>