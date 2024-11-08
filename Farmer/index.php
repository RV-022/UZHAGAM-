<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Farmer Homepage</title>
    <meta charset="viewport" content="width=device-width,initial-scale=1.0"/>
    <link rel="stylesheet" type="text/css" href="fstyle.css" media="screen">
    <link rel="stylesheet" href="css/all.css">
</head>
<body>
<header>
		<nav>
			<img src="http://localhost:8080/login/img/img.png" style="  border-radius:80% 80% 80% 80%;  width:150px;height:150px;"><h1 style="font-size: 50px;">UZHAGAM</h1>
			<ul>
				<li><a href="http://localhost:8080/login/homepage.html">Home</a></li>
				<li><a href="#sectioncontact">Contact us</a></li>
        <li><a href="logout.php">Log out</a></li><br><br>
			</ul>
		</nav>
	</header>   
<div class="wel">
    <br>
    Hello, <?php echo $user_data['user_name']; ?><br/>
    <p style="font-family:Berlin Sans FB Demi;font-size:20px;padding:25px;">Our vision is to revolutionize the agricultural supply chain by empowering farmers and retailers to connect directly, eliminating middlemen and ensuring fair prices for farmers. We aim to create a sustainable and transparent marketplace that benefits both farmers and retailers, ultimately improving access to fresh produce for consumers and supporting local agriculture.</p>
</div>

<div class="base">
<ul>
      <li><a href="http://localhost:8080/login/farmerlogin/predanalysis.php">Predictive analysis</a></li><br/><br/>
      <li><a href="http://localhost:8080/login/farmerlogin/addproduct.php">Post your product</a></li><br/><br/>
      <li><a href="http://localhost:8080/login/farmerlogin/viewproduct.php">Order History</a></li><br/><br/>
      </ul>
</div>

<?php include("footer.php");?> 

</body>
</html>
