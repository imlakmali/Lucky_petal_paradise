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
        <h1>my wishlist</h1>
        <p>Lorem ipsum dolor sit </p>

    </div>
    <div class="shop">
        <h1 class="title">product added in wishlist</h1>
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
            $grand_total = 0;
            $select_wishlist = mysqli_query($conn, "SELECT * FROM `wishlist` WHERE user_id = '$user_id'")
                or die('query failed1');

            if (mysqli_num_rows($select_wishlist) > 0) {
                while ($fetch_wishlist = mysqli_fetch_assoc($select_wishlist)) {


            ?>
                    <form action="" method="post" class="box">
                        <div class="icon">
                            <a href="wishlist.php?delete=<?php echo $fetch_wishlist['id']; ?>" class="fa-solid fa-eye-x></a>
                            <a href="view_page.php?pid = <?php echo $fetch_wishlist['id']; ?>" class="fa-solid fa-eye"></a>
                        </div>
                        <img src="image/<?php echo $fetch_wishlist['image']; ?>">
                        <div class="price">Rs<?php echo $fetch_wishlist['price']; ?>/-</div>
                        <div class="name"><?php echo $fetch_products['name']; ?></div>
                        <input type="hidden" name="product_id" value="<?php echo $fetch_wishlist['id']; ?>">
                        <input type="hidden" name="product_name" value="<?php echo $fetch_wishlist['name']; ?>">
                        <input type="hidden" name="product_price" value="<?php echo $fetch_wishlist['price']; ?>">
                        <input type="hidden" name="product_image" value="<?php echo $fetch_wishlist['image']; ?>">
                        <button type="submit" name="add_to_cart" class="btn2">add to cart<i class="fa-solid fa-cart-arrow-down"></i></button>
                        
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