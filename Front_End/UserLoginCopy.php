 <html>
 <head>
 <link rel = "stylesheet"
	type = "text/css"
	href = "color.css" />
	
</head>
<body>
<?php
$userpass=$_POST['custPass'];
$userid=$_POST['custid'];

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
         
     $query=" Select CPASSWORD from customer where PERSONID='$userid' ";
      $x = oci_parse($con, $query); 
     $run = oci_execute($x);
	 $row=oci_fetch_array($x, OCI_BOTH);
	 $check=$row[0];
 if($check==$userpass)
{
echo "ACCESS Granted";


?>
	<header>
		<div class = "logo">
			<img src = "logo1.jpg">
		</div>
		<div class = "main">
			<ul>
			<li><a href = "#C1">Order</a></li>
			<li><a href = "imageview.php">View</a></li>
			<li><a href = "#C3">Feedback</a></li>
			</ul>
		</div>
		<div class = "third">
<h2>Customer Login In!</h2>
<p>Customers can View Products ,Order product and can give us constructive feedback:</p>
		</div>
	</header>
	
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>	
<!--<h2 id="C2">Image Form</h2>

<p> Please Fill out the fields below <br></p>
     <form name="reg" action="imageview.php" method="post">
     
      <tr>
       <td><label>Image ID</label></td>
       <td><input type="text" name="add1" value=""></td> 
     </tr> <br>
	 
     <tr>
       <td><label>Image name</label></td>
       <td><input type="text" name="add2" value=""></td> 
     </tr> 	 <br>

     <tr>
       <td><label>Image path</label></td>
       <td><input type="text" name="add3" value=""></td> 
     </tr> 	 <br>
	 
     <tr>
       <td><input type="submit" name="search" value="search"></td>
     </tr> 
	 
    </form>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>-->
<h2 id="C3">Feedback Form:</h2>
     <form name="reg" action="feedbackinsert.php" method="post">
     	 
     <tr>
    <td><label> Enter Feedback ID</label></td>
	<td><input  type="text" name="add1"></td>
	</tr> <br>

	<tr>
    <td><label> Enter Subject</label></td>
	<td><input  type="text" name="add2"></td>
	</tr> <br>

	<tr>
    <td><label> Enter detail</label></td>
	<td><input  type="text" name="add3"></td>
	</tr> <br>

<tr>	
	<input type="submit" name="search" value="search">
</tr> 
    </form>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>	
	
<h2 id="C1">Order Form</h2>
<p> Please Fill out the fields below <br></p>
     <form name="reg" action="orderinsert.php" method="post">
     
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
	 
    </form>
<?php
}		 
else
{
echo "Wrong ID or Password ,<br>";?>
	<button type="button">
	   <a href="UserLoginCopy.php" >Try Another Login(Go Back)!</a>
	   </button>
<?php
}
?>

   </body>
 <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
</html> 