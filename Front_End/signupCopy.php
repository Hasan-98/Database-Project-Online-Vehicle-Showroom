<html>
 <head>
   <title>SignUp</title>
    <style type="text/css">
    td
    {
      padding:5px; 
     }
  </style>
 </head>
 <body>
   <h1 align="center">SignUp Form</h1>

    <table align="center" >
     <form name="reg" action="pinsert2Copy.php" method="post">
     
      <tr>
       <td><label>Customer Id</label></td>
       <td><input type="text" name="add1" value=""></td> 
     </tr> 

	 <tr>
       <td><label>Name</label></td>
       <td><input type="text" name="add2" value=""></td> 
     </tr> 

	 <tr>
       <td><label>password</label></td>
       <td><input type="text" name="add3" value=""></td> 
     </tr> 

	 <tr>
       <td><label>PhoneNumber</label></td>
       <td><input type="text" name="add4" value=""></td> 
     </tr> 

	 <tr>
       <td><label>Address</label></td>
       <td><input type="text" name="add5" value=""></td> 
     </tr> <br>
	      
	 <tr>
       <td><label>Email</label></td>
       <td><input type="text" name="add6" value=""></td> 
     </tr> 

	 <tr>
       <td><label>Gender</label></td>
       <td>
	    <input type="radio" name="add7" value="M">M
		<input type="radio" name="add7" value="F" >F
		<input type="radio" name="add7" value="O" >Other
	   </td> 
     </tr> <br>
	 
     <tr>
	 <td></td> 
       <td><input type="submit"></td>
     </tr> 
	 
    </form> 
 </body>
</html>