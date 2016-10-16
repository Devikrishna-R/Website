<?php 
	$con = mysqli_connect("localhost","root","","resume");
	if(isset($_POST['signbtn']))
	{
		session_start();
		$username=$_POST["username"];
		$password=$_POST["password"];
		$password2=$_POST["password2"];
		$query3 = "SELECT * from login ";
		$result3 = mysqli_query($con,$query3);
		$flag = 0;
		while($row = mysqli_fetch_array($result3,MYSQL_ASSOC))
		{
			if($row["username"] == $username)
			{
				$flag = 1;
			}
		}
		if($flag == 1)
		{
				$message4="Username Already Exists!";
				echo "<script type='text/javascript'>alert('$message4');</script>";
		}
		else
		{
			if($password==$password2)
			{
				$query1 = "INSERT INTO login(username,password) VALUES('$username','$password')";
				mysqli_query($con,$query1);
				$query2 = "select id from login where username = '$username'";
				$result2 = mysqli_query($con,$query2);
				$row = mysqli_fetch_array($result2,MYSQL_ASSOC);
				$_SESSION["id"] = $row["id"];
				$val = $_SESSION["id"];
				header("location:create.php");	
			}
			else
			{
				$_SESSION['message'] = "Two passwords do not match";
				$message3="Two passwords do not match";
				echo "<script type='text/javascript'>alert('$message3');</script>";
			}
		}
			
	}	
 ?>
 <!DOCTYPE html>
<html>
<head>
	<title>SIGN UP</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
   <link rel="stylesheet" type="text/css" href="login.css">
   <link rel="stylesheet" type="text/css" href="main.css">
   <link rel="stylesheet" type="text/css" href="signup.css">
</head>
<body>
	<nav class="fixed-nav-bar">
		<div class="menu" id="menu">
			<a href="index.php" class="sitename">RESUME BUILDER</a>
			<ul class="menu-items">
				<li><a href="index.html">HOME</a></li>
				<li><a href="resumetips.html">RESUME TIPS</a></li>
				<li><a href="signup.php">SIGN UP</a></li>
			</ul>
			<a href="login.php" class="log-btn" >LOG IN</a>
		</div>
	</nav>
	<div class="login-content">
		<p>SIGN UP</p>
		<div class="login-form">
			<form method="post" action="signup.php">
				<input type="text" name="username" placeholder="Username" autocomplete="off" required>
				<input type="password" name="password" placeholder="Password" required>
				<input type="password" name="password2" placeholder="Confirm Password" required>
				<input type="checkbox" name="agree" required>
				<span class="agree" >I ACCEPT <a href="#">TERMS OF SERVICE</a> AND <a href="#">PRIVACY POLICY</a></span>
				<input type="submit" value="SIGN UP" name="signbtn">
			</form>
		</div>
	</div>
</body>
</html>