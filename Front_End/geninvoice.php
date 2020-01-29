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

//      $con = oci_connect('hr','hr','localhost/ORCL') or die('connection failed !'); 
      if($con) 
      { 
       echo "Oracle Connection Successful.";
        
      } 
   else 
      { die('Could not connect to Oracle: '); 
      }
         
    //  $a=$_POST['add1'];
   //   $b=$_POST['add2'];
  //    $c=$_POST['add3'];
	  
     $query=" select distinct   i.*  
from  invoice i , product p , get g
where g.productid = p.productid ";
 
 $x = oci_parse($con, $query); 

     $run = oci_execute($x);
 if($run)
{
echo "record executed";
}		 
else
{
echo "<br>Error while execuing record ";
}
?>
<table bordercolor = "red" border="1" >
	<?php
	$row=oci_fetch_array($x, OCI_BOTH+OCI_RETURN_NULLS);
	$i=0;
	while( $i<4){?>    
	<tr> 
	<td><?php echo $row[$i];?></td>
	</tr>
	<?php
	$i+=1;
	} ?>
</table>

	<button type="button">
	   <a href="loginCopy.php" >Move to User Page!</a>
	   </button>
</body>
</html>

     