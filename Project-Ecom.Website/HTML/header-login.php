<?php
    require './connection.php';
    session_start();
    
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/header.css">
   
    <title></title>
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
                <li><a href="./cart.php">cart</a></li>
                <li><a href="./settings.php">settings</a></li>
                <li>
                    <form action="./logout.php" method="POST">
                        <button type="submit" name="logout-submit"><p>Logout</p></button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
   
    <div class="navbar-inside" style="height: 150px;">
        <ul class="nav_">
            <li><a href="./cart.php">cart</a></li>
            <li><a href="./settings.php">settings</a></li>
            <li>
                <form action="./logout.php" method="POST">
                    <button type="submit" name="logout-submit"><p>Logout</p></button>
                </form>
            </li>
        </ul>
    </div>
</body>

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