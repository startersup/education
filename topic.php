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
    <title>Educate Kid | <?php echo str_replace('-',' ',$_GET['sub']) ?> </title>
     <link rel="icon" href="./assets/images/speed.png" type="image/gif" sizes="16x16">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="description" content=" <?php $cat=str_replace('-',' ',preg_replace('#[^0-9a-zA-Z_-]#i', '', $_GET['cat']));
                                $sub=str_replace('-',' ',preg_replace('#[^0-9a-zA-Z_-]#i', '', $_GET['sub']));
                                $sub=str_replace('_',' ',$sub);
                                $sql="select question from questions where category='".$cat."' AND sub='".$sub."' AND qid='".$_GET['qid']."'";
                                $query=mysqli_query($conn,$sql);
                                $row = mysqli_fetch_assoc($query);
                                echo $row['question'] ?> ">
<meta name="keyword" content="aptitude questions, placement questions, tcs aptitiude questions, cts placement questions, ibm placement papers, aptitude practice">
<link href="https://fonts.googleapis.com/css?family=Merriweather|Open+Sans|Roboto:500" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Merriweather|Open+Sans|Roboto:500" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/style.css">
  <script src="./assets/js/sidenav.js"></script>  
  <link rel="stylesheet" href="./assets/css/nav.css">
    <link rel="stylesheet" href="./assets/css/fonts.css">
      <link rel="stylesheet" href="./assets/css/comment.css">
      <script src="./assets/js/sidenav.js"></script> 
</head>
<body>
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
    </div>
</nav>
   
    <section class="main" id="main">
        <div class="container1">
            <div class="row">
                <div class="col-md-10">
                    <div class="Education">
                        <br>
                        <div class="card topping">
                            <div class="topcard">
                            <h3><i class="fa fa-star" aria-hidden="true"></i> <?php $sub= str_replace("_", " & ",$_GET["sub"] ); $sub= str_replace("-", " ",$sub ); echo $sub; ?></h3>
                            </div><br><br>
                            <div id="preloader">
                                <div id="status">&nbsp;</div>
                            </div>
                            <div id="load">
                                <div class="question">
                                <?php 
                                $cat=str_replace('-',' ',preg_replace('#[^0-9a-zA-Z_-]#i', '', $_GET['cat']));
                                $sub=str_replace('-',' ',preg_replace('#[^0-9a-zA-Z_-]#i', '', $_GET['sub']));
                                $sub=str_replace('_',' ',$sub);
                                $qid=preg_replace('#[^0-9a-zA-Z_-]#i', '', $_GET['qid']);
                                $sql="select question,op1,op2,op3,op4,appeared,answer,explanation from questions where category='".$cat."' AND sub='".$sub."' AND qid='".$qid."'";
                                $query=mysqli_query($conn,$sql);
                                $row = mysqli_fetch_assoc($query);
                                    echo "<p>1) ".$row['question']."</p>
                                    <ul>
                                        <li>A) ".$row['op1']."</li>
                                        <li>B) ".$row['op2']."</li>
                                        <li>C) ".$row['op3']."</li>
                                        <li>D) ".$row['op4']."</li>
                                    </ul>
                                    <div class='answer'>  <div class='display'><span>Asked in ".$row['appeared']."</span>
                                    </div>
                                        <p><b>Answer:</b> ".$row['answer']."</p>
                                         <p><b>Explanation:</b></p><textarea style='max-width:1000px;
                                          width:100%;
                                          min-height:300px;
                                          font-size:14px;
                                           font-family:'proximanovasemibold';readonly>".$row['explanation']."</textarea> 
                                    </div>";
                                    ?>
                                  <div class="commentbox">
                                      <center><h4>Add your Comments</h4></center>
                                        <div class="comments">
                                            <div class="comment-wrap">
                                                <div class="comment-block">
                                                    <form action="" method="post">
                                                        <textarea name="comment"  cols="0" rows="3" placeholder="Add comment..."></textarea>
                                                        <input name="com" class="btn btn-primary" type="submit" value="Comment">
                                                    </form>
                                                </div>
                                            </div>
                                            <?php 
                                              $sql="SET time_zone='+5:30';";
                                              $query=mysqli_query($conn,$sql);
                                               $sub=str_replace('-',' ',preg_replace('#[^0-9a-zA-Z_-]#i', '', $_GET['sub']));
                                              $sub=str_replace('_',' ',$sub);
                                            if ($_SERVER["REQUEST_METHOD"] == "POST"){ if(isset($_POST["com"])){ if(isset($_SESSION['userid'])){ 
                                             $sql="INSERT into comments (comment,user,dt,qid) values('".$_POST['comment']."','".$_SESSION['uname']."',CURRENT_TIMESTAMP,'".$_GET['qid']."')";
                                             $query=mysqli_query($conn,$sql);
                                             } else { echo '<script language="javascript">';
                                                    echo 'alert("Login First")';
                                                      echo '</script>';} } } 
                                               $sql="select * from comments where qid='".$_GET['qid']."'";
                                               $query=mysqli_query($conn,$sql);
                                                while($row = mysqli_fetch_assoc($query)) {       
                                               echo  "<div class='comment-wrap'>
                                                <div class='comment-block'>
                                                    <p class='comment-text'>".$row['comment']."</p>
                                                    <div class='bottom-comment'>
                                                        <div class='comment-date'><span>Posted by ".$row['user']."</span> | ".$row['dt']."</div>
                                                    </div>
                                                </div>
                                               </div>";
                                                      }?>
                                      </div>
                                    </div>
                                </div>
            
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 hidden-xs">
                    <div class="card fixed">
                        <h4>Interested</h4>
                        <br>
                        <p>#Placements</p>
                        <br>
                        <p>#symposium</p>
                        <br>
                        <p>#conference</p>
                        <br>
                        <p>#presentation</p>
                        <br>
                        <p>#Culturals</p>
                        <br>
                        <p>#intercollege</p>
                    </div>
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
    <style>
      .question li {
            list-style-type: none;
            font-size: 15px;
            padding:10px 0px;
            font-family: Roboto, sans-serif;
        }  
        
        .fa-comment {
            margin-top: 10px;
            font-size: 14px;
        }
        .comment {
            font-family: Roboto, sans-serif;
            margin-top: 10px;
            font-size: 14px;
        }
        @media screen and (max-width: 600px) {
            .card {
                transition: 0.3s;
                width: 100%;
                z-index: -1000;
                background-color: #ffffff;
                padding: 5px;
                margin-top: 10px;
            }
            li {
                list-style-type: none;
                font-size: 15px;
                padding:10px 0px;
                font-family: Roboto, sans-serif;
            }
            .container1 {
                margin: 0px !important;
            }
                

        }
    </style>
</body>

</html>