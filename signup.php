<?php
include 'configtemp.php';
	if (isset($_POST["login"])) {
     $logname=$_POST['logname'];
     $logpass=$_POST['logpass'];
     $sql="select userid from users where (uname='".$logname."' OR email ='".$logname."') AND password='".$logpass."'";    
     $query=mysqli_query($conn,$sql);
     $numrows=mysqli_num_rows($query);
     if($numrows>0)
     {
      session_start();
      $row = mysqli_fetch_assoc($result);
      $_SESSION["userid"]= $row['userid']; 
      $_SESSION["uname"]= $row['uname'];
      header('Location: index.php');
     }
     else
     {
     	echo '<script language="javascript">';
        echo 'alert("Invalid Credentials")';
         echo '</script>';
     }
}else if(isset($_POST["signup"])){  
  $id=uniqid('USR');
  $uname = $_POST["user"];
  $email = $_POST["email"];
  $pass =  $_POST["pass"];
  $sql = "INSERT INTO users (userid, uname, email, password)
   VALUES ('".$id."', '".$uname."', '".$email."','".$pass."')";

if ($conn->query($sql) === TRUE) {
	session_start();
    $_SESSION["userid"]= $id; 
    $_SESSION["uname"]= $uname;
    header('Location: index.php');
} else {
	echo '<script language="javascript">';
    echo 'alert("Try Again")';
    echo '</script>';
}
}
mysqli_close($conn);

?>
