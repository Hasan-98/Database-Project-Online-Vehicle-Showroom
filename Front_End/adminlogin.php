 <html>
 <head>
 <link rel = "stylesheet"
	type = "text/css"
	href = "color.css" />
	
</head>
<body>
<?php
$adminpass=$_POST['empPass'];
$adminid=$_POST['empid'];

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
         
     $query=" Select APASSWORD from administrator where PERSONID='$adminid' ";
      $x = oci_parse($con, $query); 
     $run = oci_execute($x);
	 $row=oci_fetch_array($x, OCI_BOTH);
	 $check=$row[0];
 if($check==$adminpass)
{
echo "Admin ACCESS Granted";


?>

	<header>
		<div class = "logo">
			<img src = "logo1.jpg">
		</div>
		<div class = "main">
			<ul>
			<li><a href = "#C1">Add Product</a></li>
			<li><a href = "#C2">Remove Product</a></li>
			<li><a href = "#C3">Add Employee</a></li>
			<li><a href = "#C4">Remove Employee</a></li>
			<li><a href = "#C5">Add Images</a></li>
			<li><a href = "recordview.php">See Record</a></li>
			</ul>
		</div>
		<div class = "fourth">
<h2>Administrator Login !</h2>
<h3>Administrator can add/delete Products ,add/delete Employees!</h3>
		</div>
	</header>
	
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>	

			<h2 id="C2">Delete product Form:</h2>
			<form name="reg" action="delprod.php" method="post">  <!-- -->
     	 
			<tr>
			<td><label>Product Id(i.e P1,P2)</label></td>
			<td><input type="text" name="prod" value=""></td> 
			</tr> <br>
			<tr>
			<td><label>Product type</label></td>
			<td><input type="text" name="prodT" value=""></td> 
			</tr> <br>

			<tr>	
			<input type="submit" name="del" value="del">
			</tr> 
			
			</form>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>			

<h2 id="C1">Product Form</h2>
<p> Please Fill out the fields below <br></p>
     <form name="reg" action="addprod.php" method="post">
     
      <tr>
       <td><label>Product ID(i.e P1,P2)</label></td>
       <td><input type="text" name="add1" value=""></td> 
     </tr> <br>
	 
     <tr>
       <td><label>Product name</label></td>
       <td><input type="text" name="add2" value=""></td> 
     </tr> 	 <br>

     <tr>
       <td><label>Product Description</label></td>
       <td><input type="text" name="add3" value=""></td> 
     </tr> 	 <br>
     <tr>
       <td><label>Manufacturing</label></td>
       <td><input type="text" name="add4" value=""></td> 
     </tr> 	 <br>
     <tr>
       <td><label>Assembling</label></td>
       <td><input type="text" name="add5" value=""></td> 
     </tr> 	 <br>	 
	 
     <tr>  <td><label>Product Type</label></td>
          <td><input type="text" name="add6" value=""></td> 
     </tr> 	 <br>

     <tr>  <td><label>Product Model</label></td>
          <td><input type="text" name="add7" value=""></td> 
     </tr> 	 <br>

	 <tr>  <td><label>Product Price</label></td>
          <td><input type="text" name="add8" value=""></td> 
     </tr> 	 <br>
      <tr>
       <td><label>Image ID(i.e I1,I2)</label></td>
       <td><input type="text" name="add9" value=""></td> 
     </tr> <br>

     <tr>
       <td><input type="submit" name="search" value="search"></td>
     </tr> 
	 
    </form>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>	
<h2 id="C3">Employee Form:</h2>
     <form name="reg" action="addemp.php" method="post">
     	 
      <tr>
       <td><label>Employee Id</label></td>
       <td><input type="text" name="add1" value=""></td> 
     </tr> <br>

	 <tr>
       <td><label>Name</label></td>
       <td><input type="text" name="add2" value=""></td> 
     </tr> <br>

	 <tr>
       <td><label>Address</label></td>
       <td><input type="text" name="add3" value=""></td> 
     </tr> <br>

	 <tr>
       <td><label>PhoneNumber</label></td>
       <td><input type="text" name="add4" value=""></td> 
     </tr> <br>

	 <tr>
       <td><label>Manager ID</label></td>
       <td><input type="text" name="add5" value=""></td> 
     </tr> <br>
<tr>	
	<input type="submit" name="Add" value="Add">
</tr> 
    </form>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

			<h2 id="C4" > Employee Delete Form:</h2>
			<form name="reg" action="delemp.php" method="post">
     	 
			<tr>
			<td><label>Employee Id(i.e 1,2)</label></td>
			<td><input type="text" name="person" value=""></td> 
			</tr> <br>

			<tr>	
			<input type="submit" name="del" value="del">
			</tr> 
			
			</form>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

			<h2 id="C5" > Image Form:</h2>
			<form name="reg" action="imageinsert.php" method="post">
     	 
			<tr>
			<td><label>Image Id(i.e I1,I2)</label></td>
			<td><input type="text" name="add1" value=""></td> 
			</tr> <br>

			<tr>
			<td><label>Image Name</label></td>
			<td><input type="text" name="add2" value=""></td> 
			</tr> <br>
			
			<tr>
			<td><label>Image Path</label></td>
			<td><input type="text" name="add3" value=""></td> 
			</tr> <br>

			<tr>	
			<input type="submit" name="submit" value="submit">
			</tr> 
			
			</form>
<?php
}		 
else
{
echo "Wrong ID or Password ,<br>";?>
	<button type="button">
	   <a href="adminlogin.php" >Try Another Login(Go Back)!</a>
	   </button>
<?php
}
?>
	
</body>
 <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
</html> 