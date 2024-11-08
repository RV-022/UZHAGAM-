<?php
session_start();

include("connection.php");
include("functions.php");


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    //something was posted
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];
    $location = $_POST['taluk']; // Assuming taluk is selected as location
    $acres_owned = $_POST['acres_owned'];
    $acres_used = $_POST['acres_used'];
    $vegetables = isset($_POST['vegetable_options']) ? implode(",", $_POST['vegetable_options']) : "";
$fruits = isset($_POST['fruit_options']) ? implode(",", $_POST['fruit_options']) : "";



    if (!empty($user_name) && !empty($password) && !empty($location) && !empty($acres_owned) && !empty($acres_used) && !empty($vegetables) && !empty($fruits)&& !is_numeric($user_name)) {

        //save to database
        $user_id = random_num(20);
        $query = "insert into farmerlogindb (user_id,user_name,password,location,acres_owned,acres_used,vegetables,fruits) values ('$user_id','$user_name','$password','$location','$acres_owned','$acres_used','$vegetables','$fruits')";

        mysqli_query($con, $query);

        header("Location: login.php");
        die;
    } else {
        echo '<script>alert("Please enter some valid information!")</script>';
        
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Signup</title>
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
			</ul>
		</nav>
	</header>


<div id="box">

    <form method="post" id="signupForm" onsubmit="return validateForm()">
        <center><div style="font-size: 20px;margin: 10px;color: white;">Signup as farmer</div></center>
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
		ACRES OF LAND OWNED NOW:
		<input id="text" type="number" name="acres_owned" placeholder="Acres of Land Owned" min="0">
        <span id="acresOwnedError" class="error"></span><br>
		ACRES OF LAND CURRENTLY USED FOR FARMING:
        <input id="text" type="number" name="acres_used" placeholder="Acres of Land Used" min="0">
        <span id="acresUsedError" class="error"></span><br>

        <label for="vegetableCheckbox">CURRENTLY CULTIVATED VEGETABLE:</label>
        
        <div id="vegetableOptions" class="checkboxes">
            <label><input type="checkbox" name="vegetable_options[]" value="carrot"> Carrot</label>
			<label><input type="checkbox" name="vegetable_options[]" value="onion"> Onion</label>
            <label><input type="checkbox" name="vegetable_options[]" value="tomato"> Tomato</label>
            <label><input type="checkbox" name="vegetable_options[]" value="potato"> Potato</label>
			<label><input type="checkbox" name="vegetable_options[]" value="brinjal"> Brinjal</label>
			<label><input type="checkbox" name="vegetable_options[]" value="radish"> Radish</label>
			<label><input type="checkbox" name="vegetable_options[]" value="gourds"> Gourds</label>
			<label><input type="checkbox" name="vegetable_options[]" value="other"> Others</label>
            <label><input type="checkbox" name="vegetable_options[]" value="none"> None</label>
        </div>
		
        <label for="fruitCheckbox">CURRENTLY CULTIVATED FRUITS:</label>
        
        <div id="fruitOptions" class="checkboxes">
            <label><input type="checkbox" name="fruit_options[]" value="apple"> Apple</label>
            <label><input type="checkbox" name="fruit_options[]" value="banana"> Banana</label>
            <label><input type="checkbox" name="fruit_options[]" value="mango"> Mango</label>
			<label><input type="checkbox" name="fruit_options[]" value="other"> Other</label>
            <label><input type="checkbox" name="fruit_options[]" value="none"> None</label>
        </div><r/><br/>
<center>
        <input id="button" type="submit" value="Signup" style="background-color: rgb(30, 80, 96);"></center><br/>
		<center><a href="login.php">Click to Login</a></center><br><br>
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
