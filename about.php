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
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!------------------------bootstrap icon link------------------------------->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="main.css">
    <title>Guitarlicious- About</title>
</head>

<body>
    <?php include 'header.php'; ?>
    <div class="banner">
        <div class="detail">
            <h1>about us</h1>
            <p>At Guitarlicious, our journey is a testament to passion, dedication,<br> and a relentless pursuit of excellence.<br>
            Join us on this incredible journey and be a part of our story.
            </p>
            <a href="index.php">home </a><span>/ about us</span>
        </div>
    </div>
    <div class="line"></div>
    <!-----------------------about us------------------------>
    <div class="line2"></div>
    <div class="about-us">
        <div class="row">
            <div class="box">
                <div class="title">
                   
                    <h1>Hello, <br>this is Guitarlicious!</h1>
                </div>
                <p>Welcome to Musical Instruments Galore, your ultimate destination for all things music-related!<br>
                We are passionate about bringing the joy of music to enthusiasts, beginners, and professionals<br>
                alike by offering a wide range of high-quality instruments and accessories.</p>
            </div>
            <div class="img-box">
                <img src="img/about3.jpg">
            </div>
        </div>
    </div>
    <div class="line3"></div>
    <!-----------------------features----------------------->
    <div class="line4"></div>
    <div class="features">
        <div class="title">
            <h1>Variety Promotions</h1>
            <span>in physical store only</span>
        </div>
        <div class="row">
            <div class="box">
                <img src="img/icon.png">
                <h4>FREE SERVICES FOR EVERY GUITAR PURCHASES</h4>
                
            </div>
            <div class="box">
                <img src="img/icon.png">
                <h4>FREE AMP FOR 3 GUITAR PURCHASES</h4>
                
            </div>
            <div class="box">
                <img src="img/icon.png">
                <h4>10% CASHBACK FOR MEMBERS</h4>
                
            </div>
            <div class="box">
                <img src="img/icon.png">
                <h4>FREE IINSTRUMENTS CUSTOMIZATION <br>
                FOR 10 THOUSAND RINGGIT ABOVE PURCHASES </h4>
                
            </div>
        </div>
    </div>
    <div class="line"></div>
    
    <div class="line3"></div>
    <?php include 'footer.php'; ?>
    <script type="text/javascript" src="script.js"></script>
</body>

</html>