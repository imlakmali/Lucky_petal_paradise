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

    // Retrieve counts for wishlist and cart
    $select_wishlist = mysqli_query($conn, "SELECT * FROM `wishlist` WHERE name ='$product_name'  AND user_id = '$user_id'")
        or die('wishlist query failed');
    $wishlist_num_rows = mysqli_num_rows($select_wishlist);

    $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE name ='$product_name'  AND user_id = '$user_id'")
        or die('cart query failed');
    $cart_num_rows = mysqli_num_rows($select_cart);  

    // Check if the product already exists in wishlist or cart
    if ($wishlist_num_rows > 0) {
        $message[] = 'product already exists in wishlist';
    } else if ($cart_num_rows > 0) {
        $message[] = 'product already exists in cart';
    } else {
        // Insert product into wishlist
        mysqli_query($conn, "INSERT INTO `wishlist`(`user_id`, `pid`, `name`, `price`, `image`) VALUES ('$user_id', '$product_id', '$product_name', '$product_price', '$product_image')");
        $message[] = 'product successfully added to wishlist';
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
        mysqli_query($conn, "INSERT INTO `cart`(`user_id`,`pid`,`name`,`price`,`image`)VALUES ('$user_id','$product_id','$product_name','$product_price','$product_image')");
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Lucky Petal Paradise</title>
</head>

<body>
    <?php include 'header.php'; ?>
    <div class="banner">
        <h1>our shop</h1>
        <p>Lorem ipsum dolor sit </p>

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
                            <a href="view_page.php?pid = <?php echo $fetch_products['id']; ?>" class="fa-solid fa-eye"></a>
                            <button type="submit" name="add_to_wishlist" class="fa-solid fa-heart"></button>
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
        
    </div>
    <?php include 'footer.php'; ?>
</body>

</html>