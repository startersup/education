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
<title>Educate Kit | A Complete Guide for Engineering Students</title>
        <link rel="icon" href="./assets/images/speed.png" type="image/gif" sizes="16x16">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Get educated more by Learn and practice Aptitude questions and     answers with explanation for interview, competitive examination and entrance test. ">
      <meta name="keywords" content="aptitude, questions, answers, interview, placement, papers, engineering, electronics, civil, mechanical, networking, hr, c, 2015, 2016, reasoning, program, verbal, gk, knowledge, language, explanation, solution, problem, online, test, exam, quiz">
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
    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-145976909-2"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-145976909-2');
</script>

</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top navbar-expand-lg navbar-light">
	<div class="container">
	<div class="navbar-header d-flex col">
	
		<a class="navbar-brand" href="/">Educate<b><span>kid</span></b></a>  		
			<i data-target="#navbarCollapse" onclick="openNav()" data-toggle="collapse" class="navbar-toggle navbar-toggler visible-xs visible-sm ml-auto fa fa-bars" ></i>
	</div>
	<div class="hidden-xs hidden-sm">
		<ul class="nav navbar-nav">	
			<li class="nav-item dropdown"> 
				<a data-toggle="dropdown" href="#" class="nav-link dropdown-toggle">Services</a>
				<ul class="dropdown-menu">					
					<li><a href="./ebooks" class="dropdown-item"> <img src="assets/images/ebook.png"> Engineering E-Books</a></li>
					<li><a href="./qbank.html" class="dropdown-item"><img src="assets/images/questions.png"> Engineering Question Banks</a></li>
                    <li><a href="./aptitude.php" class="dropdown-item"><img src="assets/images/questions-about-abecedary.png"> Aptitude Practice</a></li>
					<li><a href="./placepapers" class="dropdown-item"><img src="assets/images/refresh.png"> Placement Papers</a></li>
					<li><a href="./jobs" class="dropdown-item"><img src="assets/images/interview.png"> Job Alerts</a></li>
				</ul>
			</li>
            <li class="nav-item"><a href="./events/" class="nav-link">Latest Events</a></li>
			<li class="nav-item"><a href="./forum/" class="nav-link">Public Forum</a></li>
		</ul>
           
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
            echo "<li class='nav-item'><a id='log' data-toggle='dropdown' class='login-btn' href='#''>Login</a>
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
        <a id='sign'  href='#' data-toggle='dropdown' class='signup-btn'>Sign up</a>
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
 <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <div class="overlay-content">
                   <form class="navbar-form form-inline" action="https://www.google.com/search" method="get">
			<div class="input-group search-box">								
				<input type="text" id="search" class="form-control" placeholder="Search here...">
				<span class="input-group-addon"><i class="fa fa-search"></i></span>
			</div>
</form>
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
            <div class="container">
            <div class="row">
                <div class="col-md-8">
          <h1>The Best Online Education Platform</h1>  
            <h3>A Platform that integrates all the Learning  Materials, Educational updates and recent events that includes placements of students to attain success.</h3>
                    
                <p>Better clarity <span>|</span> Better Knowledge <span>|</span> Better Career</p>
                         <form class="search" action="">
        <input  class="controls" type="text" placeholder="Search for Materials, Placements, Events, Latest News........ " name="pick" required="" >
        <button type="submit"><i class="fa fa-search"></i> <span>Search</span></button>
      </form>
            </div>
             
                </div>
        </div>
            </div>
        </section>
    <section class="main" id="main">
        <div class="container border">
        <div class="row">
            <div class="col-md-4">
                <div class="featurecard bluish">
                    <img src="./assets/images/engineering.png" class="medimg">
                    <h4>Engineering</h4><p>All the Engineering Notes and e-books can be viewed here</p>
        
                </div>
            </div>
              <div class="col-md-4">
                  <div class="featurecard greenish">
                      <img src="./assets/images/knowledge.png" class="smallimg">
                      <h4>Knowledge</h4><p>All the latest stuff apart from Textbook will be notified frequently</p>
                  
                  </div>
            </div>
              <div class="col-md-4">
             <div class="featurecard yellowish">
                 <img src="./assets/images/placement.png" class="medimg">
                 <h4>Placements</h4><p>All the placements related queries and information can be viewed here</p>
                  </div>
            </div>
            </div>
         
        </div>   
    </section>
    <section class="whyus container">
   <center><h2>Why Searching for EducateKid</h2></center>
        <div class="row topper">
        <div class="col-md-6">
            <h3>Our Motto</h3>
            <p >An Education platform that has all the required
                goalsheet from an actual start to perfect end
                through all the resources.We creates Online course programs, exams, and labs that help you to crack the certification examinations and also learning programs and focuses on school curriculum and test preparation for engineering exams.We helps to build a strong foundation for future academic success by providing a comprehensive and engaging online and web-based curriculum to greatly assist learners to succeed. </p>
        </div>
             <div class="col-md-6">
            <img src="./assets/images/educate.png">
        </div>
        </div>
                <div class="row topper">
                     <div class="col-md-6">
            <img src="./assets/images/team.png" class="classyimg">
        </div>
        <div class="col-md-6">
             <h3>Our Working Method</h3>
            <p> Our Platform has various collections of resources and contents which was analyzed by different PHD teachers and based on Airtifical intelligence the placement papers has been published which is accurate on the possiblity of asking in exams. we provide real time examples on tough engineering concepts for just making it more simple and easier to learn.</p>
        </div>
            
        </div>
    </section>
    <section class="pinkletter">
        <div class="container">
    <div class="row pad">
    <div class="col-md-7">
        <h3 class="pad"> Get the Latest Updates from EducateKid</h3>
       
    </div>  
         <div class="col-md-5">
          <form class="search" action="">
        <input  class="controls" type="text" placeholder="Enter your Email Adress " name="pick" required="" >
        <button type="submit">Join Now</button>
      </form>
    </div>
        </div>
            </div>
    </section>
    <section class="footer-lite">
        <div class="container">
    <div class="row">
         <div class="col-md-4">
      <img src="assets/images/logo.png">
      <p> Email us : info@educatekid.in</p>
      <p>Complaints : complaints@educatekid.in</p>
      <p>Contribution : contribute@educatekid.in</p>
      <p>Classes : classes@educatekid.in</p>
    </div>    
         <div class="col-md-2">
        <h4>Company</h4>
       <p>About Us</p> 
        <p>Teacher Programs</p>
        <p>Official Blog</p>
        <p>Media</p>
        <p>Sitemap</p>
    </div>    
    <div class="col-md-2">
        <h4>Services</h4>
       <p>E-books</p> 
        <p>Question banks</p>
        <p>Online Tutorials</p>
        <p>Mock Test Series</p>
        <p>Job Alerts</p>
    </div>  
        <div class="col-md-4">
            <h4>Follow us on:</h4>
         <a href="#" class="facebook-ico"><i class="fa fa-facebook"></i></a> 
  <a href="#" class="twitter-ico"><i class="fa fa-twitter"></i></a> 
  <a href="#" class="google-ico"><i class="fa fa-google"></i></a> 
  <a href="#" class="linkedin-ico"><i class="fa fa-linkedin"></i></a>
       </div>
        <div class="col-md-12 topper border">
        <p><b>&copy; 2019 Educatekid. All Rights Reserved</b></p>
        </div>
    </div>
    
    </div>
    </section>
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
    <script>
function openNav() {
  document.getElementById("myNav").style.height = "100%";
}

function closeNav() {
  document.getElementById("myNav").style.height = "0%";
}
</script>
    </body></html>
