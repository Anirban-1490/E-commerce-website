<?php
   
    include './header-login.php';
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
    <!-- <link rel="stylesheet" href="../CSS/header.css"> -->
    <link rel="stylesheet" href="../CSS/signup-style.css">
    <title>Settings</title>
</head>
<body>

    <div class="content">
        <div class="content-form" style="top: 30%;">
         <h2 style="text-transform: capitalize;">change password</h2>
         <form action="./changepwd.php" method="POST">
             <input type="password" name="old_pwd" id="" placeholder="Old Password">
             <input type="text" name="new_pwd" id="" placeholder="New Password" >
             <input type="text" name="r_new_pwd" id="" placeholder="Re-type New Password">
             <button class="button" type="submit" name="submit_change_pwd">Change</button>
         </form>
         <?php  echo changepwd();?>
        </div>
     </div>
</body>
</html>

<?php
    function changepwd()
    {
        if(!isset($_GET['pwd']))
        {
            return "";
            die();
        }
        else 
        {
            $er = $_GET['pwd'];
            if($er =="empty")
            {
                return "<p class='error'>Please fill up all the fields!</p>";
                exit();
            }
            else if($er =="nomatch")
            {
                return "<p class='error'>Old password dosen't match. Please retype it.</p>";
                exit();
            }
            else if($er =="invalid")
            {
                return "<p class='error'>New password is not valid.</p>";
                exit();
            }
            else if($er =="retyperror")
            {
                return "<p class='error'>Re-typed password dosen't match.</p>";
                exit();
            }
            else if($er == "oldsamenew")
            {
                return "<p class='error'>Your new password can't be same as old password.</p>";
                exit();
            }
            else if($er == "success")
            {
                return "<p class='success'>You have successfully changed your password.</p>";
                exit();
            }
            
        }
    }
?>