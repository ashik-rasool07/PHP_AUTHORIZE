<?php
session_start();
include 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name'] ?? '');
    $mail = (trim($_POST['mail'] ?? ''));
    $password = (trim($_POST['password'] ?? ''));
     $phone = (trim($_POST['phone'] ?? '')); 

    $sql = "SELECT * FROM info WHERE name='$name' AND password='$password'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $_SESSION['user'] = $name;
        $_SESSION['last_activity'] = time();

        if (isset($_POST['remember'])) {
            setcookie("User_name", $name, time() + (86400 * 30), "/");
        }

        header("Location: dashboard.php");
        exit;
        
    } 
   
    else {
     
       echo "<div class='suc-container'>
            <div class='success'>
            <span>INVALID CREDENTIALS</span><br>
            <span><a href='login.html'>RELOGIN</a> TO CONTINUE</span>
            </div>
            </div>
            
            <style>
            body {
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
    background: #c06149ff;
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
    box-shadow: 0 4px 8px rgba(0, 0, 0, 1);
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
    background-color: #c06149ff;
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(20px); }
    to   { opacity: 1; transform: translateY(0); }
}

            </style>";
       }

}
?>
