<?php
	session_start();
	$con = mysqli_connect("localhost","root","","shop eazy");
	if(isset($_POST['apples_add']))
	{
		$item=$_POST["apples"];
		$price=$_POST["apples_price"];
		$id=$_SESSION["id"];
		$query1 = "INSERT INTO Cart(id,item_name,price) VALUES('$id','$item','$price')";
		mysqli_query($con,$query1);
		header("location:fruits.php");
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
            $("#s3").slideDown("slow");
        });
    });
    </script>
    <script type="text/javascript">
    function displayNextImage()
    {
        x = (x === images.length - 1) ? 0 : x + 1;
        document.getElementById("img").src = images[x];
    }

    function displayPreviousImage()
    {
        x = (x <= 0) ? images.length - 1 : x - 1;
        document.getElementById("img").src = images[x];
    }

    function startTimer()
    {
        setInterval(displayNextImage, 3000);
    }
    var images = [],
        x = -1;
    images[0] = "fruits.jpg";
    images[1] = "veg.jpg";
    images[2] = "bakery.jpg";

    function myfunct()
    {
        var value = parseInt(document.getElementById('noitems').value,
            10);
        value = isNaN(value) ? 0 : value;
        value++;
        document.getElementById('noitems').value = value;
    }

    function searchfn()
    {
        var val = document.getElementById("search").value;
        if (val == "fruits" || val == "FRUITS" || val == "Fruits")
        {
            window.location.href = 'fruits.php';
        }
        else if (val == "vegetables" || val == "VEGETABLES" || val == "Vegetables")
        {
            window.location.href = 'vegetables.php';
        }
        else if (val == "bakery" || val == "BAKERY" || val == "Bakery")
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
    #main {
        width: 100%;
        height: 20%;
        border-width: 5px;
        border-style: outset;
        background-color: rgb(100, 200, 123);
        border-radius: 20px;
    }
    #t1 {
        border-style: dashed;
        border-width: 5px;
        text-align: right;
    }
    #heading1 {
        font-style: italic;
        font-family: Comic Sans MS;
        font-size: 100px;
        color: green;
        text-shadow: 2px 2px 2px black, 0 0 25px green, 0 0 5px black;
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
    #n3 {
        padding: 5px;
        position: relative;
    }
    #s3 {
        padding: 15px;
        display: none;
        position: absolute;
    }
    #search:focus {
        width: 100%;
    }
    #button1 {
        background-color: rgb(74, 178, 19);
        box-sizing: border-box;
        border: 2px solid #ccc;
        border-radius: 4px;
    }
    #button2 {
        background-color: rgb(74, 178, 19);
        box-sizing: border-box;
        border: 2px solid #ccc;
        border-radius: 4px;
    }
    a:link {
        color: red;
        background-color: transparent;
        text-decoration: none
    }
    a:hover {
        color: grey;
        background-color: transparent;
        text-decoration: underline
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
                <img src="shopping-cart.png" style="width:100px; height:100px;"> SHOP EAZY
            </th>
            <th> </th>
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
            <td><a href="ass1signup.php">Signup</a>
            </td>
        </tr>
    </table>
    <table>
        <tr>
            <td width=25% style="color: rgb(211, 174, 185); position:absolute; left:5%; top:40%;font-family:Lucida Sans Unicode;">
                <div id=n3 style="color:purple;"><b>Categories</b>
                    <br>
                </div>
                <div id=s3>
                    <ul>
                        <li><a href="fruits.php">Fruits</a>
                        </li>
                        <li><a href="vegetables.php">Vegetables</a>
                        </li>
                        <li><a href="bakery.php">Bakery</a>
                        </li>
                    </ul>
                </div>
            </td>
            <td width=50%>
                <table style="background-color:white; padding:10px; border: solid; border-collapse: separate;
    border-spacing: 10px;">
                    <tr>
                        <td> <img src="apples.jpg" style="width:200px; height:150px;">
                            <br>
                            <form method="post" action="fruits.php">
                                APPLES (kg)
                                <input type="text" name="apples" value=1 style="box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    font-size: 16px;">
                                <br> Price
                                <input type="text" name="apples_price" value=150 style="box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    font-size: 16px;">
                                <br>
                                <br>
                                <button type="submit" name="apples_add" id="button1" onclick="myfunct()">Add</button>
                            </form>
                        </td>
                        <td> <img src="mangoes.jpg" style="width:200px; height:150px;">
                            <br>
                            <form method="post" action="fruits.php">
                                MANGOES (kg)
                                <input type="text" name="mangoes" value=1 style="box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    font-size: 16px;">
                                <br> Price
                                <input type="text" name="mangoes_price" value=100 style="box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    font-size: 16px;">
                                <br>
                                <br>
                                <button type="button" name="mangoes_add" id="button1" onclick="myfunct()">Add</button>
                            </form>
                        </td>
                        <td> <img src="jackfruit.jpg" style="width:200px; height:150px;">
                            <br>
                            <form method="post" action="fruits.php">
                                JACKFRUIT
                                <input type="text" name="jackfruit" value=1 style="box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    font-size: 16px;">
                                <br> Price
                                <input type="text" name="jackfruit_price" value=70 style="box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    font-size: 16px;">
                                <br>
                                <br>
                                <button type="button" name="jackfruit_add" id="button1" onclick="myfunct()">Add</button>
                            </form>
                        </td>
                    </tr>
                    <tr>
                        <td> <img src="orange.jpg" style="width:200px; height:150px;">
                            <br>
                            <form method="post" action="fruits.php">
                                ORANGE (kg)
                                <input type="text" name="orange" value=1 style="box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    font-size: 16px;">
                                <br> Price
                                <input type="text" name="orange_price" value=80 style="box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    font-size: 16px;">
                                <br>
                                <br>
                                <button type="button" name="orange_add" id="button1" onclick="myfunct()">Add</button>
                            </form>
                        </td>
                        <td> <img src="banana.jpg" style="width:200px; height:150px;">
                            <br>
                            <form method="post" action="fruits.php">
                                BANANA (kg)
                                <input type="text" name="banana" value=1 style="box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    font-size: 16px;">
                                <br> Price
                                <input type="text" name="banana_price" value=30 style="box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    font-size: 16px;">
                                <br>
                                <br>
                                <button type="button" name="banana_add" id="button1" onclick="myfunct()">Add</button>
                            </form>
                        </td>
                        <td> <img src="watermelon.jpg" style="width:200px; height:150px;">
                            <br>
                            <form method="post" action="fruits.php">
                                WATERMELON
                                <input type="text" name="watermelon" value=1 style="box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    font-size: 16px;">
                                <br> Price
                                <input type="text" name="watermelon_price" value=70 style="box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    font-size: 16px;">
                                <br>
                                <br>
                                <button type="button" name="watermelon_add" id="button1" onclick="myfunct()">Add</button>
                            </form>
                        </td>
                    </tr>
                </table>
            </td>
            <td width=25%>
                <form style="position:absolute; right:2%; top:34%;" action="checkout.php" style="color:rgb(240, 10, 10);">
                    <p style="color:rgb(214, 164, 157  ); font-family:Lucida Sans Unicode; font-size:100%;"><b>My Cart</b>
                    </p>
                    Number of Items:
                    <input id="noitems" type="text" name="noofitems" value=0>
                    <br>
                    <a href="checkout.php" style="color:rgb(2, 115, 6  ); font-family:Tahoma; "><b>Checkout</b></a>
                    <br>
                </form>
            </td>
        </tr>
</body>

</html>
