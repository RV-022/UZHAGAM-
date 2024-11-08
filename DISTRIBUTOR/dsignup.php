<?php
session_start();

include("dconnection.php");
include("dfunctions.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];
    $location = $_POST['taluk']; 
    $vehicle_owned= isset($_POST['vehicle_options']) ? implode(",", $_POST['vehicle_options']) : "";

    if (!empty($user_name) && !empty($password) && !empty($location) && !empty($vehicle_owned) && !is_numeric($user_name)) {
        $user_id = random_num(20);
        $query = "insert into distributorlogindb (user_id,user_name,password,location,vehicle_owned) values ('$user_id','$user_name','$password','$location','$vehicle_owned')";

        mysqli_query($con, $query);

        header("Location: dlogin.php");
        die;
    } else {
        echo '<script>alert("Please enter some valid information!")</script>';
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Distributor Signup</title>
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

    <form method="post" id="signupForm" onsubmit="return validateForm()">
        <div style="font-size: 20px;margin: 10px;color: white;">Signup as Distributor</div>
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
        <label for="vehicleCheckbox">CURRENTLY OWNED VEHICLE:</label>
        
        <div id="vehicleOptions" class="checkboxes">
            <label><input type="checkbox" name="vehicle_options[]" value="twowh"> 2-Wheeler</label>
			<label><input type="checkbox" name="vehicle_options[]" value="threewh"> 3-Wheeler</label>
            <label><input type="checkbox" name="vehicle_options[]" value="fourwh"> 4-Wheeler</label>
        </div>
	<center>
        <input id="button" type="submit" value="Signup"></center>
		<center><a href="dlogin.php">Click to Login</a><br><br></center>
    </form>
</div>

<script>
    const taluksByDistrict = {
        coimbatore: ["Anaimalai","Annur","Coimbatore-North","Coimbatore-South","Kinathukadavu","Madukkarai","Mettupalayam","Perur","Pollachi","Sulur","Valparai"],
		erode: ["Erode","Modakkurichi","Kodumudi","Perundurai","Bhavani", "Anthiyur","Gobichettipalayam","Sathyamangalam","Thalavadi","Nambiyur"],
		dindigul: ["Athoor","Dindigul East", "Dindigul West", "Gujiliamparai", "Kodaikanal", "Natham", "Nilakkottai", "Oddanchatram", "Palani", "Vedasandur"]
    };

    function validateForm() {
        // Add your validation logic here
        return true;
    }
	function toggleCustomOption(customId) {
        const customOption = document.getElementById(customId);
        if (customOption.style.display === 'block') {
            customOption.style.display = 'none';
        } else {
            customOption.style.display = 'block';
            customOption.focus();
        }
    }
    function populateTaluks() {
        const districtSelect = document.getElementById('districtSelect');
        const talukSelect = document.getElementById('talukSelect');

        talukSelect.innerHTML = '<option value="">Select Taluk</option>';
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
