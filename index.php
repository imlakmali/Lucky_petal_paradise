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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
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
                <img src="img/pexels-dids-2317874.jpg">
                <span>birthday</span>
            </div>
            <div class="box">
                <img src="img/pexels-dids-2317874.jpg">
                <span>next day</span>
            </div>
            <div class="box">
                <img src="img/pexels-dids-2317874.jpg">
                <span>plant</span>
            </div>
            <div class="box">
                <img src="img/pexels-dids-2317874.jpg">
                <span>wedding</span>
            </div>
            <div class="box">
                <img src="img/pexels-dids-2317874.jpg">
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
    <div class="shop">
        <h1 class="title">shop best sellers</h1>
        <?php
        if (isset($message)) {
            foreach ($message as $message) {
                echo '
                            <div class="message">
                                <span> ' . $message . '  </span>
                                <i class =" bi bi-x-circle" onclick="this.parentElement.remove()"></i>
                            </div>
                    ';
            }
        }
        ?>
        <div class="box-container">
            <?php
            $select_products = mysqli_query($conn, "SELECT * FROM `products`")
                or die('query failed1');

            if (mysqli_num_rows($select_products) > 0) {
                while ($fetch_products = mysqli_fetch_assoc($select_products)) {


            ?>
            <form action="" method="post" class="box">
                <img src="image/<?php echo $fetch_products['image']; ?>" >
                <div class="price">Rs<?php echo $fetch_products['price']; ?>/-</div>
                <div class="name"><?php echo $fetch_products['name']; ?></div>
                <input type="hidden" name="product_id" value="<?php echo $fetch_products['id']; ?>">
                <input type="hidden" name="product_name" value="<?php echo $fetch_products['name']; ?>">
                <input type="hidden" name="product_price" value="<?php echo $fetch_products['price']; ?>">
                <input type="hidden" name="product_image" value="<?php echo $fetch_products['image']; ?>">
                <div class="icon">
                    <a href="view_page.php?pid = <?php echo $fetch_products['id']; ?>" class="bi bi-eye-fill" ></a>
                    <button type="submit" name="add_to_wishlist" class="bi bi-suit-heart-fill"></button>
                    <button type="submit" name="add_to_cart" class="bi bi-cart-check-fill"></button>
                </div>
            </form>

            <?php
                    }
                }else{
                    echo '<p class="empty">no products added yet!</p>';
                }
            
            ?>
            
        </div>
        <div class="more">
            <a href="shop.php">load more</a>
            <i class="bi bi-box-arrow-in-down"></i>
        </div>
    </div>
    <?php include 'footer.php'; ?>
</body>

</html>