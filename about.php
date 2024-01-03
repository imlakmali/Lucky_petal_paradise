<?php
include 'connection.php';
session_start();

$user_id = $_SESSION['user_id'];
if (!isset($user_id)) {
    header('location:login.php');
}

?>


<style type="text/css">
    <?php include 'main.css'; ?>
</style>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer"   />
    <title>Lucky Petal Paradise</title>
</head>

<body>
    <?php include 'header.php'; ?>
    <div class="banner">
        <h1>about us</h1>
        <p>Lorem ipsum dolor sit </p>
    </div>
    <div class="about">
        <div class="row">
            <div class="detail">
                <h1>visit our beautiful showroom</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Illo voluptate repellendus sequi aliquam, cumque quod fuga
                    quidem fugit quo fugiat harum. Atque itaque ratione quo
                    placeat ut laborum ea enim unde, assumenda, fuga ducimus
                    laboriosam ad soluta iste consectetur modi saepe aperiam.
                    Cum, quisquam quae delectus qui dignissimos mollitia,
                </p>
                <a href="shop.php" class="btn2">shop now</a>
            </div>
            <div class="img-box">
                <img src="img/pexels-amina-filkins-5410050.jpg">
            </div>
        </div>
    </div>
    <div class="banner-2">
        <h1>let us your wedding flawless</h1>
        <a href="shop.php" class="btn2">shop now</a>
    </div>
    <div class="services">
        <h1 class="title">our services</h1>
        <div class="box-container">
            <div class="box">
                <i class="fa-solid fa-percent"></i>
                <h3>30% OFF +FREE SHIPPING</h3>
                <p>starting at Rs1000/- mo plus,get Rs 2500 creditlayer
                    on reguler orders
                </p>
            </div>
            <div class="box">
                <i class="fa-solid fa-asterisk"></i>
                <h3>FRESHEST BLOOMS</h3>
                <p>EXCLUSIVE FARM-FRESH FLOWERS WITH OUR HAPPINESS GUARANTEE</p>
            </div>
            <div class="box">
                <i class="fa-solid fa-clock"></i>
                <h3>SUPER FLEXIBLE</h3>
                <p>customize recipient,date,or flowers.skip or cancel anytime</p>
            </div>
        </div>
    </div>
    <div class="stylist">
        <h1 class="title">Florial stylist</h1>
        <p>meet the team that makes miracales happen</p>
        <div class="box-container">
            <div class="box">
                <div class="img-box">
                    <img src="img/pexels-hải-nguyễn-3253043.jpg">
                    <div class="social-links">
                        <i class="fa-brands fa-instagram"></i>
                        <i class="fa-brands fa-youtube"></i>
                        <i class="fa-brands fa-twitter"></i>
                        <i class="fa-brands fa-whatsapp"></i>
                        <i class="fa-brands fa-facebook"></i>

                    </div>
                </div>
                <h3>sheril fernando</h3>
                <p>developer</p>
            </div>
            <div class="box">
                <div class="img-box">
                    <img src="img/pexels-hassan-ouajbir-1324995.jpg">
                    <div class="social-links">
                        <i class="fa-brands fa-instagram"></i>
                        <i class="fa-brands fa-youtube"></i>
                        <i class="fa-brands fa-twitter"></i>
                        <i class="fa-brands fa-whatsapp"></i>
                        <i class="fa-brands fa-facebook"></i>

                    </div>
                </div>
                <h3>sheril fernando</h3>
                <p>developer</p>
            </div>
            <div class="box">
                <div class="img-box">
                    <img src="img/pexels-ron-lach-9652567.jpg">
                    <div class="social-links">
                        <i class="fa-brands fa-instagram"></i>
                        <i class="fa-brands fa-youtube"></i>
                        <i class="fa-brands fa-twitter"></i>
                        <i class="fa-brands fa-whatsapp"></i>
                        <i class="fa-brands fa-facebook"></i>
                    </div>
                </div>
                <h3>sheril fernando</h3>
                <p>developer</p>
            </div>
        </div>
    </div>
    <div class="testimonial-container">
        <h1 class="title">what people say</h1>
        <div class="container">
            <div class="testimonial-item active">
                <img src="img/">
                <h3>lakmali koralage</h3>
                <p>Lorem ipsum dolor sit amet consectetur 
                    adipisicing elit. Reprehenderit, recusandae?</p>

            </div>
            <div class="testimonial-item">
                <img src="img/">
                <h3>lakmali koralage</h3>
                <p>Lorem ipsum dolor sit amet consectetur 
                    adipisicing elit. Reprehenderit, recusandae?</p>

            </div>
            <div class="testimonial-item">
                <img src="img/">
                <h3>lakmali koralage</h3>
                <p>Lorem ipsum dolor sit amet consectetur 
                    adipisicing elit. Reprehenderit, recusandae?</p>

            </div>
            <div class="left-arrow"><i class="fa-solid fa-arrow-left-long"></i></div>
            <div class="right-arrow"><i class="fa-solid fa-arrow-right-long"></i></div>
        </div>
    </div>
    <?php include 'footer.php'; ?>
    
</body>

</html>