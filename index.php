<?php
 session_start();
 include 'config.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST["login"])) {
     $logname=$_POST['logname'];
     $logpass=$_POST['logpass'];
     $sql="select userid ,uname from users where (uname='".$logname."' OR email ='".$logname."') AND password='".$logpass."'";    
     $query=mysqli_query($conn,$sql);
     $numrows=mysqli_num_rows($query);
     if($numrows>0)
     {
      $row = mysqli_fetch_assoc($query);
      $_SESSION["userid"]= $row["userid"]; 
      $_SESSION["uname"]= $row["uname"];
      session_write_close();
      header('Location: index.php');
      exit();
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
    $_SESSION["userid"]= $id; 
    $_SESSION["uname"]= $uname;
    session_write_close();
    header('Location: index.php');
     exit();
} else {
  echo '<script language="javascript">';
    echo 'alert("Try Again")';
    echo '</script>';
}
}
mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
<title>Engineering Kit | A Complete Guide for Engineering Students</title>
        <link rel="icon" href="./assets/images/speed.png" type="image/gif" sizes="16x16">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="./assets/css/style.css">
  <script src="./assets/js/sidenav.js"></script>  
  <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
  <script src="./assets/js/jquery.min.js"></script>
  <script src="./assets/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Merriweather|Open+Sans|Acme|Roboto:500" rel="stylesheet">
  <link rel="stylesheet" href="./assets/css/nav.css">
      <link rel="stylesheet" href="./assets/css/fonts.css">
      <script src="./assets/js/sidenav.js"></script> 
</head>
<body style=" background-color: #f6f5f2;">
<div id="nav"></div>

        <section class="background">
        <div class="mainspeech">
          <h1>A Complete Guide for Engineering Students</h1>  
            <h3>A Forum that integrates all the Betterments of Engineering students to attain Success.</h3>
            
        </div>
        </section>
    <section class="main" id="main">
        <div class="container border">
        <div class="row">
            <div class="col-md-4">
                <div class="card"><h4>Engineering</h4><p>All the Engineering Notes and e-books can be viewed here</p>
          <br>
                    <ul>
                    <li class="parent"><img src="assets/images/ebook.png"><br><span>E-Books</span></li>
                    <li class="child"><img src="assets/images/questions.png"><br><span>Question Banks</span></li>
                    <li class="parent"><img src="assets/images/pros-and-cons.png"><br><span>Ans Keys</span></li> 
                  <li class="child"><img src="assets/images/questions-about-abecedary.png"><br><span>Question Paper</span></li>
                     <li class="child" style="width:60%;"><img src="assets/images/refresh.png"><br>University Updates</li>
                    </ul>
                </div>
            </div>
              <div class="col-md-4">
                  <div class="card"><h4>Knowledge</h4><p>All the latest stuff apart from Textbook will be notified frequently</p>
                  <br>
                      <ul>
                    <li class="parent"><img src="assets/images/conference.png"><br><span> Conference</span></li>
                    <li class="child"><img src="assets/images/3d-printing-software.png"><br><span> Hackathon</span></li>
                    <li class="parent"><img src="assets/images/tent.png"><br><span> Symposium</span></li> 
                        <li class="child"><img src="assets/images/world-cup.png"><br><span>Cultural Fest</span></li>
                     <li class="child"><img src="assets/images/running-man.png"><br><span> Sports Event</span> </li>
                    </ul>  
                  </div>
            </div>
              <div class="col-md-4">
             <div class="card"><h4>Placements</h4><p>All the placements related queries and information can be viewed here</p>
                  <br>
                      <ul>
                    <li class="parent"><img src="assets/images/briefcase.png"><br><span>Job Alerts</span></li>
                    <li class="child"><img src="assets/images/review.png"><br><span>Companies</span></li>
                    <li class="parent"><img src="assets/images/interview.png"><br><span>Aptitude</span></li> 
                        <li class="child"><img src="assets/images/learning.png"><br><span> Online Test</span></li>
                     <li class="child"><img src="assets/images/presentation.png"><br> <span>Internships</span> </li>
                    </ul> </div>
            </div>
            </div>
         
        </div>   
    </section><br><br>
     <div class="icon-bar hidden-xs">
  <a href="#" class="facebook"><i class="fa fa-facebook"></i></a> 
  <a href="#" class="twitter"><i class="fa fa-twitter"></i></a> 
  <a href="#" class="google"><i class="fa fa-google"></i></a> 
  <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
</div>
    
    <footer>
        <div class="container">
    <div class="row">
        <div class="col-md-3 col-xs-6">
        <h4>Popular Links</h4>
            <p>Public Forum</p>
            <p>Latest News</p>
            <p>Blogs</p>
        </div>
          <div class="col-md-3 col-xs-6">
        <h4>Popular Tags</h4>
            <p>University Papers</p>
            <p>Exam Results</p>
            <p>Events Happening</p>
        </div>
         <div class="col-md-3 col-xs-6">
        <h4>Placements</h4>
            <p>Job Interviews</p>
             <p>Mock Test</p>
            <p>Internship Oppurtunity</p>
        </div>
             <div class="col-md-3 col-xs-6">
        <h4>Contact Us</h4>
            <p>Information</p>
            <p>Complaints</p>
            <p>Contribution</p>
        </div>
        </div>
          <br><br>
          <center>  <p>Copyrights &copy; 2019 Educate Kid. All Rights Reserved </p></center>
        </div>
    </footer>
    
    <script>
$(function() {
    $(".preload").fadeOut(3000, function() {
        $(".content").fadeIn(500);        
    });
});
 function check() {
          if (document.getElementsByName('pass')[0].value ==
            document.getElementsByName('repass')[0].value) {
        document.getElementsByName('signup')[0].disabled = false;
                document.getElementsByName("repass")[0].style.outline = "#ffffff";

    } else {
        document.getElementsByName('signup')[0].disabled = true;
        document.getElementsByName("repass")[0].style.outline = "3px solid red";
    }
   }
    </script>
        <script>
$(document).ready(function(){
   
   $('#nav').load("nav.html");
     $('#foot').load("foot.html");

});
</script>

    
    </body></html>
