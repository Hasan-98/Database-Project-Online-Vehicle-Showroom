<html>
  <head><title>Customer</title></head>
  <body><br><br><br>

   
   <?php
    $db_sid="  	
  (DESCRIPTION =
    (ADDRESS = (PROTOCOL = TCP)(HOST = localhost)(PORT = 1521))
    (CONNECT_DATA =
      (SERVER = DEDICATED)
      (SERVICE_NAME = orcl.16.33.180)
    )
  )";
     $db_user = "hr"; 
     $db_pass = "hr";
     
      $con = oci_connect($db_user,$db_pass,$db_sid); 

//      $con = oci_connect('hr','hr','localhost/ORCL') ; //or die('connection failed !'); 
      if($con) 
      { 
       echo "Oracle Connection Successful.";
        
      } 
   else 
      { die('Could not connect to Oracle: '); 
      }
//
			$statement=" delete from person
			where personid='".$_POST['person']."'";

			$a4 = oci_parse($con, $statement); 

			$run4 = oci_execute($a4);
			if($run4)
			{echo "<br>Person record Deleted";}		 
			else
			{echo "<br>Person Error while Deleting ";}

//thir
			$statement3=" delete from employee
			where personid='".$_POST['person']."'";

			$a6 = oci_parse($con, $statement3); 

			$run6 = oci_execute($a6);
			if($run6)
			{
			echo "<br>Product record Deleted";}		 
			else
			{
			echo "<br>Product Error while Deleting ";}
//commit 
     $query5=" commit";

     $a5 = oci_parse($con, $query5); 

     $run5 = oci_execute($a5);
 if($run5)
{
echo "<br>Commited";}		 
else
{
echo "<br>not Commited";}
					
		oci_close($con);    
?>
<br>
<button type="button">
	   <a href="loginCopy.php" >Click to open ADMIN Page!</a>
	   </button>

  </body>
</html>