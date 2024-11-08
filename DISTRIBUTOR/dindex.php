<?php 
session_start();

	include("dconnection.php");
	include("dfunctions.php");

	$user_data = check_login($con);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Ditributor Homepage</title>
    <meta charset="viewport" content="width=device-width,initial-scale=1.0"/>
    <link rel="stylesheet" type="text/css" href="dstyle.css" media="screen">
    <link rel="stylesheet" href="css/all.css">
</head>
<body>
<header>
		<nav>
			<img src="http://localhost:8080/login/img/img.png" style="  border-radius:80% 80% 80% 80%;  width:150px;height:150px;"><h1 style="font-size: 50px;">UZHAGAM</h1>
			<ul>
				<li><a href="http://localhost:8080/login/homepage.html">Home</a></li>
				<li><a href="#sectioncontact">Contact us</a></li>
        <li><a href="dlogout.php">Log out</a></li><br><br>
			</ul>
		</nav>
	</header>   
<div class="wel">
    <br>
    Hello, <?php echo $user_data['user_name']; ?><br/>
    <p style="font-family:Berlin Sans FB Demi;font-size:20px;padding:25px;padding:20px;">As a distributor, you play a crucial role in bridging the gap between farmers and retailers. Our platform empowers you by providing a streamlined process to connect farmers with retailers directly. By leveraging our platform, you can optimize the supply chain, reduce wastage, and ensure that fresh produce reaches the market in a timely manner. We provide the tools and support you need to enhance the efficiency and profitability of your distribution operations.</p>
</div>

<div class="base">
<ul>
      <li><a href="http://localhost:8080/login/distributorlogin/availableorder.php">Available orders</a></li><br/><br/>
      <li><a href="http://localhost:8080/login/distributorlogin/undertakenorder.php">Undertaken orders</a></li><br/><br/>
      <li><a href="http://localhost:8080/login/distributorlogin/pendingdelivery.php">Pending delivery</a></li><br/><br/>
      </ul>
</div>

<?php include("footer.php");?> 

</body>
</html>