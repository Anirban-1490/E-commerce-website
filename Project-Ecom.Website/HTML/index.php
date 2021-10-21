<?php
    
    include './header.php';
    if(isset($_SESSION['name']) )
    {
        header("Location: home.php");
        die();
    }
    require './connection.php';
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../CSS/e-style.css">
    <title>E-Store | Buy Laptops</title>
</head>
<body>
   
    <div class="content">
        <?php 
            $quarry = "SELECT * FROM products ORDER BY prod_id ASc;";
           $result =  mysqli_query($connection,$quarry);
           if(mysqli_num_rows($result)>0)
           {
               while($row = mysqli_fetch_assoc($result))
               {    
                ?>
                    <div class="card">
                        <form action="./cart-data.php" method="GET">
                            <div class="card-header">
                                <h3><?php echo $row['product_name'];?></h3>
                            </div>
                            <div class="image">
                                <img src="<?php echo $row['product_image'];?>" >
                            </div>
                            <p><?php echo $row['product_desc'];?></p>
                            <h3>&#8377 <?php echo $row['price'];?></h3>
                            <br>
                            <div class="order">
                                <button class="unset" type="submit" name="add_to_cart" value="<?php echo $row['prod_id'] -2;?>"><p>Add to cart</p></button>
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
<?php
    include './footer.php';
?>