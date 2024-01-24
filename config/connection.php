<?php

    $username = "root";
    $password = "";
    $database_name = "ecommerce";
    $host = "localhost";

    $conn = mysqli_connect($host,$username,$password,$database_name);

    if($conn->connect_error){
        echo "Failed To Make Connection";

        exit(mysqli_connect_error());
    }
?>