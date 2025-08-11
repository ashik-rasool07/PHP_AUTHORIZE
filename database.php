<?php
 $host="localhost";  //host 
 $dbname="login";
 $username="root"; 
 $password="";  //password for db

 $conn=new mysqli($host,$username,$password,$dbname);

 if($conn->connect_error)
 {
    die("connection". $conn->connect_error);
 }
 ?>