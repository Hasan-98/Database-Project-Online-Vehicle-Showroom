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
         
      $a=$_POST['add1'];
      $b=$_POST['add2'];
      $c=$_POST['add3'];
      $d=$_POST['add4'];
      $e=$_POST['add5'];
//first	  
$query2=" INSERT INTO person 
 VALUES ('$a','$b','$e','$d')";

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
     $query=" INSERT INTO customer 
 VALUES ('$a','$c')";

     $a = oci_parse($con, $query); 

     $run = oci_execute($a);
 if($run)
{
echo "Customer record inserted";
}		 
else
{
echo "<br>Customer Error while inserting record ";
}

//}                  
?>
<br>
<button type="button">
	   <a href="loginCopy.php" >Click to open User Page!</a>
	   </button>

  </body>
</html>