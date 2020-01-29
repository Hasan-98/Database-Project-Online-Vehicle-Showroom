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
	  
     $query=" INSERT INTO feedback
 VALUES ('$a', '$b', '$c')";

     $x = oci_parse($con, $query); 

     $run = oci_execute($x);
 if($run)
{
echo "record inserted";
}		 
else
{
echo "<br>Error while inserting record ";
}
?>
<a href="ploginCopy.php" target="_blank">Move To Home Page</a>

                  
  </body>
</html>