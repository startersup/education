<?php
 session_start(); 
 if(isset($_SESSION["userid"]))
 {
    echo '<script language="javascript">window.onload = function() {document.getElementById("log").text="Welcome '.$_SESSION["uname"].'!";
         document.getElementById("log").setAttribute("data-toggle","false"); document.getElementById("sign").text="Logout"; document.getElementById("sign").setAttribute("data-toggle","false");
            document.getElementById("sign").setAttribute("href","logout.php");}</script>';
}
  
if ($_SERVER["REQUEST_METHOD"] == "POST") {
include 'config.php';
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
<title>Engineering Kit</title>
        <link rel="icon" href="./assets/images/speed.png" type="image/gif" sizes="16x16">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Merriweather|Open+Sans|Roboto:500" rel="stylesheet">
<link rel="stylesheet" href="./assets/css/style.css">
  <script src="./assets/js/sidenav.js"></script>  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Merriweather|Open+Sans|Roboto:500" rel="stylesheet">
  <link rel="stylesheet" href="./assets/css/nav.css">
      <script src="./assets/js/sidenav.js"></script> 
</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top navbar-expand-lg navbar-light">
	<div class="navbar-header d-flex col">
		<a class="navbar-brand" href="#">Educate<b> Kid</b></a>  		
			<i data-target="#navbarCollapse" onclick="openNav()" data-toggle="collapse" class="navbar-toggle navbar-toggler visible-xs visible-sm ml-auto fa fa-bars" ></i>
	</div>
	<div class="hidden-xs hidden-sm">
		<ul class="nav navbar-nav">
			<li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
			<li class="nav-item"><a href="event.html" class="nav-link">Events</a></li>			
			<li class="nav-item dropdown">
				<a data-toggle="dropdown" class="nav-link dropdown-toggle">Services<b class="caret"></b></a>
				<ul class="dropdown-menu">					
					<li><a href="#" class="dropdown-item">Engineering E-Books</a></li>
					<li><a href="qbank.html" class="dropdown-item">Engineering Question Banks</a></li>
                    <li><a href="aptitude.php" class="dropdown-item">Aptitude</a></li>
					<li><a href="#" class="dropdown-item">Placement Papers</a></li>
					<li><a href="job.html" class="dropdown-item">Job Alerts</a></li>
				</ul>
			</li>
			<li class="nav-item "><a href="#" class="nav-link">Online Exams</a></li>
			<li class="nav-item"><a href="#" class="nav-link">Company Reviews</a></li>
			<li class="nav-item"><a href="forum.html" class="nav-link">Forum</a></li>
		</ul>
            
		<form class="navbar-form form-inline">
			<div class="input-group search-box">								
				<input type="text" id="search" class="form-control" placeholder="Search here...">
				<span class="input-group-addon"><i class="fa fa-search"></i></span>
			</div>
		</form>
		<ul class="nav navbar-nav navbar-right ml-auto">			
			<li class="nav-item">
				<a id="log" data-toggle="dropdown" class="nav-link dropdown-toggle" href="#">Login</a>
				<ul class="dropdown-menu form-wrapper">					
					<li>
						<form action="" method="post">
							<p class="hint-text">Sign in with your social media account</p>
							<div class="form-group social-btn clearfix">
								<a href="#" class="btn btn-primary pull-left"><i class="fa fa-facebook"></i> Facebook</a>
								<a href="#" class="btn btn-info pull-right"><i class="fa fa-twitter"></i> Twitter</a>
							</div>
							<div class="or-seperator"><b>or</b></div>
							<div class="form-group">
								<input type="text" name="logname" class="form-control" placeholder="Username or Email " required="required">
							</div>
							<div class="form-group">
								<input type="password" name="logpass" class="form-control" placeholder="Password" required="required">
							</div>
							<input name="login" type="submit" class="btn btn-primary btn-block" value="Login">
							<div class="form-footer">
								<a href="#">Forgot Your password?</a>
							</div>
						</form>
					</li>
				</ul>
			</li>
			<li class="nav-item">
				<a id="sign"  href="#" data-toggle="dropdown" class="btn btn-primary dropdown-toggle get-started-btn mt-1 mb-1">Sign up</a>
				<ul class="dropdown-menu form-wrapper">					
					<li>
						<form action="" method="post">
							<p class="hint-text">Fill in this form to create your account!</p>
							<div class="form-group">
								<input name="user" type="text" class="form-control" placeholder="Username" required="required">
							</div>
                            <div class="form-group">
								<input name="email" type="text" class="form-control" placeholder="Email Address" required="required">
							</div>
							<div class="form-group">
								<input name="pass" type="password" class="form-control" placeholder="Password" required="required">
							</div>
							<div class="form-group">
								<input name="repass" onkeyup="check();" type="password" class="form-control" placeholder="Confirm Password" required="required">
							</div>
							<div class="form-group">
                                <label class="checkbox-inline"><input type="checkbox" required="required">Remember me</label>   
							</div>
							<input name="signup" type="submit" class="btn btn-primary btn-block" value="Sign up" disabled="true">
						</form>
					</li>
				</ul>
			</li>
		</ul>
	</div>
    <div id="mySidebar" class="sidepanel" >
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()" style="margin-top:50px;">×</a>
  <a href="index.html">Home</a>
  <a href="about.html">About</a>
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
</nav>
       
                                                                                  
    <div class="preload"><p style="float:inherit;font-size:20px;margin-left:5%;">Preparing Kit for you.....</p><img style="width:350px;" src="./assets/images/book-gif.gif">
</div>
    <div class="content">
    <section class="main" id="main">
        <div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="metrics">
            <div class="row">
                <div class="col-md-3 col-xs-6">
                 <div class="card curve color1"> <center><img src="assets/images/meeting.png"><p>Total Interviews : 50</p></center>
                    </div>
                </div>
         <div class="col-md-3 col-xs-6">
                 <div class="card curve color2"><center><img src="assets/images/presentation.png"> <p>Total Symposium : 50</p></center>
                    </div>
                </div>
                  <div class="col-md-3 col-xs-6">
                 <div class="card curve color3"><center><img src="assets/images/conference.png"><p>Total Conference : 50</p></center>
                    </div>
                </div>
                  <div class="col-md-3 col-xs-6">
                 <div class="card curve color4"><center><img src="assets/images/businessman.png"><p>Active Users : 2909</p></center> 
                    </div>
                </div>
                </div>
        </div>
         <div class="Education">
             <br>
          <h4>Engineering Education</h4> 
             <p>Engineering education is the activity of teaching knowledge and principles to the professional practice of engineering. It includes an initial education (bachelor's and/or master's degree), and any advanced education and specializations that follow. Engineering education is typically accompanied by additional postgraduate examinations and supervised training as the requirements for a professional engineering license. The length of education, and training to qualify as a basic professional engineer.<br><br>A vibrant engineering education enterprise benefits civic, economic, and intellectual activity in this country. Engineering graduates learn to integrate scientific and engineering principles to develop products and processes that contribute to economic growth, advances in medical care, enhanced national security systems, ecologically sound resource management, and many other beneficial areas.</p>
             <br><br>
             <h4>Anna University</h4> 
             <p>The Government of Tamil Nadu established the Anna University of Technology on 4 September 1978, through Tamil Nadu Act 30 of 1978. The new university was formed from the erstwhile University of Madras faculty of engineering and technology and consisted of four institutes: Madras Institute of Technology, College of Engineering, Guindy, Alagappa College of Technology and School of Architecture and Planning.</p>
            </div>
        </div>
          <div class="col-md-3">
         <div class="card fixed"><h3>Popular Events</h3>
             <span>Technical Symposium on Saveetha Engineering College at 12/1/2019</span><hr>
              <span>Technical Symposium on Saveetha Engineering College at 12/1/2019</span><hr>
             <span>Technical Symposium on Saveetha Engineering College at 12/1/2019</span><hr>
             <span>Technical Symposium on Saveetha Engineering College at 12/1/2019</span><hr>
             <span>Technical Symposium on Saveetha Engineering College at 12/1/2019</span>
              </div>
        </div>
        </div>
             </div>
    </section>
       
    </div>
     <div class="icon-bar hidden-xs">
  <a href="#" class="facebook"><i class="fa fa-facebook"></i></a> 
  <a href="#" class="twitter"><i class="fa fa-twitter"></i></a> 
  <a href="#" class="google"><i class="fa fa-google"></i></a> 
  <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
</div>
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
    </body></html>