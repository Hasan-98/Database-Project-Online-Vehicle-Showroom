<html>
  <head><title>Employee</title></head>
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
         
      $a=$_POST['add1'];
      $b=$_POST['add2'];
      $c=$_POST['add3'];
      $d=$_POST['add4'];
      $e=$_POST['add5'];
//first	  
$query2=" INSERT INTO person 
 VALUES ('$a','$b','$c','$d')";

     $a2 = oci_parse($con, $query2); 

     $run2 = oci_execute($a2);
 if($run2)
{
echo "Person record inserted";
}		 
else
{
echo "<br>Person Error while inserting record ";
}
//Second  
     $query=" INSERT INTO  employee
 VALUES ('$a','$e')";

     $a = oci_parse($con, $query); 

     $run = oci_execute($a);
 if($run)
{
echo "Employee record inserted";
}		 
else
{
echo "<br>Employee Error while inserting record ";
}
//commit 
     $query4=" commit";

     $a4 = oci_parse($con, $query4); 

     $run4 = oci_execute($a4);
 if($run4)
{
echo "<br>Commited";}		 
else
{
echo "<br>not Commited";}

	oci_close($con);                                
?>
<br>
<button type="button">
	   <a href="loginCopy.php" >Click to open Admin Page!</a>
	   </button>

  </body>
</html>