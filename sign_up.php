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
 
 if($_SERVER["REQUEST_METHOD"]=="POST")
 {
    $name=trim($_POST['name']);  
    $mail=trim($_POST['email']);  
    $password=trim($_POST['password']);
    $phone=trim($_POST['phone']);
    $stmt=$conn->prepare("INSERT INTO info(name,mail,password,phone) VALUES(?,?,?,?)");
    $stmt->bind_param("sssi",$name,$mail,$password,$phone); //ss=>no.of parameters in the database
    
    if($stmt->execute())   
        {
            echo "
            <div class='suc-container'>
            <div class='success'>
            <span>ACCOUNT CREATED SUCCESSFULLY</span><br>
            <span><a href='login.html'>LOGIN</a> TO CONTINUE</span>
            </div>
            </div>
            
            <style>
            body {
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
    background: #80c259ff;
    height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
}

.suc-container {
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100%;
    width: 100%;
}

.success {
    background-color: #ffffff;
    padding: 30px 40px;
    border-radius: 12px;
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
    text-align: center;
    animation: fadeIn 0.8s ease-in-out;
}

.success span {
    display: block;
    margin-bottom: 15px;
    font-size: 18px;
    color: #333;
}

.success a {
    background-color: #007bff;
    color: white;
    padding: 10px 18px;
    text-decoration: none;
    border-radius: 6px;
    font-weight: bold;
    transition: background-color 0.3s;
}

.success a:hover {
    background-color: #80c259ff;
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(20px); }
    to   { opacity: 1; transform: translateY(0); }
}

            </style>";
        }      
    else
        {
            echo "ERROR". $conn->connect_error;
        }    
        
    $stmt->close();             
 }
  $conn->close();  
?>