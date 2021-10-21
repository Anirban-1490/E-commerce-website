<?php
    session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../CSS/header.css">
    <link rel="stylesheet" href="../CSS/login-style.css">
</head>
<body>
    <input type="checkbox" id="ham">
    <?php 
        if(!isset($_GET['error']))
        {
            echo "<input type='checkbox' id='close' >";
        }
        else{
            echo "<input type='checkbox' id='close' checked>";
        }
    ?>
    
    <div class="navbar" >
        <div class="header text">
            <a href="./index.php"><h2>E-Store</h2></a>
            <div class="hello"> <?php echo user()?></div>
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
                <li><a href="./signup.php">sign up</a></li>
                <li><a href="#login"><label for="close">login</label></a></li>
                <li><a href="../HTML/About Us.php">about us</a></li>
                <li><a href="./contactUs.php">contact us</a></li>
            </ul>
        </div>
    </div>
   
    <div class="navbar-inside" >
        <ul class="nav_">
            <li><a href="./signup.php">sign up</a></li>
            <li><a href="#login"><label for="close">login</label></a></li>
            <li><a href="../HTML/About Us.php">about us</a></li>
            <li><a href="./contactUs.php">contact us</a></li>
        </ul>
    </div>

    <div class="login" >
        <h2>LOGIN
            <button>
                <label for="close">
                   <div class="one">
                       <div class="two"></div>
                   </div>
                </label>
            </button>
        </h2>
        <p>Don't have an account? <a href="./signup.php">Register</a></p>
        <form action="./data-login.php" method="POST">
            <input type="text" name="mailuser" id="" placeholder="Email">
            <input type="text" name="pwduser" id="" placeholder="Password">
            <button type="submit" name="submit_login">Login</button>
        </form>
       <p> <a href="./forgot-pass.php">Forgot Password?</a></p>
       <?php echo error1();?>
    </div>
    
    <!-- Overlay -->
    <div class="overlay"></div>
</body>
</html>
<?php

function user()
{
    if(!isset($_SESSION['name']))
    {
        return "<p>Hi, User</p>";
    }
    else
    {
        return "<p>Hi,".$_SESSION['name']."</p>";
    }
}

function error1()
{
    if(!isset($_GET['error']))
    {
        return "";
        exit();
    }
    else
    {
        $str = $_GET['error'];
        if($str == "empty")
        {
            return "<p class='error'>Please fill up all the fields!</p>";
            exit();
        }
        else if($str == "wrongpwd")
        {
            return "<p class='error'>Incorrect password.</p>";
            exit();

        }
        else if($str == "nouser")
        {
            return "<p class='error'>No user with this email and password exist.</p>";
            exit();
        }
    }
}

?>
