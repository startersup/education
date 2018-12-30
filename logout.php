<?php
session_start();
unset($_SESSION["userid"]);
unset($_SESSION["uname"]);
session_destroy();
header("Location:index.php");
?>