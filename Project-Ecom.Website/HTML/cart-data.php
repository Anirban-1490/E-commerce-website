<?php
require './connection.php';
session_start();

if(isset($_POST['remove_item']))
{
    foreach($_SESSION['cart'] as $keys => $values)
    {
        if($values['prod_id']==$_POST['remove_item'])
        {
            unset($_SESSION['cart'][$keys]);
            $item_id = $_POST['remove_item'];
            $user = $_SESSION['id'];
            $quary = "DELETE FROM estore.order WHERE product_id = '$item_id' AND userid = '$user';";
            mysqli_query($connection , $quary);
            header("Location: cart.php");
            exit();
        }
    }
}



if(!isset($_GET['add_to_cart']))
{
    header("Location: home.php");
    exit();
}
 if(isset($_GET['add_to_cart']) && !isset($_SESSION['id']))
{
    header("Location: signup.php");
    exit();
}
else
{
    $prodid = $_GET['add_to_cart'];
    $prd_id = (int)$prodid;
    // $it;
    if(!isset($_SESSION['cart']))
    {
        $quarry = "SELECT * FROM products WHERE prod_id = '$prd_id' +2;";
        $result =mysqli_query($connection,$quarry);
        $itemdetails = mysqli_fetch_array($result);
        $_SESSION['cart'][0] = $itemdetails;
        // $it = $_SESSION['cart'];
        $quary = "INSERT INTO estore.order(product_id,userid) VALUES(?,?);";
        $stmt = mysqli_stmt_init($connection);
        if(!mysqli_stmt_prepare($stmt,$quary))
        {
            header("Location: home.php");
           
        }
        else
        {
            $newprodid = $prd_id+2;
            mysqli_stmt_bind_param($stmt,"ii",$newprodid,$_SESSION['id']);
            mysqli_stmt_execute($stmt);
            header("Location: home.php");
            
        }
    }
    else
    {
        $id_column = array_column($_SESSION['cart'],'prod_id');
        if(!in_array($prd_id+2,$id_column))
        {   
            $count = count($_SESSION['cart']);
            $quarry = "SELECT * FROM products WHERE prod_id = '$prd_id'+2;";
            $result =mysqli_query($connection,$quarry);
            $itemdetails = mysqli_fetch_array($result);
            // die($itemdetails['prod_id']);
            $_SESSION['cart'][$count] = $itemdetails;
            // $it = $_SESSION['cart'];
            $newprodid = $prd_id+2;
            $quary = "INSERT INTO estore.order(product_id,userid)VALUES(?,?);";
            $stmt = mysqli_stmt_init($connection);
            if(!mysqli_stmt_prepare($stmt,$quary))
            {
                header("Location: home.php");
                
            }
            else
            {
           
                mysqli_stmt_bind_param($stmt,"ii",$newprodid,$_SESSION['id']);
                mysqli_stmt_execute($stmt);
                header("Location: home.php");
                
            }
        }   
    }
    
}