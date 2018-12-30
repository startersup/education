
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
<link rel="stylesheet" href="./assets/css/style.css">
  <script src="./assets/js/sidenav.js"></script>  
</head>
<body>
    <div class="preload"><p style="float:inherit;font-size:20px;margin-left:5%;">Preparing Kit for you.....</p><img style="width:350px;" src="./assets/images/book-gif.gif">
</div>
    <div class="content">
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
  <a id="log" href="signup.php">Login</a>  
   <div class="search-container">
    <form action="/action_page.php" class="hidden-xs hidden-sm">
      <input type="text" placeholder="Search for terms.." name="search" class="search" >
    </form>
  </div></div>

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
        <div class="icon-bar hidden-xs">
  <a href="#" class="facebook"><i class="fa fa-facebook"></i></a> 
  <a href="#" class="twitter"><i class="fa fa-twitter"></i></a> 
  <a href="#" class="google"><i class="fa fa-google"></i></a> 
  <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
  <a href="#" class="youtube"><i class="fa fa-youtube"></i></a> 
</div>
    </div>
    <script>
$(function() {
    $(".preload").fadeOut(3000, function() {
        $(".content").fadeIn(500);        
    });
});
   document.getElementById("log").text="Logout"; document.getElementById("log").setAttribute("href","logout.php");

    
    
    </script>
    </body></html>