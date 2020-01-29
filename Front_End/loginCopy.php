<html>
 <head>
   <title>Login</title>
    <style type="text/css">
    td
    {
      padding:5px; 
     }
  </style>
 </head>
 <body>
   <h1 align="center">Customer Login Form</h1>

    <table align="center" >
     <form name="reg1" action="UserLoginCopy.php" method="post">
     
       
      <tr>
       <td><label>Customerid</label></td>
       <td><input type="text" name="custid" value=""></td> 
     </tr> 
	 
     <tr>
       <td><label>password</label></td>
       <td><input type="text" name="custPass" value=""></td> 
     </tr> 
	
	 <tr>
	 <td><input type="submit" name="search" value="search"></td>
     </tr>
	 
    </form> 
</table>
<br><br><br>

   <h1 align="center">Admin Login Form</h1>

    <table align="center" >
     <form name="reg2" action="adminlogin.php" method="post">
     
       
      <tr>
       <td><label>Employeeid</label></td>
       <td><input type="text" name="empid" value=""></td> 
     </tr> 
	 
     <tr>
       <td><label>password</label></td>
       <td><input type="text" name="empPass" value=""></td> 
     </tr>
	 
	 <tr>
	 <td><input type="submit" name="search" value="search"></td>
     </tr>
  
       
	 
    </form> 
	</table>
</body>
</html>


