<?php
include 'config.php';
$sql= "select qid,question,answer,op1,op2,op3,op4,explanation from questions where qid='".$_GET['q']."'";
$query= mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($query);
echo "<div class='modal-header'>
					<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
					<h4 class='modal-title' id='myModalLabel2'>Edit Question #".$row['qid']."</h4>
				</div>

				<div class='modal-body noborder'>
				<form class='form' action='qlist.php' method='post'>
				  <p>Question</p>
                    <textarea name='qns' class='question form-group form-control' rows='6' cols='30'>
                    ".$row['question']."
                 </textarea><br>
                     <p>Answer</p>
                    <input name='ans' type='text' class='form-group form-control' value='".$row['answer']."'><br>
                    <p>Options</p>
                    <div class='row'>
                    <div class='col-xs-6'>
                        <input name='op1' type='text' class='form-group form-control' value='".$row['op1']."'>
                        </div> <div class='col-xs-6'>
                        <input name='op2' type='text' class='form-group form-control' value='".$row['op2']."'>
                        </div> <div class='col-xs-6'><br>
                        <input name='op3' type='text' class='form-group form-control' value='".$row['op3']."'>
                        </div> <div class='col-xs-6'><br>
                        <input name='op4' type='text' class='form-group form-control' value='".$row['op4']."'>
                        <input name='id' type='hidden' class='form-group form-control' value='".$row['qid']."'>
                        </div>
                    </div><br>
                     <p>Explanation</p>
                    <textarea name='exp' class='question form-group form-control' rows='4' cols='30'>
                    ".$row['explanation']."
                 </textarea><br>
                   <center><button name='up' type='submit' class='form-group btn btn-success'>Update</button></center> </form>
				</div>";
?>