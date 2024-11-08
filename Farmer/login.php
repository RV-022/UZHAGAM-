<?php 

session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//read from database
			$query = "select * from farmerlogindb where user_name = '$user_name' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: index.php");
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
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="fstyle.css">
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
			<div style="font-size: 20px;margin: 10px;color: white;"><center>Farmer Login</center></div>

			<input id="text" type="text" name="user_name" placeholder="Name"><br><br>
			<input id="text" type="password" name="password" placeholder="Password"><br><br>
		<center>
			<input id="button" type="submit" value="Login" style="background-color: rgb(30, 80, 96);"><br><br>
</center>
			<center><a href="signup.php">Click to Signup</a></center><br><br>
		</form>
	</div>

	<!--===========Footer=================-->
	<div class="footer">
      		 <div class="links">
                <h3><u>Quick Links</u></h3>
                <ul>
                    <li><a href="#sectionabout">About</a></li>
                    <li><a href="#sectionservices">Services</a></li>
                    <li><a href="#sectionrole">Role of the user</a></li>
                </ul>
            </div>
            <div class="links">
                <h3><u>Contact us</u></h3>
                <ul>
                    <li>Customer Support</li>
                    <li>Service Guarantee</li>
                    <li>Feedback</li>
                </ul>
            </div>
            <div class="links">
                <h3><u>Support</u></h3>
                <ul>
                    <li>Frequently Asked Questions</li>
                    <li>Terms & Conditions</li>
                    <li>Privacy Policy</li>
                </ul>
            </div>
		</div>
    
	<footer>
		<p>&copy; 2024 Uzhagam - A Farmer Support Company </p>
	</footer>
</body>
</html>