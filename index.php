<?php
include 'connection.php';
session_start();

$user_id = $_SESSION['user_id'];
if (!isset($user_id)) {
    header('location:login.php');
}
/*-----------adding products to wishlist-------------------*/
if (isset($_POST['add_to_wishlist'])) {
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];


    $wishlist_number = mysqli_query($conn, "SELECT * FROM `wishlist` WHERE name = '$product_name' AND user_id = '$user_id'")
        or die('query failed 2');

    $cart_number = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'")
        or die('query failed 3');
    if (mysqli_num_rows($wishlist_number) > 0) {
        $message[] = 'product already exist in wishlist';
    } else if (mysqli_num_rows($cart_number) > 0) {
        $message[] = 'product already exist in cart';
    } else {
        mysqli_query($conn, "INSERT INTO `wishlist`(`user_id`,`pid`,`name`,`price`,`image`)VALUES ('$user_id','product_id','product_name','product_price','product_image')");
        $message[] = 'product successfully added in wishlist';
    }
}

/*-----------adding products to cart-------------------*/
if (isset($_POST['add_to_cart'])) {
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];


    $cart_number = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'")
        or die('query failed 3');
    if (mysqli_num_rows($cart_number) > 0) {
        $message[] = 'product already exist in cart';
    } else {
        mysqli_query($conn, "INSERT INTO `cart`(`user_id`,`pid`,`name`,`price`,`image`)VALUES ('$user_id','product_id','product_name','product_price','product_image')");
        $message[] = 'product successfully added in cart';
    }
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>

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
                        <img src="image/<?php echo $fetch_products['image']; ?>">
                        <div class="price">Rs<?php echo $fetch_products['price']; ?>/-</div>
                        <div class="name"><?php echo $fetch_products['name']; ?></div>
                        <input type="hidden" name="product_id" value="<?php echo $fetch_products['id']; ?>">
                        <input type="hidden" name="product_name" value="<?php echo $fetch_products['name']; ?>">
                        <input type="hidden" name="product_price" value="<?php echo $fetch_products['price']; ?>">
                        <input type="hidden" name="product_image" value="<?php echo $fetch_products['image']; ?>">
                        <div class="icon">
                            <a href="view_page.php?pid = <?php echo $fetch_products['id']; ?>" class="fa-regular fa-face-smile-beam"></a>
                            <button type="submit" name="add_to_wishlist" class="fa-solid fa-heart-pulse"></button>
                            <button type="submit" name="add_to_cart" class="fa-solid fa-cart-arrow-down"></button>
                        </div>
                    </form>

            <?php
                }
            } else {
                echo '<p class="empty">no products added yet!</p>';
            }

            ?>

        </div>
        <div class="more">
            <a href="shop.php">load more</a>
            <i class="fa-solid fa-arrow-down-short-wide"></i>
        </div>
    </div>
    <?php include 'footer.php'; ?>
</body>

</html>