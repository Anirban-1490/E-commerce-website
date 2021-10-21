<?php
    require './connection.php';
    session_start();
    if(!isset($_SESSION['id']))
    {
        header("Location: index.php");
        exit();
    }
    if(!isset($_POST['order_placed']))
    {
        header("Location: home.php");
        exit();
    }
    if(isset($_POST['order_placed']) && empty($_SESSION['cart']))
    {
        header("Location: cart.php?error=emptycart");
        exit();
    }
    $id = $_SESSION['id'];
    foreach($_SESSION['cart'] as $keys => $values)
    {
        $itemid = $values['prod_id'];
        $sql = "UPDATE estore.order SET status_prod ='ordered' WHERE userid = '$id' AND product_id = '$itemid';";
        mysqli_query($connection,$sql);
        unset($_SESSION['cart'][$keys]);
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/header.css">
    <link rel="stylesheet" href="../CSS/success-style.css">
    <title>Success</title>
</head>
<body>
    <input type="checkbox" id="ham">

    <div class="navbar" >
        <div class="header text">
            <a href="./home.php"><h2>E-Store</h2></a>
            <div class="hello"><p> <?php echo user()?></p></div>
        </div>
    
        <button class="button">
            <label for="ham">
            <span></span>
            <span></span>
            <span></span>
            </label>
        </button>
        <div class="header links" >
            <ul >
                
                <li><a href="./settings.php">settings</a></li>
                <li>
                    <form action="./logout.php" method="POST">
                        <button type="submit" name="logout-submit"><p>Logout</p></button>
                    </form>
                </li>
            </ul>
        </div>
    </div>

    <div class="navbar-inside" style="height: 120px;">
        <ul class="nav_">
            
            <li><a href="./settings.php">settings</a></li>
            <li>
                <form action="./logout.php" method="POST">
                    <button type="submit" name="logout-submit"><p>Logout</p></button>
                </form>
            </li>
        </ul>
    </div>

    <div class="container-">
        <div class="content-">
            <div class="thanks"><p>Thanks for ordering from E-Store. Your order will be delivered to you shortly.</p></div>
            <div class="more"><p>Order some more Laptops <a href="./home.php">here</a></p></div>
        </div>
    </div>


</body>
</html>

<?php

function user()
{
    if(!isset($_SESSION['name']))
    {
        return "Hi, User";
    }
    else
    {
        return "Hi, ".$_SESSION['name'];
    }
}
?>