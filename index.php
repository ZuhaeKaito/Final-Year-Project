<?php 
    include 'connection.php';
    session_start();
    $user_id = $_SESSION['user_id'];
    if (!isset($user_id)) {
        header('location:login.php');
    }
    if(isset($_POST['logout'])){
        session_destroy();
        header("location: login.php");
    }
    //adding product in wishlist
    if (isset($_POST['add_to_wishlist'])) {
    	$product_id = $_POST['product_id'];
    	$product_name = $_POST['product_name'];
    	$product_price = $_POST['product_price'];
    	$product_image = $_POST['product_image'];

    	$wishlist_number = mysqli_query($conn, "SELECT * FROM `wishlist` WHERE name = '$product_name' AND user_id ='$user_id'") or die('query failed');
    	$cart_num = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id ='$user_id'") or die('query failed');
    	if (mysqli_num_rows($wishlist_number)>0) {
    		$message[]='product already exist in wishlist';
    	}else if (mysqli_num_rows($cart_num)>0) {
    		$message[]='product already exist in cart';
    	}else{
    		mysqli_query($conn, "INSERT INTO `wishlist`(`user_id`,`pid`,`name`,`price`,`image`) VALUES('$user_id','$product_id','$product_name','$product_price','$product_image')");
    		$message[]='product successfuly added in your wishlist';
    	}
    }

     //adding product in cart
    if (isset($_POST['add_to_cart'])) {
    	$product_id = $_POST['product_id'];
    	$product_name = $_POST['product_name'];
    	$product_price = $_POST['product_price'];
    	$product_image = $_POST['product_image'];
    	$product_quantity = $_POST['product_quantity'];

    	$cart_num = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id ='$user_id'") or die('query failed');
    	if (mysqli_num_rows($cart_num)>0) {
    		$message[]='product already exist in cart';
    	}else{
    		mysqli_query($conn, "INSERT INTO `cart`(`user_id`,`pid`,`name`,`price`,`quantity`,`image`) VALUES('$user_id','$product_id','$product_name','$product_price','$product_quantity','$product_image')");
    		$message[]='product successfuly added in your cart';
    	}
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!------------------------bootstrap icon link------------------------------->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <!------------------------bootstrap css link------------------------------->
    <!------------------------slick slider link------------------------------->
    <link rel="stylesheet" type="text/css" href="slick.css" />
    <!------------------------default css link------------------------------->
    <link rel="stylesheet" href="main.css">
    <title>Guitarlicious - home page</title>
</head>

<body>
    <?php include 'header.php'; ?>
    <!------------------------slide------------------------------->

    <div class="container-fluid">
        <div class="hero-slider">
            <div class="slider-item">
                <img src="img/sliderG.png" alt="...">
                <div class="slider-caption">
                    <span>Music's Future is HERE</span>
                    <h1>Lava Me 2</h1>
                    <p>A revolutionary instrument that combines cutting-edge technology <br>
					with exceptional acoustic performance.<br>
					Crafted with aerospace-grade materials and innovative design,<br>
					the LAVA ME 2 sets a new standard for acoustic guitars.</p>
                    <a href="shop.php" class="btn">buy now</a>
                </div>
            </div>
            <div class="slider-item">
                <img src="img/slider2G.png" alt="...">
                <div class="slider-caption">
                    <span>1958 Fender</span>
                    <h1>Stratocaster Sunburst</h1>
                    <p>Step back in time and experience the magic of the 1958 Fender Stratocaster Sunburst,<br>
					an instrument that has become a legend in the world of music.<br>
					Crafted with precision and passion by Fender's skilled artisans,<br>
					this iconic guitar represents the pinnacle of vintage craftsmanship and sonic brilliance.</p>
                    <a href="shop.php" class="btn">shop now</a>
                </div>
            </div>
			<div class="slider-item">
                <img src="img/slider3G.png" alt="...">
                <div class="slider-caption">
                    <span>NAMM 2018</span>
                    <h1>Ibanez Neuheiten – Die AZ-Serie </h1>
                    <p>Immerse yourself in a world of cutting-edge guitar design<br>
					and unparalleled performance as Ibanez showcases its latest innovations.<p>
                    <a href="shop.php" class="btn">shop now</a>
                </div>
            </div>
        </div>
        <div class="control">
            <i class="bi bi-chevron-left prev"></i>
            <i class="bi bi-chevron-right next"></i>
        </div>
    </div>
    <div class="line"></div>
    <div class="services">
    	<div class="row">
    		<div class="box">
    			<img src="img/0.png">
    			<div>
    				<h1>Sounds Guarantee</h1>
    				<p>We will make sure every product<br> bring happiness.</p>
    			</div>
    		</div>
    		<div class="box">
    			<img src="img/1.png">
    			<div>
    				<h1>Affordable Price</h1>
    				<p>The price is suitable based on<br>the quality.</p>
    			</div>
    		</div>
    		<div class="box">
    			<img src="img/2Cust.png">
    			<div>
    				<h1>Best Service</h1>
    				<p>Experience unparalleled customer service excellence with Guitarlicious.</p>
    			</div>
    		</div>
    	</div>
    </div>
    <div class="line2"></div>
    <div class="story">
    	<div class="row">
    		<div class="box">
    			<span>OUR HISTORY</span>
    			<h1>Founded in 2019 by Guitarlicious.MY</h1>
    			<p> Guitarlicious isn't just a name—it's a melody in Willowbrook's music scene. Combining classic tunes with modern beats, Guitarlicious offers an impressive array of guitars and musical accessories. In a world dominated by digital soundscapes, this shop remains a cozy brick-and-mortar haven for guitar enthusiasts of all levels. Guitarlicious had become a great destination, attracting a community of music lovers who gather to explore exquisite instruments and create unforgettable jams. The founder's dedication to quality and musical creativity remains the heartstrings of Guitarlicious, making it an essential part of Willowbrook's musical harmony.</p>
                <a href="about.php" class="btn"> Learn More</a>
    		</div>
    		<div class="box">
    			<img src="img/8slow.jpg">
    		</div>
    	</div>
    </div>
    <div class="line3"></div>
    <!-- testimonial -->
    <div class="line4"></div>
    <div class="testimonial-fluid">
    	<h1 class="title">Customer Review</h1>
    	<div class="testimonial-slider">
    		<div class="testimonial-item">
    			<img src="img/3.jpg">
    			<div class="testimonial-caption">
    				<span> Zuhairi</span>
    				<h1>The best store EVER!!</h1>
    				<p>I recently discovered Guitarlicious, an online music store, and I must say,
					<br>I'm impressed! The website is easy to navigate, and I found exactly what I was looking for in terms of guitars and accessories.<br>
					The checkout process was smooth, and my order arrived promptly and well-packaged.<br>
					Guitarlicious offers a wide range of products and provides an excellent online shopping experience for music enthusiasts like me."</p>

    			</div>
    		</div>
    		<div class="testimonial-item">
    			<img src="img/4.jpg">
    			<div class="testimonial-caption">
    				<span> Insyirah</span>
    				<h1>Its A Good Experience</h1>
    				<p>While browsing through Guitarlicious, I noticed that the search function could be improved<br>
					to provide more accurate results. Sometimes, it's challenging to find specific items due to broad search terms or limited filtering options.<br>
					Enhancing the search algorithm and implementing advanced filtering tools based on brand,<br>
					price range, or features could significantly enhance the overall user experience.</p>
    			</div>
    		</div>
    		<div class="testimonial-item">
    			<img src="img/profile.jpg">
    			<div class="testimonial-caption">
    				<span>Zharfan</span>
    				<h1>Exceptional Customer Service</h1>
    				<p>One aspect that Guitarlicious could enhance is the integration of customer reviews and ratings for products.<br>
					While the descriptions are helpful, seeing feedback from other musicians would provide additional insights and build trust among potential buyers.<br>
					Implementing a review system with star ratings and written reviews could greatly benefit customers in making confident choices.".</p>
    			</div>
    		</div>
    	</div>
    	 <div class="control">
            <i class="bi bi-chevron-left prev1"></i>
            <i class="bi bi-chevron-right next1"></i>
        </div>
    </div>
    <div class="line"></div>
    <!---discover section --->
    <div class="line2"></div>
    <div class="discover">
    	<div class="detail">
    		<h1 class="title">Acoustic Guitar</h1>
    		<span>Experience the Timeless Beauty and Versatility of the Acoustic Guitar</span>
    		<p>The acoustic guitar stands as a timeless symbol of musical expression and craftsmanship.<br>
			With its elegant curves, resonant tone, and rich history,<br>
			the acoustic guitar has captured the hearts of musicians and listeners alike for generations.</p>
				 <br>
            <a href="shop.php" class="btn">Discover More</a>
    	</div>
    	<div class="img-box">
    		<img src="img/13Back.png">
    	</div>
    </div>
    <div class="line3"></div>
    <?php include 'homeshop.php'; ?>
    <div class="line2"></div>
    <div class="newslatter">
    	<h1 class="title">Get Notified!</h1>
    	<p>Be the first to know our latest update and incoming promotions.
        </p>
        <input type="text" name="" placeholder="Enter your email">
        <a href="subscription_confirmation.html">
        <button>Subscribe Now</button>
    </a>
    </div>
    <div class="line3"></div>
    <div class="client">
    	<div class="box">
    		<img src="img/client0.png">
    	</div>
    	<div class="box">
    		<img src="img/client1.png">
    	</div>
    	<div class="box">
    		<img src="img/client2.png">
    	</div>
    	<div class="box">
    		<img src="img/client3.png">
    	</div>
    	<div class="box">
    		<img src="img/client.png">
    	</div>
    </div>
    <?php include 'footer.php'; ?>
    <script src="jquary.js"></script>
    <script src="slick.js"></script>

    <script type="text/javascript">
        <?php include 'script2.js' ?>
    </script>
</body>

</html>