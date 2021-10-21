<?php
  
    include './header-login.php';
    require './connection.php';
    
    if(!isset($_SESSION['id']))
    {
        header("Location: index.php");
        exit();
    }
    
    if(empty($_SESSION['cart']))
    {
        $id = (int)$_SESSION['id'];
        $quary = "SELECT * FROM estore.order WHERE userid = ? AND status_prod =NULL;";
        $stmt = mysqli_stmt_init($connection);
        if(!mysqli_stmt_prepare($stmt,$quary))
        {
            header("Location: home.php");
            
        }
        else
        {
       
            mysqli_stmt_bind_param($stmt,"i",$id);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if(mysqli_num_rows($result)>0)
            {
                
                foreach($result as $r)
                {
    
                    $prod_id1 = (int)$r['product_id'];
                    
                    
                    $quary = "SELECT * FROM estore.products WHERE prod_id = '$prod_id1';";
                    $result = mysqli_query($connection,$quary);
                    $itemdetails = mysqli_fetch_array($result);
                    
                    
                    if(!isset($_SESSION['cart']))
                    {
                        $_SESSION['cart'][0] = $itemdetails;
                       
                    }
                    else
                    {
                        $count = count($_SESSION['cart']);
                        
                        $_SESSION['cart'][$count] = $itemdetails;
                        
                    }
                }
                
            }
            
        }
        
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/cart-style.css">
    <title>E Store | Your Cart</title>
</head>
<body>
    <div class="container">
        <div class="content">
            <h2>cart</h2>
            <table>
                <tr>
                    <th><p>Item Number</p></th>
                    <th><p>Item Brand</p></th>
                    <th><p>Price</p></th>
                    <th><p>Action</p></th>
                </tr>
                <?php
                    if(!empty($_SESSION['cart']))
                    {   
                        foreach($_SESSION['cart'] as $keys => $values)
                        {
                            ?>
                            <tr>
                                <td><p><?php echo (int)$values['prod_id']-2;?></p></td>
                                <td><p><?php echo $values['product_manufact'];?></p></td>
                                <td><p>&#8377 <?php echo $values['price'];?></p></td>
                                <td>
                                    <form action="./cart-data.php" method="POST">
                                        <button type="submit" name="remove_item" style="padding: 1.5%; background :#FE0000FF;" value="<?php echo $values['prod_id'];?>">Remove</button>
                                    </form>
                                </td>
                            </tr>
                            <?php
                        }
                    }
                ?>
            </table>
            <form action="./success.php" method="POST">
                <button type="submit" name="order_placed">Place Order</button>
            </form>
            <?php
                if(isset($_GET['error']))
                {
                    if($_GET['error']=="emptycart")
                    {
                        ?>
                        <p class="error">You have no item in the cart</p>
                        <?php
                    }
                    
                }
            ?>
        </div>


        <div class="content">
            <h2>order history</h2>
            <table>
                <tr>
                    <th><p>Item Number</p></th>
                    <th><p>Item Brand</p></th>
                    <th><p>Price</p></th>
                </tr>
                <?php
                        $id = (int)$_SESSION['id'];
                        $quary_history = "SELECT * FROM estore.order WHERE userid ='$id' AND status_prod = 'ordered' ;";
                        $myresult =  mysqli_query($connection,$quary_history);
                        foreach($myresult as $k )
                        
                        {
                            
                            $product_id = (int)$k['product_id'];
                            $quary = "SELECT * FROM estore.products WHERE prod_id = '$product_id';";
                            $result = mysqli_query($connection,$quary);
                            $itemdetails = mysqli_fetch_array($result);

                            ?>
                            <tr>
                                <td><p><?php echo (int)$itemdetails['prod_id']-2;?></p></td>
                                <td><p><?php echo $itemdetails['product_manufact'];?></p></td>
                                <td><p>&#8377 <?php echo $itemdetails['price'];?></p></td>
                                
                            </tr>
                            <?php
                        }
                    
                ?>
            </table>
        </div>
    </div>
</body>
</html>