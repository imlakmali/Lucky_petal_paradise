<?php 
    include 'connection.php';
    session_start();

    $user_id = $_SESSION['user_id'];
    if(!isset($user_id)){
        header('location:login.php');
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="main.css">
    <title>Lucky Petal Paradise</title>
</head>
<body>
<?php include 'header.php'; ?>
<div class="slide-section">
        <div class="slide-show-container">
            <div class="wrapper-one">
                <div class="wrapper-text">inspired by nature</div>
            </div>
            <div class="wrapper-two">
                <div class="wrapper-text">fresh flower for you</div>
            </div>
            <div class="wrapper-three">
                <div class="wrapper-text">inspired by nature</div>
            </div>
        </div>
    </div>
    <section class="home-contact">
        <h1>have any queestion ?</h1>
        <p>Lorem ipsum dolor sit amet consectetur
            adipisicing elit. Odit, commodi.</p>
        <a href="contact.php" class="btn2">contact us</a>
    </section>
    
   
    <div class="row">
        <div class="card">
            <div class="detail">
                <span>30% OFF TODAY</span>
                <h1>simple & elegant</h1>
                <a href="shop.php">shop now</a>
            </div>
        </div>
        <div class="card">
            <div class="detail">
                <span>30% OFF TODAY</span>
                <h1>simple & elegant</h1>
                <a href="shop.php">shop now</a>
            </div>
        </div>
        <div class="card">
            <div class="detail">
                <span>30% OFF TODAY</span>
                <h1>simple & elegant</h1>
                <a href="shop.php">shop now</a>
            </div>
        </div>
    </div>
    <div class="categories">
        <h1 class="title">TOP CATEGORIES</h1>
        <div class="box-container">
            <div class="box">
                <img src="img/pexels-dids-2317874.jpg" >
                <span>birthday</span>
            </div>
            <div class="box">
                <img src="img/pexels-dids-2317874.jpg" >
                <span>next day</span>
            </div>
            <div class="box">
                <img src="img/pexels-dids-2317874.jpg" >
                <span>plant</span>
            </div>
            <div class="box">
                <img src="img/pexels-dids-2317874.jpg" >
                <span>wedding</span>
            </div>
            <div class="box">
                <img src="img/pexels-dids-2317874.jpg" >
                <span>sympathy</span>
            </div>
        </div>
    </div>
    <div class="banner3">
        <div class="detail">
            <span>BETTER THAN CAKE</span>
            <h1>BIRTHAY BOUQS</h1>
            <p>believe in birthday magic ? (you will.)celebrate with party-ready blooms!</p>
            <a href="shop.php">explore<i class="bi bi-arrow-bar-right"></i></a>
        </div>
    </div>
    
    <?php include 'footer.php'; ?>
</body>
</html>