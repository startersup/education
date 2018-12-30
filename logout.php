<?php
session_start();
unset($_SESSION["userid"]);
unset($_SESSION["uname"]);
header("Location:index.php");
?>