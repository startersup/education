<?php
session_start();
include 'config.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST["up"])) {
    $sql="update questions set question='".trim($_POST['qns'])."',answer='".trim($_POST['ans'])."',op1='".trim($_POST['op1'])."',op2='".trim($_POST['op2'])."',op3='".trim($_POST['op3'])."',op4='".trim($_POST['op4'])."',explanation='".trim($_POST['exp'])."' where qid='".trim($_POST['id'])."' ";
    $query = mysqli_query($conn,$sql);
  }}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Engineering Kit</title>
    <link rel="icon" href="../assets/images/speed.png" type="image/gif" sizes="16x16">
  <meta charset="utf-8">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Merriweather|Open+Sans|Roboto:500" rel="stylesheet">
        <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
<link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/nav.css">
     <link rel="stylesheet" href="../assets/css/fonts.css">
    <link rel="stylesheet" href="./css/admin.css">
  <script src="./js/side.js"></script>  
</head>
<script type="text/javascript">
    function update(txt){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("update").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "./update.php?q=" + txt, true);
    xmlhttp.send();
  }
</script>

<body>
<div class="navbar navbar-default navbar-fixed-top navbar-expand-lg navbar-light">
    <div class="admin">
        <center><h4> Admin Dashboard</h4></center>
  </div></div>

    <section class="top" id="main">

<div class="container3">
	<div class="row">
	<table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Id</th>
                <th>Question</th>
                <th>Answer</th>
                <th>options</th>
                <th>Explanation</th>
                  <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
           $sql= "select qid,question,answer,op1,op2,op3,op4,explanation from questions";
           $query= mysqli_query($conn,$sql);
           while($row = mysqli_fetch_assoc($query)) { 
            $id=$row['qid'];
            echo '<tr>
                <td>'.$row['qid'].'</td>
                <td>'.$row['question'].' </td>
                 <td>'.$row['answer'].'</td>
                <td>'.$row['op1']."<br> ".$row['op2']." <br> ".$row['op3']." <br> ".$row['op4'].'</td>
                 <td>'.$row['explanation'].'</td>
                <td><button class="btn btn-success" onclick="update(\''.$id. '\')" data-toggle="modal" data-target="#myModal2">Update</button></td>
            </tr>';
             }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <th>Id</th>
                <th>Question</th>
                <th>Answer</th>
                <th>options</th>
                <th>Explanation</th>
                  <th>Action</th>
            </tr>
        </tfoot>
    </table>
	</div>
</div>
        
        <!-- Modal -->
	<div class="modal right fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
		<div class="modal-dialog" role="document">
			<div id="update" class="modal-content">
				

			</div><!-- modal-content -->
		</div><!-- modal-dialog -->
	</div><!-- modal -->
	
    </section>
<style>table{
    width:100%;
     font-family: 'ProximaNovaLtLight';
}
#example_filter{
    float:right;
}
#example_paginate{
    float:right;
}
    td
    {
          font-family: 'ProximaNovaRgRegular'; !important;
    }
    th
    {
         font-family: 'ProximaNovaBold'; !important;
    }
label {
    display: inline-flex;
    margin-bottom: .5rem;
    margin-top: .5rem;
   
}
     .noborder textarea
    {
        border:none !important;
      
    }
 .noborder input
    {
         border:none !important;  
    }
    </style>
    <script>$(document).ready(function() {
    $('#example').DataTable(
        
         {     

      "aLengthMenu": [[5, 10, 25, -1], [5, 10, 25, "All"]],
        "iDisplayLength": 5
       } 
        );
} );
function checkAll(bx) {
  var cbs = document.getElementsByTagName('input');
  for(var i=0; i < cbs.length; i++) {
    if(cbs[i].type == 'checkbox') {
      cbs[i].checked = bx.checked;
    }
  } 
}</script>
    </body>
    </html>