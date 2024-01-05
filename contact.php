<?php
include 'connection.php';
session_start();

$user_id = $_SESSION['user_id'];
if (!isset($user_id)) {
    header('location:login.php');
}
/*----------send message--------------*/ 
if(isset($_POST['submit-btn'])){
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $number = mysqli_real_escape_string($conn, $_POST['number']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);
    
    $select_message = mysqli_query($conn , "SELECT * FROM `message` WHERE name='$name' AND email='$email' AND number='$number' AND message = '$message'")
        or die('message query failed');
    if(mysqli_num_rows($select_message)>0){
        echo 'message already send';
    }else{
        mysqli_query($conn,"INSERT INTO `message`(`user_id`,`name`,`email`,`number`,`message`) VALUE('$user_id','$name','$email','$number','$message')")or 
        die('query failed');
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer"   />
    <title>Lucky Petal Paradise</title>
</head>

<body>
    <?php include 'header.php'; ?>
    <div class="banner">
        <h1>my contact</h1>
        <p>Lorem ipsum dolor sit </p>
    </div>
    <div class="help">
        <h1 class="title">need help</h1>
        <div class="box-container">
            <div class="box">
                <div>
                    <img src="img/cartoon-face-vector-icon-address.jpg">
                    <h2>address</h2>
                </div>
                <p>Lorem ipsum dolor sit.</p>
            </div>
            <div class="box">
                <div>
                    <img src="img/cartoon-face-vector-icon-opening).jpg">
                    <h2>opening</h2>
                </div>
                <p>Lorem ipsum dolor sit.</p>
            </div>
            <div class="box">
                <div>
                    <img src="img/cotact.webp">
                    <h2>our contact</h2>
                </div>
                <p>Lorem ipsum dolor sit.</p>
            </div>
            <div class="box">
                <div>
                    <img src="img/special offer.png">
                    <h2>special offers</h2>
                </div>
                <p>Lorem ipsum dolor sit.</p>
            </div>
        </div>
    </div>
    <div class="form-container">
        <div class="form-section">
            <form method="post">
                <h1>send us your question!</h1>
                <p>we will get back to you within two days</p>
                <div class="input-field">
                    <label>your name</label>
                    <input type="text" name="name">
                </div>
                <div class="input-field">
                    <label>your email</label>
                    <input type="text" name="email">
                </div>
                <div class="input-field">
                    <label>your number</label>
                    <input type="number" name="number">
                </div>
                <div class="input-field">
                    <label>message</label>
                    <textarea name="message"></textarea>
                </div>
                <input type="submit" name="submit-btn" class="btn" value="send message">
            </form>
        </div>
    </div>
    <?php include 'footer.php'; ?>
    <script type="text/javascript" src="script.js"></script>
</body>

</html>