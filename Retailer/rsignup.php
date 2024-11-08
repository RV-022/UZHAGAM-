<?php
session_start();

include("rconnection.php");
include("rfunctions.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];
    $location = $_POST['taluk']; // Assuming taluk is selected as location
    $shop_name = $_POST['shop_name'];
    $shop_loc = $_POST['shop_loc'];
    $shop_type = $_POST['shop_type'];

    if (!empty($user_name) && !empty($password) && !empty($location) && !empty($shop_name) && !empty($shop_loc) && !empty($shop_type)&& !is_numeric($user_name)) {

        //save to database
        $user_id = random_num(20);
        $query = "insert into retailerlogindb (user_id,user_name,password,location,shop_name,shop_loc,shop_type) values ('$user_id','$user_name','$password','$location','$shop_name','$shop_loc','$shop_type')";

        mysqli_query($con, $query);

        header("Location: rlogin.php");
        die;
    } else {
        echo '<script>alert("Please enter some valid information!")</script>';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Signup as retailer</title>
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
			</ul>
		</nav>
	</header>

<div id="box">

    <form method="post" id="signupForm" onsubmit="return validateForm()">
        <div style="font-size: 20px;margin: 10px;color: white;">Signup</div>
		NAME:
        <input id="text" type="text" name="user_name" placeholder="Name">
        <span id="nameError" class="error"></span><br>
		PASSWORD:
        <input id="text" type="password" name="password" placeholder="Password">
        <span id="passwordError" class="error"></span><br>
		LOCATION:<BR/>
        <select id="districtSelect" name="district" onchange="populateTaluks()">
            <option value="">Select District</option>
            <option value="coimbatore">Coimbatore</option>
            <option value="erode">Erode</option>
			<option value="dindigul">Dindigul</option>
			<option value="other">Other</option>
        </select>
        <span id="districtError" class="error"></span>

        <select id="talukSelect" name="taluk">
            <option value="">Select Taluk</option>
        </select>
        <span id="talukError" class="error"></span><br>
		<br/>
        SHOP NAME:
        <input id="text" type="text" name="shop_name" placeholder="Shop name">
        <span id="nameError" class="error"></span><br>
        SHOP LOCATION:
        <input id="text" type="text" name="shop_loc" placeholder="Shop location">
        <span id="nameError" class="error"></span><br>
        TYPE OF SHOP OWNED:
        <select id="shopType" name="shop_type">
                <option value="small_grocery">Grocery (Small Scale)</option>
                <option value="ac_grocery">Grocery (Air Conditioned)</option>
                <option value="street_vendor">Street Vendor</option>
        </select><br/><br/>
    
        <center><input id="button" type="submit" value="Signup"></center><br/>
		<center><a href="rlogin.php">Click to Login</a></center><br><br>
    </form>
</div>

<script>
    const taluksByDistrict = {
        coimbatore: ["Anaimalai","Annur","Coimbatore-North","Coimbatore-South","Kinathukadavu","Madukkarai","Mettupalayam","Perur","Pollachi","Sulur","Valparai"],
		erode: ["Erode","Modakkurichi","Kodumudi","Perundurai","Bhavani", "Anthiyur","Gobichettipalayam","Sathyamangalam","Thalavadi","Nambiyur"],
		dindigul: ["Athoor","Dindigul East", "Dindigul West", "Gujiliamparai", "Kodaikanal", "Natham", "Nilakkottai", "Oddanchatram", "Palani", "Vedasandur"]
    };

    function validateForm() {

        return true; // Return true if the form is valid, false otherwise
    }
    function populateTaluks() {
        const districtSelect = document.getElementById('districtSelect');
        const talukSelect = document.getElementById('talukSelect');

        // Clear existing taluk options
        talukSelect.innerHTML = '<option value="">Select Taluk</option>';

        // Populate taluks based on the selected district
        const selectedDistrict = districtSelect.value;
        if (selectedDistrict && taluksByDistrict[selectedDistrict]) {
            taluksByDistrict[selectedDistrict].forEach(taluk => {
                talukSelect.innerHTML += `<option value="${taluk}">${taluk}</option>`;
            });
        }
    }
</script>
<?php include("footer.php");?> 
</body>
</html>
