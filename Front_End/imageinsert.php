<html>
  <head><title>ImageInsert</title></head>
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

//      $con = oci_connect('hr','hr','localhost/ORCL') or die('connection failed !'); 
      if($con) 
      { 
       echo "Oracle Connection Successful.";
        
      } 
   else 
      { die('Could not connect to Oracle: '); 
      }
         
      $a=$_POST['add1'];
      $b=$_POST['add2'];
      $c=$_POST['add3'];
	  
     $query=" INSERT INTO image
 VALUES ('$a', '$b', '$c')";

     $x = oci_parse($con, $query); 

     $run = oci_execute($x);
 if($run)
{
echo "<br>record inserted";
}		 
else
{
echo "<br>Error while inserting record ";
}
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
<button type="button">
	   <a href="loginCopy.php" >Click to open ADMIN Page!</a>
	   </button>
	   
  </body>
</html>