<?php 

	session_start();
	$con = mysqli_connect("localhost","root","","shop eazy");
	if(isset($_POST['login']))
	{	
			$email=$_POST["email"];
			$password=$_POST["password"];
			$query = "Select * from Login where email='$email' and password='$password'";
			$result = mysqli_query($con,$query) or die("failed to query,error ".mysqli_error($con));
			if (mysqli_num_rows($result) == 1) 
			{
				$query2 = "select id from Login where email = '$email'";
				$result2 = mysqli_query($con,$query2);
				$row = mysqli_fetch_array($result2,MYSQL_ASSOC);
				$_SESSION["id"] = $row["id"];
				$var=$_SESSION["id"];
				$query3 = "insert into Cart(id) values('$var')"; 
				$result3 = mysqli_query($con,$query3);
				//echo "<script type='text/javascript'>windows.alert('hai');</script>";
				header("location:ass1.php");
			}
			else
			{
				$_SESSION['message'] = "You have'nt logged in";
				$message2="Wronng email or password";
				echo "<script type='text/javascript'>alert('$message2');</script>";
			}
	}
 ?>



<!DOCTYPE html>
<html>
<head>
 <style>
 body{ text-align:center;
 background-color:white; }
  h1{ color:green; font-size:200%}
 </style>
 </head>
<body style="background-color:grey;background-image: url('bg1.jpg');
    background-repeat: no-repeat;
    background-attachment: fixed; background-size:cover
">
<h1>
LOGIN
</h1>
 <form align='center' action="ass1login.php" method="post">	
 <br>
  <p style="color:black; font-size:100%;">Email :<br></p>  
<input type=text name='email'> 
<br> 
  <p style="color:black; font-size:100%;">Password :<br></p>
 <input type=password name='password'>
 <br>
 <br>
 <input type=submit style="border-radius: 4px;" name="login" value=Submit>
 <br>
 </form>
</body> 
 </html>