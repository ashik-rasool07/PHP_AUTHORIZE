<?php
session_start();
session_unset();
session_destroy();

setcookie("User_name", "", time() - 3600, "/"); // ← fixed line

header("Location: index.html");
exit;
?>
