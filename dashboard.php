<?php
session_start();
$time_duration=300;
if(!isset($_SESSION['user']))
{
  header("location:login-process.php");
  exit;
}
if(isset($_SESSION['LAST_ACTIVITY'])&&(time()-$_SESSION['LAST_ACTIVITY']>$time_duration))
{
    session_unset();
    session_destroy();
     header("location:login-process.php?timeout=1");
     exit;
}
$_SESSION['LAST_ACTIVITY']=time();

?>

<html>
    <body>
        <div class="main">
            <div class="sec1">
        <h1>WELCOME  <span id="name"> <?=$_SESSION['user']?></span>  </h1>
        <?php
        if(isset($_COOKIE['user_name']))
            {
               echo "<p>test.cookie: " . $_COOKIE['User_name'] . "</p>";
             } 
        ?>
        <a href="logout.php">RETURN</a>
            </div>
            </div>

            <style>
                body{
                     overflow-y: hidden;
                     overflow-x: hidden;
                    background: url('Acer_Wallpaper_04_3840x2400.jpg') no-repeat center center fixed;
                    background-size:cover;
                }
                .main{
                   
                    justify-content:center;
                    align-items:center;
                    display:flex;
                    height:100vh;
                }
                .sec1 {
                 background-color: #ffffff;
                 padding: 30px 40px;
                 border-radius: 12px;
                 box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
                text-align: center;
                 animation: fadeIn 0.8s ease-in-out;
               }
               @keyframes fadeIn {
              from { opacity: 0; transform: translateY(20px); }
              to   { opacity: 1; transform: translateY(0); }
                  }

                  #name
                  {
                    color:blue;
                  }

                </style>
    </body>
</html>