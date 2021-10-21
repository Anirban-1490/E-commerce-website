<?php
  
    include './header-login.php';
    require './connection.php';
    if(!isset($_SESSION['id']))
    {
        header("Location: index.php");
        exit();
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <link rel="stylesheet" href="../CSS/e-style.css">
    <title>E-Store | Home</title>
</head>
<body>
    <div class="content">

        <?php 
            $quarry = "SELECT * FROM products ORDER BY prod_id ASc;";
           $result =  mysqli_query($connection,$quarry);
           if(mysqli_num_rows($result)>0)
           {
               foreach($result as $r)
               {    
                ?>
                    <div class="card">
                        <form action="./cart-data.php" method="GET">
                            <div class="card-header">
                                <h3><?php echo $r['product_name'];?></h3>
                            </div>
                            <div class="image">
                                <img src="<?php echo $r['product_image'];?>" >
                            </div>
                            <p><?php echo $r['product_desc'];?></p>
                            <h3>&#8377 <?php echo $r['price'];?></h3>
                            <br>
                            <div class="order">
                                <?php
                                    $user_id = (int)$_SESSION['id'];
                                    $pr_id = (int)$r['prod_id'];
                                    $quary = "SELECT * FROM estore.order WHERE userid = '$user_id' AND product_id = '$pr_id';";
                                    $result = mysqli_query($connection,$quary);
                                    if(mysqli_num_rows($result)==0)
                                    {
                                        ?>
                                        <button class="unset" type="submit" name="add_to_cart" value="<?php echo $pr_id -2;?>"><p>Add to cart</p></button>
                                        <?php
                                    }
                                        
                                    else if(mysqli_num_rows($result)>0)
                                    {
                                        ?>
                                        <button class="set" type="submit" name="add_to_cart" value="<?php echo $pr_id -2;?>"><p>Add to cart</p></button>
                                        <?php
                                    }
                                ?>
                            </div>
                        </form>
                    </div>
                <?php

               }
           }

        ?>
        
      
    </div>
   
</body>
</html>