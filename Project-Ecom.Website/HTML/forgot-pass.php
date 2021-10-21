<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/signup-style.css">
    <title>Forgot Password ?</title>
</head>
<body>
    <div class="content">
        <div class="content-form" style="top: 40%;">
            <h2>Forgot Password?</h2>
            <form action="./password_forgot_sender.php" method="POST">
                <input type="text" name="e_mail" id="" placeholder="Enter your email">
                <button class="button" type="submit" name="forgot_pass">Send Mail</button>
            </form>
            <?php echo error_mail(); ?>
        </div>
    </div>
</body>
</html>
<?php
    

    function error_mail()
    {
        if(!isset($_GET['email']))
        {
            return "";
            exit();
        }
         else
        {
            $signupvalue = $_GET['email'];
             
            if($signupvalue=="empty")
            {
               return "<p class='error'>Please fill up the field!</p>";
                exit();
            }
            else if($signupvalue =="nouser")
            {
                return "<p class='error'>No user is regesterd with this email</p>";
                exit();
            }
            else if($signupvalue=="success")
            {
                return "<p class='success'>Email sent.</p>";
                exit();
            }
            
        }
    }
?>