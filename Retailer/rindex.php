<?php 
session_start();

	include("rconnection.php");
	include("rfunctions.php");

	$user_data = check_login($con);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Retailer Homepage</title>
    <meta charset="viewport" content="width=device-width,initial-scale=1.0"/>
    <link rel="stylesheet" type="text/css" href="rstyle.css" media="screen">
    <link rel="stylesheet" href="retailerlogin/all.css">
</head>
<body>
<header>
		<nav>
			<img src="http://localhost:8080/login/img/img.png" style="  border-radius:80% 80% 80% 80%;  width:150px;height:150px;"><h1 style="font-size: 50px;">UZHAGAM</h1>
			<ul>
				<li><a href="http://localhost:8080/login/homepage.html">Home</a></li>
				<li><a href="#sectioncontact">Contact us</a></li>
        <li><a href="rlogout.php">Log out</a></li><br><br>
			</ul>
		</nav>
	</header>   
<div class="wel">
    <br>
    Hello, <?php echo $user_data['user_name']; ?><br/>
    <p style="font-family:Berlin Sans FB Demi;font-size:20px;padding:25px;padding:20px;">By sourcing directly from farmers through our platform, you can guarantee the quality and freshness of your produce. Our platform enables you to browse a wide selection of products, connect with farmers, and make purchases with ease. With a transparent supply chain and direct access to farmers, you can offer your customers the best possible products while supporting local agriculture. Join us to revolutionize the way you source and sell fresh produce.</p>
</div>

<div class="base">
<ul>
      <li><a href="http://localhost:8080/login/retailerlogin/placeorder.php">Place order</a></li><br/><br/>
      <li><a href="http://localhost:8080/login/retailerlogin/orderhistory.php">Order history</a></li><br/><br/>
      <li><a href="http://localhost:8080/login/retailerlogin/salesreport.php">Monthly sales report</a></li><br/><br/>
      </ul>
</div>

<?php include("footer.php");?> 

</body>
</html>