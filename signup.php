<?php
include 'config.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (isset($_POST["login"])) {
     $logname=$POST['logname'];
     $logpass=$POST['logpass'];
     $sql="select id from users where uname='".$logname."' or email ='".$logname."' AND password='".$logpass."'";    
     $query=mysql_query($conn,$sql);
     $numrows=mysql_num_rows($query);
     if($numrows!=0)
     {
      session_start();
      $row = mysqli_fetch_assoc($result)
      $_SESSION['userid']= $row['userid']; 
      header('Location: index.html')
     }
     else
     {
     	echo '<script language="javascript">';
        echo 'alert("Invalid Credentials")';
         echo '</script>';
     }
}else if(isset($POST["signup"])){  
  $id=uniqid('USR');
  $uname = $_POST["user"];
  $email = $_POST["email"];
  $pass =  $_POST["pass"];
  $sql = "INSERT INTO users (userid, uname, email, password)
   VALUES ('".$id."', '".$uname."', '".$email."','".$pass."')";

if ($conn->query($sql) === TRUE) {
	session_start();
    $_SESSION['userid']= $id; 
    header('Location: index.html');
} else {
	echo '<script language="javascript">';
    echo 'alert("Try Again")';
    echo '</script>';
}
}
mysql_close($conn);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Engineering Kit</title>
    <link rel="icon" href="./assets/images/speed.png" type="image/gif" sizes="16x16">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Merriweather|Open+Sans|Roboto:500" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Bree+Serif|Noto+Serif|Poppins|Signika" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/style.css">
    <script src="./assets/js/sidenav.js"></script>
        <meta name="google-signin-scope" content="profile email">
    <meta name="google-signin-client_id" content="631886566864-seb63rcuar63jirphjs4ro7ntrh75fsn.apps.googleusercontent.com">
    <script src="https://apis.google.com/js/platform.js" async defer></script>
</head>

<body>
    <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.2&appId=446635862374489&autoLogAppEvents=1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
    <div class="topnav navbar-fixed-top" id="myTopnav">
        <a class="openbtn" onclick="openNav()"><i class="fa fa-bars"></i>&nbsp;&nbsp;Engineer Kit</a>
        <div class="nav-right hidden-xs hidden-sm" style="padding-left:100px;">
            <a href="./index.html">Home</a> 
            <a href="./event.html">Events</a> 
            <a href="./job.html">Job Alert</a> 
            <a href="./aptitude.html">Aptitude</a>
            <a href="./exam.html">Online Exams</a> 
            <a href="./qbank.html">Question Banks</a> 
            <a href="./review.html">Company Reviews</a> 
            <a href="signup.html">Login</a> 
            <div class="search-container">
                <form action="/action_page.php" class="hidden-xs hidden-sm">
                    <input type="text" placeholder="Search for terms.." name="search" class="search">
                </form>
            </div>
        </div>

    </div>
    <div id="mySidebar" class="sidepanel">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()" style="margin-top:50px;">×</a>
        <a href="index.html">Home</a>
        <a href="about.html">About</a>
        <a href="#about">Workshops</a> 
        <a href="#about">Placements</a> 
        <a href="#about">Engineering</a> 
        <a href="#about">Internships</a>
        <a href="#about">Public Forum</a> 
        <a class="visible-xs" href="#about">Aptitude</a>
        <a href="#about">Online Exams</a> 
        <a href="#about">Online Training</a> 
        <a href="#about">Question Banks</a> 
        <a href="#about">Company Reviews</a> 
        <a href="#about">Ebooks & Manuals</a> 
        <a href="#about">Login / signup</a> 
    </div>

    <section class="main" id="main">

        <div class="container">
<div class="row">
    <div class="col-md-7 fixed hidden-xs hidden-sm">
        <div class="sign">
    <h2 class="logtext">Why need to Signup?</h2>
        <br>
    <ul>
    <li>To Get the regular updates of the events and job alerts.</li>    
        <li>To Get the relevant e-training for the job rounds.</li> 
        <li>To Get all possible Engineering Notes from different authors.</li> 
        <li>To Practice Exams online with the same environment.</li> 
        <li>To Know about future companies that you are going to work on..</li> 
    </ul>
        </div></div>
    <div class="col-md-5">
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#login" aria-controls="home" role="tab" data-toggle="tab">Login</a>
                </li>
                <li role="presentation"><a href="#signup" aria-controls="profile" role="tab" data-toggle="tab">Signup</a>
                </li>
               
            </ul>
            <div class="tab-content card" >
                <div role="tabpanel" class="tab-pane active" id="login">
                        <div class="log">
                            <form action="" method="post" role="form">
                                <div class="form-group">
                                    <label for="inputUsernameEmail">Username or email</label>
                                    <input type="text" class="controls varinput" name="logname" placeholder="Enter Username or Email">
                                </div>
                                <div class="form-group">
                                    <a class="pull-right" href="#">Forgot password?</a>
                                    <label for="inputPassword">Password</label>
                                    <input type="password" class="controls varinput" name="logpass" placeholder="Enter Password">
                                </div>
                                <div class="checkbox pull-right">
                                    <label>
                                        <input type="checkbox">Remember me</label>
                                </div>
                                <button name="login" type="submit" class="btn btn btn-primary">
                                    Log In
                                </button>
                            </form>

                        </div>

                    </div>
                                <div role="tabpanel" class="tab-pane" id="signup">
                        <div class="log">
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <a href="#" ><div class="fb-login-button" data-width="40" data-max-rows="1" data-size="medium" data-button-type="continue_with" data-show-faces="false" data-auto-logout-link="false" data-use-continue-as="false"></div>   </a>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <a href="#" > <div class="g-signin2" data-onsuccess="onSignIn" data-theme="dark"></div></a>
                                </div>
                            </div>
                            <div class="login-or">
                                <hr class="hr-or">
                                <span class="span-or">or</span>
                            </div>

                            <form method="post" action="signup.php" role="form">
                                     <div class="form-group">
                                    <label for="inputuser">Username</label>
                                    <input type="text" class="controls varinput" name="user" placeholder="Enter Username">
                                </div>
                                <div class="form-group">
                                    <label for="inputemail"> Email</label>
                                    <input type="text" class="controls varinput" name="email" placeholder="Enter Email Address">
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword">Password</label>
                                    <input type="password" class="controls varinput" name="pass" placeholder="Enter Password..">
                                </div>
                                   <div class="form-group">
                                    <label for="inputPassword">Re-enter Password</label>
                                    <input type="password" class="controls varinput" placeholder="Enter Password Again..">
                                </div>
                                <div class="checkbox pull-right">
                                    <label>
                                        <input type="checkbox">Remember me</label>
                                </div>
                                <button name="signup" type="submit" class="btn btn btn-primary">
                                    Sign Up
                                </button>
                            </form>

                        </div>

                    </div>
                </div>
            </div></div></div>
    </section>
    <div class="icon-bar hidden-xs">
        <a href="#" class="facebook"><i class="fa fa-facebook"></i></a> 
        <a href="#" class="twitter"><i class="fa fa-twitter"></i></a> 
        <a href="#" class="google"><i class="fa fa-google"></i></a> 
        <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
        <a href="#" class="youtube"><i class="fa fa-youtube"></i></a> 
    </div>
    <script>
        $(function() {
            $(".preload").fadeOut(3000, function() {
                $(".content").fadeIn(500);
            });
        });
    </script>
</body>

</html>