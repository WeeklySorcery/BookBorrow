<?php

session_start();
unset($_SESSION["user_active"]);
unset($_SESSION["username"]);
header("Location: ../index.php");

?>