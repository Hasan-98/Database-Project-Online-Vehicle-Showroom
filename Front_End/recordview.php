<html>
  <head><title>recordview</title></head>
  <body><br><br><br>

  <h1 align='center'>Record View</h1> 
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
         	  
$query2=" select distinct s.* ,p.* 
from product p,showroom s,contain c
where c.productid =p.productid and c.showroomid = s.showroomid";

     $x2 = oci_parse($con, $query2); 
     $run2 = oci_execute($x2);
 if($run2)
{
echo "record executed";
}		 
else
{
echo "<br>Error while execuing record ";
}
?>
<h2>General data!</h2>
<table bordercolor = "red" border="1" >
	<?php ;
	while( $row=oci_fetch_array($x2, OCI_BOTH)){?>    
	<tr> 
	<td><?php echo $row['SHOWROOMID'];?></td>
	<td><?php echo $row['SHOWROOMNAME'];?></td>
	<td><?php echo $row['SADDRESS'];?> 	</td>
	<td><?php echo $row['CONTACTNO'];?> 	</td>
	
	<td><?php echo $row['PRODUCTID'];?> 	</td>
	<td><?php echo $row['PRODUCTNAME'];?> 	</td>
	<td><?php echo $row['PRODUCTDESCRIPTION'];?> 	</td>
	<td><?php echo $row['MANUFACTURERID'];?> 	</td>
	<td><?php echo $row['ASSEMBLINGID'];?> 	</td>
	<td><?php echo $row['PRODUCTTYPE'];?> 	</td>
</tr>
	<?php
	} ?>
</table>

<?php
     $query=" Select * from orders";
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
<h2>ORDERS Record</h2>
<table bordercolor = "red" border="1" >
	<?php ;
	while( $row=oci_fetch_array($x, OCI_BOTH)){?>    
	<tr> 
	<td><?php echo $row['PERSONID'];?></td>
	<td><?php echo $row['PRODUCTID'];?></td>
	</tr>
	<?php
	} ?>
</table>

<?php
     $query3=" Select * from sale";
     $x3 = oci_parse($con, $query3); 
     $run3 = oci_execute($x3);
 if($run3)
{
echo "record executed";
}		 
else
{
echo "<br>Error while execuing record ";
}
?>
<h2>Sales Record</h2>
<table bordercolor = "red" border="1" >
	<?php ;
	while( $row=oci_fetch_array($x3, OCI_BOTH)){?>    
	<tr> 
	<td><?php echo $row['SALEID'];?></td>
	<td><?php echo $row['ORDERDATE'];?></td>
	<td><?php echo $row['DELIVERDATE'];?></td>
	</tr>
	<?php
	} ?>
</table>
	<button type="button">
	   <a href="loginCopy.php" >Move to admin Page!</a>
	   </button>
</body>
</html>

     