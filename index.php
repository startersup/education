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
<nav class="navbar navbar-default navbar-fixed-top navbar-expand-lg navbar-light">
	<div class="container">
	<div class="navbar-header d-flex col">
	
		<a class="navbar-brand" href="#">Educate<b> Kid</b></a>  		
			<i data-target="#navbarCollapse" onclick="openNav()" data-toggle="collapse" class="navbar-toggle navbar-toggler visible-xs visible-sm ml-auto fa fa-bars" ></i>
	</div>
	<div class="hidden-xs hidden-sm">
		<ul class="nav navbar-nav">
			<li class="nav-item"><a href="../index.php" class="nav-link">Home</a></li>
			<li class="nav-item"><a href="./events/" class="nav-link">Events</a></li>			
			<li class="nav-item dropdown">
				<a data-toggle="dropdown" href="#" class="nav-link dropdown-toggle">Services<b class="caret"></b></a>
				<ul class="dropdown-menu">					
					<li><a href="./ebooks" class="dropdown-item">Engineering E-Books</a></li>
					<li><a href="./qbank.html" class="dropdown-item">Engineering Question Banks</a></li>
                    <li><a href="./aptitude.php" class="dropdown-item">Aptitude Practice</a></li>
					<li><a href="./placepapers" class="dropdown-item">Placement Papers</a></li>
					<li><a href="./jobs" class="dropdown-item">Job Alerts</a></li>
				</ul>
			</li>
			<li class="nav-item"><a href="./forum/" class="nav-link">Forum</a></li>
		</ul>
            <form class="navbar-form form-inline" action="https://www.google.com/search" method="get">
			<div class="input-group search-box">								
				<input type="text" id="search" class="form-control" placeholder="Search here...">
				<span class="input-group-addon"><i class="fa fa-search"></i></span>
			</div>
</form>
		<ul class="nav navbar-nav navbar-right ml-auto">							
         <?php
         if(isset($_SESSION["userid"]))
          {
              echo "<li class=nav-item dropdown'>
        <a data-toggle='dropdown' href='#'' class='nav-link dropdown-toggle'> ".$_SESSION['uname']." !</a>
        <ul class='dropdown-menu'>          
          <li><a href='#' class='dropdown-item'>Profile</a></li>
          <li><a href='qbank.html' class='dropdown-item'>your post</a></li>
                    <li><a href='aptitude.php' class='dropdown-item'>Settings</a></li>
          <li><a href='logout.php' class='dropdown-item'>Logout</a></li>
        </ul>
      </li>";
                   
            }
            else{
            echo "<li class='nav-item'><a id='log' data-toggle='dropdown' class='nav-link dropdown-toggle' href='#''>Login</a>
        <ul class='dropdown-menu form-wrapper'>   
            <li>
            <form action='' method='post'>
              <p class='hint-text'>Sign in with your social media account</p>
              <div class='form-group social-btn clearfix'>
                <a href='#' class='btn btn-primary pull-left'><i class='fa fa-facebook'></i> Facebook</a>
                <a href='#' class='btn btn-info pull-right'><i class='fa fa-twitter'></i> Twitter</a>
              </div>
              <div class='or-seperator'><b>or</b></div>
              <div class='form-group'>
                <input type='text' name='logname' class='form-control' placeholder='Username or Email ' required='required'>
              </div>
              <div class='form-group'>
                <input type='password' name='logpass' class='form-control' placeholder='Password' required='required'>
              </div>
              <input name='login' type='submit' class='btn btn-primary btn-block' value='Login'>
              <div class='form-footer'>
                <a href='#'>Forgot Your password?</a>
              </div>
            </form>
          </li></ul><li class='nav-item'>
        <a id='sign'  href='#' data-toggle='dropdown' class='btn btn-primary dropdown-toggle get-started-btn mt-1 mb-1'>Sign up</a>
        <ul class='dropdown-menu form-wrapper'>         
          <li>
            <form action='' method='post'>
              <p class='hint-text'>Fill in this form to create your account!</p>
              <div class='form-group'>
                <input name='user' type='text' class='form-control' placeholder='Username' required='required'>
              </div>
                            <div class='form-group'>
                <input name='email' type='text' class='form-control' placeholder='Email Address' required='required'>
              </div>
              <div class='form-group'>
                <input name='pass' type='password' class='form-control' placeholder='Password' required='required'>
              </div>
              <div class='form-group'>
                <input name='repass' onkeyup='check();' type='password' class='form-control' placeholder='Confirm Password' required='required'>
              </div>
              <div class='form-group'>
                                <label class='checkbox-inline'><input type='checkbox' required='required'>Remember me</label>   
              </div>
              <input name='signup' type='submit' class='btn btn-primary btn-block' value='Sign up' disabled='true'>
            </form>
          </li>
        </ul>
      </li>";
          }
            	?>
		</ul>
	</div>
  <div id="myNav" class="overlay">
       <form class="navbar-form form-inline" action="https://www.google.com/search" method="get">
			<div class="input-group search-box">								
				<input type="text" id="search" class="form-control" placeholder="Search here...">
				<span class="input-group-addon"><i class="fa fa-search"></i></span>
			</div>
</form>
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <div class="overlay-content">
   <a href="/">Home</a>
  <a href="./about">About</a>
  <a href="#about">Workshops</a>        
  <a href="#about">Placements</a>  
  <a href="#about">Engineering</a> 
  <a href="#about">Internships</a>
  <a href="#about">Public Forum</a>  
  <a class="visible-xs" href="#about">Aptitude</a>
  <a  href="#about">Online Exams</a>        
  <a href="#about">Online Training</a>     
  <a href="#about">Question Banks</a> 
  <a href="#about">Company Reviews</a>  
  <a href="#about">Ebooks & Manuals</a>  
  <a href="#about" >Login / signup</a>  
  </div>
</div>
        </div>
</nav>

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
function openNav() {
  document.getElementById("myNav").style.height = "100%";
}

function closeNav() {
  document.getElementById("myNav").style.height = "0%";
}
</script>
    </body></html>
