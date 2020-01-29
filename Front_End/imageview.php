<html>
  <head><title>imageview</title></head>
  <body><br><br><br>

    <h1 align='center'>Customer View</h1> 

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
<h2>General View!</h2>
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
     $query=" Select imageid,imagename,imagepath from image";
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
<h2>Images of products!</h2>
<table bordercolor = "red" border="1" >
	<?php ;
	while( $row=oci_fetch_array($x, OCI_BOTH)){?>    
	<tr> 
	<td><?php echo $row['IMAGEID'];?></td>
	<td><?php echo $row['IMAGENAME'];?></td>
	<td><img src=<?php echo $row['IMAGEPATH'];?> 
	alt="W3Schools.com" style="width:100px;height:100px;" >
	</td>
	</tr>
	<?php
	} ?>
</table>

     <form name="reg" action="orderinsert.php" method="post">
       <fieldset>
    <legend><h2>Order Here!</h2></legend>
	 <tr>
       <td><label>Your Id</label></td>
       <td><input type="text" name="add1" value=""></td> 
     </tr> <br>
	 
	 <tr>
       <td><label>Product Id (You want to book!)</label></td>
       <td><input type="text" name="add2" value=""></td> 
     </tr> <br>
     
	 <tr>
	 <td></td> 
       <td><input type="submit"></td>
     </tr> 
	 </fieldset>
    </form>

	<button type="button">
	   <a href="loginCopy.php" >Move to User Page!</a>
	   </button>
</body>
</html>

     