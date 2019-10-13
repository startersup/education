<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
<title>Engineering Kit | Events </title>
        <link rel="icon" href="./assets/images/speed.png" type="image/gif" sizes="16x16">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Merriweather|Open+Sans|Roboto:500" rel="stylesheet">
<link rel="stylesheet" href="../assets/css/style.css">
  <script src="../assets/js/sidenav.js"></script>  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Merriweather+Sans|Charm|Open+Sans|Roboto:500" rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/nav.css">
    <link rel="stylesheet" href="../assets/css/fonts.css">
      <link rel="stylesheet" href="../assets/css/forum.css">
      <script src="../assets/js/sidenav.js"></script> 
</head>
<body style="background-color:#f4f4f4;">
    <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.2&appId=446635862374489&autoLogAppEvents=1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<nav class="navbar navbar-default navbar-fixed-top navbar-expand-lg navbar-light">
	<div class="container">
	<div class="navbar-header d-flex col">
	
		<a class="navbar-brand" href="..">Educate<b>Kid</b> <span>Events</span></a>  		
			<i data-target="#navbarCollapse" onclick="openNav()" data-toggle="collapse" class="navbar-toggle navbar-toggler visible-xs visible-sm ml-auto fa fa-bars" ></i>
	</div>
	<div class="hidden-xs hidden-sm">
		<ul class="nav navbar-nav">
			<li class="nav-item"><a href="../index.php" class="nav-link">Home</a></li>
			<li class="nav-item"><a href="../events/" class="nav-link">Events</a></li>			
			<li class="nav-item dropdown">
				<a data-toggle="dropdown" href="#" class="nav-link dropdown-toggle">Services<b class="caret"></b></a>
				<ul class="dropdown-menu">					
					<li><a href="../ebooks" class="dropdown-item">Engineering E-Books</a></li>
					<li><a href="../qbank.html" class="dropdown-item">Engineering Question Banks</a></li>
                    <li><a href="../aptitude.php" class="dropdown-item">Aptitude Practice</a></li>
					<li><a href="../placepapers" class="dropdown-item">Placement Papers</a></li>
					<li><a href="../jobs" class="dropdown-item">Job Alerts</a></li>
				</ul>
			</li>
			<li class="nav-item"><a href="./forum/" class="nav-link">Forum</a></li>
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
 <section>
   <div class="forumpad container">
     <div class="col-md-3" >
       <div class="card divfix">
         <h4>@ Saicharan   <button data-toggle="collapse" data-target="#demo" class="btn btn-info">Add Event</button></h4>
           <div class="hidden-xs">
           <hr>
           <p><span class="bold">Location:</span> chennai, Tamilnadu.</p>
           <p><span class="bold">Interest:</span> Cloud Computing, Digital Marketing, Core Java.</p>
              
         </div>
         </div>
     </div>
       <div class="col-md-6">
       <div class="card" >
             <div id="demo" class="collapse">  
        <textarea class="form-control" rows="4" placeholder="Enter your Message Here" id="comment"></textarea><br>	<input type="image" src="../assets/images/attachment.png" style="width:20px;"> <input type="file" id="my_file" style="display: none;" /> <button class="btn btn-info">Post your Comments </button> <br><br>
  </div>
           <div class="borders">
        <div class="header"><p style="display:inline;">Rana Dagupathi Rao</p><p style="float:right;">posted 2 hrs ago</p></div>
               <img src="../assets/images/wall.jpg" style="max-width:800px;width:100%;padding:10px;">
               <p class="ptag"><span>Event Name:</span> Symposia</p>
               <p class="ptag"><span>Event Date:</span> 14/02/2019 at 12:30 am</p>
               <p class="ptag"><span>Organized by:</span> KCG College of Technology </p>
               <p class="ptag"><span>Event Venue:</span> KCG College of Technology, Karapakkam chennai-600097</p>
               <p class="ptag"><span>Register Link:</span><a href="https://www.amazon.com"> https://www.amazon.com</a> </p>
               <p class="ptag"><span>Entry Fee:</span> ₹200</p>
           <p class="ptag">KCG College of Technology is conducting a workshop related to cloud services of amazon where all the amazon web service products were taught by the experts and an event certification is providd to all the members present on successful completion of the workshop. </p>
                 <div class="card-footer">
                        <a href="#" class="card-link"><i class="fa fa-thumbs-up"></i> Like (12)</a>
                        <a href="#" class="card-link"><i class="fa fa-comment"></i> Comment (3)</a>
                      <div class="fb-share-button" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button" data-size="small" data-mobile-iframe="true"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a></div>
                    </div>
         </div>
           <hr>
                      <div class="borders">
        <div class="header"><p style="display:inline;">Vinodhan Thunderbolt</p><p style="float:right;">posted 2 hrs ago</p></div>
           <br>
           <p class="ptag">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                 <div class="card-footer">
                        <a href="#" class="card-link"><i class="fa fa-thumbs-up"></i> Like</a>
                        <a href="#" class="card-link"><i class="fa fa-comment"></i> Comment</a>
                       <div id="fb-root"></div>
                    </div>
         </div>
           
            <hr>
                      <div class="borders">
        <div class="header"><p style="display:inline;">Vinodhan</p><p style="float:right;">posted 2 hrs ago</p></div>
           <br>
           <p class="ptag">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                 <div class="card-footer">
                        <a href="#" class="card-link"><i class="fa fa-thumbs-up"></i> Like</a>
                        <a href="#" class="card-link"><i class="fa fa-comment"></i> Comment</a>
                        <a href="#" class="card-link"><i class="fa fa-mail-forward"></i> Share</a>
                    </div>
         </div>
           
         </div>
       </div>
       
        <div class="col-md-3">
       <div class="card divfix">
         <h4><img src="../assets/images/trend.png"> Trending Events</h4><hr>
           <p></p>
         
         </div>
     </div>
     </div> 
</section>   
    <script>$("input[type='image']").click(function() {
    $("input[id='my_file']").click();
});</script>
</body></html>


    