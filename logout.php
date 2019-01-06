<?php

session_start();
  include("con.php");
if ((!$con)&&($_SESSION["access"]=="give")) {
  echo("Connection failed ");
}

 
else
{
		
		$filename=$_FILES["file"]["tmp_name"];		


		 if($_FILES["file"]["size"] > 0)
		 {
		  	$file = fopen($filename, "r");
	        while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
	         {


	           $sql = "INSERT into employeeinfo (one,two,three,four,five) 
                   values ('".$getData[0]."','".$getData[1]."','".$getData[2]."','".$getData[3]."','".$getData[4]."')";
                
                echo($sql);
                
                   $result = mysqli_query($con, $sql);
			if($result)
            {
                echo("done");
                echo("<br>");
                
            }
	         }
			
	         fclose($file);	
		 }
    
}
		 


 ?>