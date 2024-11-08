<?php
include("connection.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>View product</title>
    <meta charset="viewport" content="width=device-width,initial-scale=1.0"/>
	<link rel="stylesheet" type="text/css" href="fstyle.css" media="screen">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SzlrWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
    
</head>
<body>
	<header>
		
		<nav>
			<img src="http://localhost:8080/login/img/img.png" style="  border-radius:80% 80% 80% 80%;  width:150px;height:150px;"><h1 style="font-size: 50px;">UZHAGAM</h1>
			<ul>
				<li><a href="http://localhost:8080/login/farmerlogin/index.php">Home</a></li>
				<li><a href="#sectioncontact">Contact us</a></li>
                <li><a href="logout.php">Log out</a></li><br><br>
			</ul>
		</nav>
	</header>
    <div class="container">
        <section class="display_product">
            <?php
                    $display_product=mysqli_query($con,"select * from add_pro");
                    $num=1;

                    if(mysqli_num_rows($display_product)>0) {
                        echo"  <table>
                        <thead>
                            <th>Sl No</th>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Action</th>
                        </thead>
                        <tbody>";
                        while($row=mysqli_fetch_assoc($display_product)){
                            $product_name=$row['product_name']
                    
                    ?>
                <tr>
                    <td><?php echo $num?></td>
                    <td><?php echo $row['product_name']?></td>
                    <td><?php echo $row['product_quan']?></td>
                    <td><?php echo $row['product_price']?></td>
                    <td>
                        <a href="delete_product.php?delete=<?php echo $row['id']?>" class="delete_product_btn"  onclick="return confirm('Are you sure you want to delete this product');"><i class="fa-solid fa-trash-can" style="color:red;"></i></a>
                        <a href="update_product.php?edit=<?php echo $row['id']?>" class="update_product_btn"><i class="fas-fa-edit" style="color:white;"></i></a>
                    </td>
                </tr>
                <?php
                    $num++;
                        }
                    }
                    else{
                        echo "<div class='empty_text'>No products available";
                    }

                    ?>
                </tbody>
            </table>
        </section>
    </div>


    <?php include("footer.php");?> 
</body>
</html>