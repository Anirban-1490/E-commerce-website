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
    <link rel="stylesheet" href="../CSS/contact-style.css">
    <title>E Store | Contact Us</title>
</head>
<body>
    <div class="container">
        <div class="card live">
            <div class="header-card">
                <h2>
                    live support
                </h2>
                <p>24 hours | 7 days a week | 365 days a year LIve Technical Support</p>
            </div>
            <div class="info">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis adipisci cupiditate consectetur voluptates distinctio similique doloribus voluptate esse suscipit asperiores. Amet, dolores. Magnam, possimus! Quae quis neque laborum sed cumque dolorem! Quam corrupti tempora dolorem unde sed cupiditate esse ipsum asperiores expedita, iusto voluptatem, harum dolore tempore repellat veniam cumque saepe sapiente! Officiis vitae nobis nemo placeat ducimus porro magnam debitis libero corporis perferendis atque dicta, sequi hic? Eaque inventore provident nesciunt in pariatur modi placeat voluptatibus autem earum temporibus quisquam, adipisci fugit culpa eveniet rem suscipit incidunt maiores, dolor aliquam? Repellendus mollitia soluta fugit quam eaque sint explicabo vel.</p>
            </div>  
        </div>
        <div class="card live-image">
            <div class="image">
                <img src="../images/toppng.com-smt-filo-kiralama-customer-support-icon-live-support-icon-500x575.png" >
            </div>
        </div>
    </div>
    <div class="container container-two">
        <div class="form-support">
            <div class="header-card">
                <h2>
                    contact us
                </h2>
                
            </div>
            <form action="">
                <input type="text" name="" id="" placeholder="Name">
                <input type="text" name="" id="" placeholder="Email">
                <textarea name="" id="" cols="30" rows="10" ></textarea>
                <button type="submit" name="submit_contact">Submit</button>
            </form>
        </div>
        <div class="company-info">
            <div class="header-card">
                <h2>
                    company information
                </h2>
                
            </div>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit, maiores?</p>
            <p>Phone - (00) 222-777 444</p>
            <p>Fax - (000) 000-00 00</p>
            <p>Email - estore@support.com</p>
            <p>Follow on - Facebook , Twitter</p>
        </div>
    </div>
</body>
</html>
<?php
    include './footer.php';
?>