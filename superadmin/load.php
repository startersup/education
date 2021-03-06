<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
include 'config.php';
$id=uniqid("QNS");
$qn = $_POST["qn"];
$op1 = $_POST["op1"];
$op2 = $_POST["op2"];
$op3 = $_POST["op3"];
$op4 = $_POST["op4"];
$ans = $_POST["ans"];
$cat = $_POST["cat"];
$app = $_POST["app"];
$exp = $_POST["exp"];
$name= $_POST["qname"];
$subcat= $_POST["subcat"];
$sql = "INSERT INTO questions (qid, question, op1,op2,op3,op4,answer,explanation,appeared,category,sub)
   VALUES ('".$id."', '".$qn."','".$op1."','".$op2."','".$op3."','".$op4."','".$ans."','".$exp."','".$app."','".$cat."','".$subcat."')";
if ($conn->query($sql) === TRUE) {
     header('Location: load.php');
}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Upload Data | Admin</title>
    <link rel="icon" href="../assets/images/speed.png" type="image/gif" sizes="16x16">
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Merriweather|Open+Sans|Roboto:500" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/nav.css">
      <link rel="stylesheet" href="../assets/css/fonts.css">
    <link rel="stylesheet" href="./css/admin.css">
   
<script type="text/javascript">
function test()
{
        console.log("hello");

}
    	function myFunction() {
  var s = document.getElementById("sel1").value;
  switch(s)
  {
  	case "Quantitative Ability":
      var list=["Number Systems","Average","Percentage","Profit Loss","Time Speed Distance","Data Interpretation","Probability","Mixture Solution","Ratio Proportion"];
        pop(list);  
      break;
      case "Logical Reasoning":
              var list=["Arrangements","Ordering and ranking","Blood Relations","Team Formations","Blood Relations","Syllogisms","Analytical Puzzles","Number Series","Clock and Calendar Problems "]; 
              pop(list);
              break;         
      case "Verbal Ability":
      	var list=["Reading Comprehension","Jumbled Sentences","Synonyms Antonyms","Error Spotting","Sentence Corrections","Summary Writing","Para completion","Critical Reasoning","Listen Answer"];
      	pop(list);
      	break;
  }
}
function pop(list)
{
	var i;
	var x = document.getElementById("sel2");
	while (x.hasChildNodes()) {
    x.removeChild(x.lastChild);
}
for(i=0;i<list.length;i++)
      {
      var op = document.createElement("option");
       var att= document.createAttribute("value");
       att.value=list[i];
       var txt=document.createTextNode(list[i]);
       op.setAttributeNode(att);
       op.appendChild(txt);
       x.appendChild(op);
      }	
}
</script>
</head>

<body>
    <div class="navbar  navbar-fixed-top navbar-expand-lg navbar-light">
        <div class="admin">
            <center>
                <h4> Admin Dashboard</h4>
            </center>
        </div>
    </div>


<div id="mySidebar" class="sidepanel" >
  <a href="./admin.html">Dashboard</a>
   <a href="./pages.html">Pages List</a>
    <a href="./uer.html">Web Userlist</a> 
    <a href="./jobs.html">Jobs List</a> 
     <a href="./eventlist.html">Events List</a> 
    <a href="./load.php">Upload Data</a>   
         <a href="./qlist.php">Questions</a>  
        <a href="./settings.html">Settings</a>  
</div>

    <section class="main" id="main">
        <h4>UPLOAD PANEL</h4>
        <br>
        <br>
        <div class="container">
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#1" aria-controls="home" role="tab" data-toggle="tab">Upload Questions</a>
                </li>
                <li role="presentation"><a href="#2" aria-controls="profile" role="tab" data-toggle="tab">Upload Jobs </a>
                </li>
                <li role="presentation"><a href="#3" aria-controls="profile" role="tab" data-toggle="tab">Upload Events </a>
                </li>
                <li role="presentation"><a href="#4" aria-controls="profile" role="tab" data-toggle="tab">Upload Engineering Notes </a>
                </li>
            </ul>
            <div class="tab-content" style="padding:0px;">
                <div role="tabpanel" class="tab-pane active" id="1">
                    <div class="formtab card fixed">
                        <form class="form" action="" method="post">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <p>Question :</p>
                                        <textarea name="qn" class="form-control" rows="7" id="comment"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-3 col-xs-3">
                                            <p>Option 1:</p>
                                            <input name="op1" type="text" class="form-control" placeholder="">
                                        </div>

                                        <div class="col-md-3 col-xs-3">
                                            <p>Option 2:</p>
                                            <input name="op2" type="text" class="form-control" placeholder="">
                                        </div>
                                        <div class="col-md-3 col-xs-3">
                                            <p>Option 3:</p>
                                            <input name="op3" type="text" class="form-control" placeholder="">
                                        </div>
                                        <div class="col-md-3 col-xs-3">
                                            <p>Option 4:</p>
                                            <input name="op4" type="text" class="form-control" placeholder="">
                                        </div>
                                </div></div>
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <div class="col-md-6">
                                            <p>Answer:</p>
                                            <input name="ans" type="text" class="form-control" placeholder="">
                                            <br>
                                            <p>Question Type:</p>
                                            <select name="cat" class="form-control" onchange="myFunction()" id="sel1">
                                                <option value="" disabled selected style="display:none;">Select</option>
                                                <option>Quantitative Ability</option>
                                                <option>Logical Reasoning</option>
                                                <option>Verbal Ability</option>
                                            </select>
                                            <br>
<!-- HEAD:superadmin/load.html-->
                                              <p>Subcategory:</p>
                                     <select name="subcat" class="form-control" id="sel2">
                                                 <option value="" disabled selected style="display:none;">Select</option>
                                            </select>
<!-- c0f4e1839a5f7eb27a33df6a036df1406818546a:superadmin/load.php-->
                                        </div>
 <!--HEAD:superadmin/load.html-->
                                        <div class="col-md-6">
                                            <p>Explanation:</p>
                                            <textarea name="exp" class="form-control" rows="7" id="comment"></textarea>
                                          <p>Asked in:</p>
                                            <input name="app" type="text" class="form-control" placeholder="Eg:CTS,TCS, Infosys...">
<!-- c0f4e1839a5f7eb27a33df6a036df1406818546a:superadmin/load.php-->
                                    
                                            
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-6">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <br>
                                            <button type="submit" style="width:100%;" class="btn btn-success">Submit</button>
                                        </div>
                                    </div>
                                </div>
                                    </div></div>
                        </form></div>
                </div>

                <div role="tabpanel" class="tab-pane" id="2">

                                        <div class="formtab card fixed">
                        <form class="form" action="/action_page.php">
                            <div class="row">

                                <div class="col-md-6">

                                    <div class="form-group">
                                        <div class="col-md-6">
                                            <p>Job Designation:</p>
                                            <input type="text" class="form-control" placeholder="Eg: System Engineer">
                                            <br>
                                            <p>Industry:</p>
                                            <select class="form-control" id="sel1">
                                                <option>Information Technology</option>
                                                <option>Non IT</option>
                                                <option>Business Process Outsourcing</option>
                                            </select>
                                            <br>
                                            <p>Company Name:</p>
                                            <input type="text" class="form-control" placeholder="Eg:CTS,TCS, Infosys...">
                                        </div>

                                        <div class="col-md-6">
                                            <p>CTC offering:</p>
                                            <input type="text" class="form-control" placeholder="Eg: 3.5LPA (or) 2.5 to 3LPA..."><br>

                                             <p>Skills Required:</p>
                                            <input type="text" class="form-control" placeholder="Eg: java, python, c++.....">

                                            <br>

                                             <p>Experience Required:</p>
                                            <select class="form-control" id="sel1">
                                                <option>0 year</option>
                                                <option>0 to 1 year</option>
                                                <option>1 to 2 Years</option>
                                                <option>2 to 3 Years</option>
                                                 <option>3 to 4 Years</option>
                                                 <option>more than 4 Years</option>
                                            </select>

                                        </div>

                                        <div class="col-md-12">  <div class="form-group"> <br>
                          <p>Url to Apply:</p>
                         <input type="text" class="form-control" placeholder="Eg: www.accenture.com.."></div></div>

                                    </div></div>

                                        <div class="col-md-6">
                                              <div class="form-group">
                                                      <p>Job Description:</p>
                                               <textarea class="form-control" rows="12" id="comment"></textarea>
                                        </div>
                                            <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <br>
                                            <button type="submit" style="width:100%;" class="btn btn-success">Submit</button>
                                        </div>
                                    </div>
                                    </div>



                            </div>
                        </form>
                    </div>

                </div>
                <div role="tabpanel" class="tab-pane" id="3">
                  <div class="formtab card fixed">
                        <form class="form" action="/action_page.php">
                            <div class="row">

                                <div class="col-md-6">

                                    <div class="form-group">
                                        <div class="col-md-6">
                                            <p>Event Name:</p>
                                            <input type="text" class="form-control" placeholder="Eg: XYZ">
                                            <br>
                                            <p>Event Category:</p>
                                            <select class="form-control" id="sel1">
                                                <option>Symposium</option>
                                                <option>Non IT</option>
                                                <option>Business Process Outsourcing</option>
                                            </select>
                                            <br>
                                            <p>Organized by:</p>
                                            <input type="text" class="form-control" placeholder="Eg:CTS,TCS, Infosys...">
                                        </div>

                                        <div class="col-md-6">
                                            <p>Event Date:</p>
                                            <input type="text" class="form-control" placeholder="Eg: 24/01/2019"><br>

                                             <p>Event Venue:</p>
                                            <input type="text" class="form-control" placeholder="Eg: xyz college">

                                            <br>

                                             <p>Entry Fee:</p>
                                             <input type="text" class="form-control" placeholder="Eg: Rs 100">
                                        </div>
                             <div class="col-md-6">  <div class="form-group"> <br>
                          <p>Url to Register:</p>
                         <input type="text" class="form-control" placeholder="Eg: www.accenture.com.."></div></div>
                                            <div class="col-md-6">  <div class="form-group"> <br>
                          <p>Upload Banners :</p>
                       <input type="file" id="myFile"></div></div>
                                    </div></div>

                                        <div class="col-md-6">
                                              <div class="form-group">
                                                      <p>Event Description:</p>
                                               <textarea class="form-control" rows="12" id="comment"></textarea>
                                        </div>
                                            <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <br>
                                            <button type="submit" style="width:100%;" class="btn btn-success">Submit</button>
                                        </div>
                                    </div>
                                    </div>



                            </div>
                        </form>
                    </div>

                </div>
                <div role="tabpanel" class="tab-pane" id="3">
                                  <div class="formtab card fixed">
                        <form class="form" action="/action_page.php">
                            <div class="row">

                                <div class="col-md-6">

                                    <div class="form-group">
                                        <div class="col-md-6">
                                            <p>Subject Name:</p>
                                            <input type="text" class="form-control" placeholder="Eg: XYZ">
                                            <br>
                                            <p>Event Category:</p>
                                            <select class="form-control" id="sel1">
                                                <option>Symposium</option>
                                                <option>Non IT</option>
                                                <option>Business Process Outsourcing</option>
                                            </select>
                                            <br>
                                            <p>Organized by:</p>
                                            <input type="text" class="form-control" placeholder="Eg:CTS,TCS, Infosys...">
                                        </div>

                                        <div class="col-md-6">
                                            <p>Event Date:</p>
                                            <input type="text" class="form-control" placeholder="Eg: 24/01/2019"><br>

                                             <p>Event Venue:</p>
                                            <input type="text" class="form-control" placeholder="Eg: xyz college">

                                            <br>

                                             <p>Entry Fee:</p>
                                             <input type="text" class="form-control" placeholder="Eg: Rs 100">
                                        </div>
                             <div class="col-md-12">  <div class="form-group"> <br>
                          <p>Url to Register:</p>
                         <input type="text" class="form-control" placeholder="Eg: www.accenture.com.."></div></div>
                                    </div></div>

                                        <div class="col-md-6">
                                              <div class="form-group">
                                                      <p>Event Description:</p>
                                               <textarea class="form-control" rows="12" id="comment"></textarea>
                                        </div>
                                            <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <br>
                                            <button type="submit" style="width:100%;" class="btn btn-success">Submit</button>
                                        </div>
                                    </div>
                                    </div>



                            </div>
                        </form>
                    </div>
                </div>

                </div>
        </div>
    </section>
      

</body>

</html>