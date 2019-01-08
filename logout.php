<?php

session_start();
session_unset('uname');
session_unset('userid');
session_destroy();
header('Location: index.php');
 ?>