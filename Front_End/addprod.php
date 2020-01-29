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
      $f=$_POST['add6'];
      $g=$_POST['add7'];
      $h=$_POST['add8'];
	  $i=$_POST['add9'];
//first	  
$query1=" INSERT INTO product 
 VALUES ('$a','$b','$c','$d','$e','$f')";

     $a1 = oci_parse($con, $query1); 

     $run1 = oci_execute($a1);
	 
 if($run1)
{
echo "<br>Product record inserted";}		 
else
{
echo "<br>Product Error while inserting record ";}

//Second  
     $query2=" INSERT INTO productmodel 
 VALUES ('$a','$g')";

     $a2 = oci_parse($con, $query2); 

     $run2 = oci_execute($a2);
 if($run2)
{
echo "<br>ProductModel record inserted";}		 
else
{
echo "<br>ProductModel Error while inserting record ";}

//Third  
     $query3=" INSERT INTO producttype 
 VALUES ('$f','$h')";

     $a3 = oci_parse($con, $query3); 

     $run3 = oci_execute($a3);
 if($run3)
{
echo "<br>ProductType record inserted";}		 
else
{
echo "<br>ProductType Error while inserting record ";}
//fourth 
     $query5=" INSERT INTO keeps 
 VALUES ('$a','$i')";

     $a5 = oci_parse($con, $query5); 

     $run5 = oci_execute($a5);
 if($run5)
{
echo "<br>keep record inserted";}		 
else
{
echo "<br>keeps Error while inserting record ";}
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
	   <a href="loginCopy.php" >Click to open ADMIN Page!</a>
	   </button>

  </body>
</html>