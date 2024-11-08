<?php 

session_start();

	include("dconnection.php");
	include("dfunctions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//read from database
			$query = "select * from distributorlogindb where user_name = '$user_name' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: dindex.php");
						die;
					}
				}
			}
			
			echo '<script>alert("wrong username or password!")</script>';
		}else
		{
			echo '<script>alert("wrong username or password!")</script>';
		}
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Distributor Login</title>
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
			</ul>
		</nav>
	</header>

	<div id="box">
		
		<form method="post">
			<div style="font-size: 20px;margin: 10px;color: white;"><center>Distributor Login</center></div>

			<input id="text" type="text" name="user_name" placeholder="Name"><br><br>
			<input id="text" type="password" name="password" placeholder="Password"><br><br>
			<center>
			<input id="button" type="submit" value="Login"></center><br>
			<center>
			<a href="dsignup.php">Click to Signup</a></center><br><br>
		</form>
	</div>

	<?php include("footer.php");?> 
</body>
</html>