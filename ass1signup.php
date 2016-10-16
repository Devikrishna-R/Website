<?php 
	$con = mysqli_connect("localhost","root","","shop eazy");
	if(isset($_POST['submit']))
	{
		session_start();
		$name=$_POST["customer"];
		$address=$_POST["address"];
		$mobile_number=$_POST["number"];
		$mobile_number1=$_POST["number1"];
		$email=$_POST["email"];
		$password=$_POST["password"];
		$password1=$_POST["passwordconfirm"];
		$query3 = "SELECT * from Login ";
		$result3 = mysqli_query($con,$query3);
		$flag = 0;
		//echo "<script type='text/javascript'>alert('$name');</script>";
		while($row = mysqli_fetch_array($result3,MYSQL_ASSOC))
		{
			if($row["email"] == $email)
			{
				$flag = 1;
			}
		}
		if($flag == 1)
		{
				$message4="Already Exists!";
				echo "<script type='text/javascript'>alert('$message4');</script>";
		}
		else
		{
			if($password==$password1)
			{
				$query1 = "INSERT INTO Login(name,address,mobile_number,email,password) VALUES('$name','$address','$mobile_number','$email','$password')";
									
				mysqli_query($con,$query1);
				$query2 = "select id from Login where email = '$email'";
				$result2 = mysqli_query($con,$query2);
				$row = mysqli_fetch_array($result2,MYSQL_ASSOC);
				$_SESSION["id"] = $row["id"];
				$val = $_SESSION["id"];
				header("location:ass1signup.php");	
			}
			else
			{
				$_SESSION['message'] = "Passwords do not match";
				$message3="Passwords do not match";
				echo "<script type='text/javascript'>alert('$message3');</script>";
			}
		}
			
	}	
 ?>





<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>
$(document).ready(function()
                     {
      $("#n3").hover(function()
                     {
          $("#s3").slideDown("slow") ;       
         });
		 });
</script>
<script type = "text/javascript">
          function displayNextImage() {
              x = (x === images.length - 1) ? 0 : x + 1;
              document.getElementById("img").src = images[x];
          }

          function displayPreviousImage() {
              x = (x <= 0) ? images.length - 1 : x - 1;
              document.getElementById("img").src = images[x];
          }

          function startTimer() {
              setInterval(displayNextImage, 3000);
          }

          var images = [], x = -1;
          images[0] = "fruits.jpg";
          images[1] = "veg.jpg";
          images[2] = "bakery.jpg";
		  
		  function searchfn()
{
 var val= document.getElementById("search").value;
 if(val == "fruits" || val == "FRUITS" || val == "Fruits")
 {
     window.location.href = 'fruits.php';
 }
 else if(val == "vegetables" || val == "VEGETABLES" || val == "Vegetables")
 {
     window.location.href = 'vegetables.php';
 }
 else if(val == "bakery" || val == "BAKERY" || val == "Bakery")
 {
     window.location.href = 'bakery.php';
 }
 else
 {
     window.alert("Not there in the inventory");
 }
}
      </script>
<style>
#main 
{
 width:100%; height: 20%;
 border-width: 5px;
 border-style: outset;
 background-color: rgb(100,200,123);
}
#t1
{
 borser-style: dashed;
 border-width: 5px;
 text-align:right;
}
#heading1
{
 font-style:italic;
 font-family: Comic Sans MS;
 font-size: 100px;
 color: green;
}
#search {
    width: 500px;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
    background-color: white;
    background-position: 10px 10px;
    background-repeat: no-repeat;
    padding: 12px 20px 12px 40px;
   
}

#search:focus {
    width: 100%;
}

#n3
{
 padding: 5px;
position: relative;
}
#s3
{
 padding: 15px;
display:none;
position: absolute;
}

a:link    {color:blue; background-color:transparent; text-decoration:none}
  a:hover   {color:grey; background-color:transparent; text-decoration:underline}
  
  #button2{
background-color:rgb(74, 178, 19  );
box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
}
</style>
</head>
<body style="background-color:grey;background-image: url('bg1.jpg');
    background-repeat: no-repeat;
    background-attachment: fixed; background-size:cover
">
<table id="main">
<tr>
<th id=heading1>
<img src="shopping-cart.png" style="width:100px; height:100px;">
SHOP EAZY
</th>
<th>          </th>
<th>
<table id="t1">
<tr>
<td style="color:rgb(124, 40, 134  );"> Delivery From : 9 am-7 pm </td>
</tr>
<tr>
<td style="color:rgb(124, 40, 134  );"> Contact: 1234-5678 </td>
</tr>
</table>
</th>
</tr>
<tr>
<td>
<form>
<input id="search" type="text" name="search" placeholder="Search..">
<button type="button" id="button2" onclick="searchfn()">Search</button>
</form>
</td>
<td><a href="ass1login.php">Login </a>
</td>
<td><a href="ass1signup.php">Signup</a></td>
</tr>
</table>
<table>
<tr>
<td width=25% style="color: rgb(211, 174, 185); position:absolute; left:5%; top:40%;font-family:Lucida Sans Unicode;">
<div id=n3  style="color:purple;"><b>Categories</b><br></div>
<div id=s3>
<ul>
<li><a href="fruits.php">Fruits</a></li>
<li><a href="vegetables.php">Vegetables</a></li>
<li><a href="bakery.php">Bakery</a></li>
</ul>
</div>
</td>
<td width=50%>
<table width=100% style="background-color:white; border:ridge; padding:5px;">
<tr>
<th> Sign Up </th>
</tr>
<tr>
<td>     </td>
<td>
<form style="text-align:left; " method="post" action="ass1signup.php">
Your name*:
<input type="text" name="customer" style="box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    font-size: 16px;">
<br>
<br>
Address*:
<input type="text" name="address" style="box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    font-size: 16px;">
<br>
<br>
Mobile Number*:
<input type="text" name="number" style="box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    font-size: 16px;">
<br>
<br>
Confirm Mobile Number:
<input type="text" name="number1" style="box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    font-size: 16px;">
<br>
<br>
Email*:
<input type="text" name="email" style="box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    font-size: 16px;">
<br>
<br>
Password*:
<input type="password" name="password" style="box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    font-size: 16px;">
<br>
<br>
Confirm your Password:
<input type="password" name="passwordconfirm" style="box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    font-size: 16px;">
<br>
<br>
<input type="submit" style="border-radius: 4px;" name="submit">
</form>
</td>
<tr>
</table>
 </td>
<td width=25%>
<form style="position:absolute; right:2%; top:34%;"action="www.google.com" style="color:rgb(240, 10, 10);">
<p style="color:rgb(214, 164, 157  ); font-family:Lucida Sans Unicode; font-size:100%;"><b>My Cart</b></p>
Number of Items:
<input type="text" id="noitems" name="noofitems" value=0><br>
<a href="checkout.php" style="color:rgb(2, 115, 6  ); ">Checkout</a>
<br>
</form>
</td>
</tr>
</body>
</html>