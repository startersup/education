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
      header('location:'.$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING']);
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
    header('location:'.$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING']);
     exit();
} else {
  echo '<script language="javascript">';
    echo 'alert("Try Again")';
    echo '</script>';
}
}
//mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<base href="/">
  <meta charset="utf-8">
<title><?php echo str_replace('-',' ',$_GET['cat']) ?></title>
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
<link href="https://fonts.googleapis.com/css?family=Merriweather|Open+Sans|Acme|Roboto:500" rel="stylesheet">
  <link rel="stylesheet" href="./assets/css/nav.css">
      <link rel="stylesheet" href="./assets/css/fonts.css">
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
            
		<form class="navbar-form form-inline">
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
</nav>


    <section class="quants" id="main">
        <div class="container1">
    <div class="row">
        <div class="col-md-10">
         <div class="Education">
             <br>
    <div class="card topping">
     <h3><i class="fa fa-star" aria-hidden="true"></i> Quantative Ability</h3>
        <div id="preloader">
  <div id="status">&nbsp;</div>
</div>
        <div id="load">
        <div class="row" >
            <br>
        <div class="col-md-4">
            <div class="card hover topics"><h4>Number System</h4>
               <center><a href="quest/Quantitative-Ability/Number-Systems/0"> <button class="button black">Start Practice</button></a></center>
            </div>
            </div>
               <div class="col-md-4">
                 <div class="card hover topics"><h4>Average</h4>
               <center> <a href="quest/Quantitative-Ability/Average/0"><button class="button black">Start Practice</button></a></center>
            </div>
            </div>
               <div class="col-md-4">
                     <div class="card hover topics"><h4>Percentage</h4>
               <center><a href="quest/Quantitative-Ability/Percentage/0"> <button class="button black">Start Practice</button></a></center>
            </div>
            </div>
        </div>
                    <div class="row" >
        <div class="col-md-4">
            <div class="card hover topics"><h4>Profit & Loss</h4>
               <center><a href="quest/Quantitative-Ability/Profit_Loss/0"> <button class="button black">Start Practice</button></a></center>
            </div>
            </div>
               <div class="col-md-4">
                 <div class="card hover topics"><h4>Time, Speed & Distance</h4>
               <center> <a href="quest/Quantitative-Ability/Time-Speed_Distance/0"><button class="button black">Start Practice</button></a></center>
            </div>
            </div>
               <div class="col-md-4">
                     <div class="card hover topics"><h4>Data Interpretation</h4>
               <center> <a href="quest/Quantitative-Ability/Data-Interpretation/0"><button class="button black">Start Practice</button></a></center>
            </div>
            </div>
        </div>     
           <div class="row" >
        <div class="col-md-4">
            <div class="card hover topics"><h4>Probability</h4>
               <center><a href="quest/Quantitative-Ability/Probability/0"> <button class="button black">Start Practice</button></a></center>
            </div>
            </div>
               <div class="col-md-4">
                 <div class="card hover topics"><h4>Mixture & Solution</h4>
               <center><a href="quest/Quantitative-Ability/Mixture_Solution/0"> <button class="button black">Start Practice</button></a></center>
            </div>
            </div>
               <div class="col-md-4">
                     <div class="card hover topics"><h4>Ratio & Proportion</h4>
               <center><a href="quest/Quantitative-Ability/Ratio_Proportion/0"> <button class="button black">Start Practice</button></a></center>
            </div>
            </div>
        </div>     
</div></div>
            </div>
        </div>
          <div class="col-md-2">
         <div class="card fixed">
             <h4>Interested</h4>
             <br>
             <p>#Placements</p><br><p>#symposium</p><br><p>#conference</p><br><p>#presentation</p><br><p>#Culturals</p><br><p>#intercollege </p>
            </div>
        </div>
        </div>
             </div>
    </section>
       
    </body></html>