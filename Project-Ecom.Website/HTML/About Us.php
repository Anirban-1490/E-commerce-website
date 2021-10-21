<?php
   
    include './header.php';
    if(isset($_SESSION['name']) )
    {
        header("Location: home.php");
        die();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="../CSS/header.css"> -->
    <!-- <link rel="stylesheet" href="../CSS/footer.css"> -->
    <!-- <link rel="stylesheet" href="../CSS/login-style.css"> -->
    <link rel="stylesheet" href="../CSS/about-style.css">
    <title>E Store | About Us</title>
</head>
<body>
  
   

    <div class="container">
        <div class="card card-who">
            <div class="header-card">
                <h2>
                    who are we
                </h2>
            </div>
            <div class="history-rows">
                <div class="image">
                    <img src="../images/pexels-canva-studio-3153201.jpg" alt="company pic">
                </div>
                <p class="para1">This is an e-commerce company based in India. This is one of the top growing e-commerce website in India. We started as a small business group now it's evolved into an online Shopping Website where users can buy Laptops,Pc components etc. With our reach over 22 different countries</p>
            </div>
        </div>
        <div class="card">
            <div class="header-card">
                <h2>
                    our history
                </h2>
            </div>
            <div class="history-rows">
                <div class="year">
                    <h4>2015-</h4>
                </div>
                <p>This is the time when we started. This was an business plan by Anirban who used to work on a big and reputable tech company. After he left the company he started this initiative which became an online store named as E-Store.</p>
            </div>
            <div class="history-rows">
                <div class="year">
                    <h4>2017-</h4>
                </div>
                <p>At the mid April of 2017 this business got $30 million funding from many Partners which turned this business into an Online Ecommerce Shop</p>
            </div>
            <div class="history-rows">
                <div class="year">
                    <h4>2019-</h4>
                </div>
                <p>By mid June of 2019 we have raised almost $50 million more from our existing partners and new partners. By that time we also got more than 3000 sellers.</p>
            </div>
            <div class="history-rows">
                <div class="year">
                    <h4>2021-</h4>
                </div>
                <p>By June of 2021 we got more than 3 million daily page visits. Also our application in Google PlayStore has over 20 million downloads and now we have more than 7000 sellers with over 1 million products shipping/month.</p>
            </div>

        </div>
        <div class="card">
            <div class="header-card">
                <h2>
                    opportunities
                </h2>
            </div>
            <h4>Available Roles</h4>
            <div class="opp">
                <ol>
                    <li>Jr. Software Developer[5 months of internship + Full Time job]</li>
                    <li>Sr. Software Developer[Full Time job - 5-6 years of experiance]</li>
                    <li>Product Management[5 months of internship]</li>
                    <li>Jr. Frontend developer[6 months of internship + Full Time job]</li>
                </ol>
            </div>
        </div>
    </div> 
   
</body>
</html>
<?php
    include './footer.php';
?>