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
    <link rel="stylesheet" href="../CSS/signup-style.css">
    <!-- <link rel="stylesheet" href="../CSS/footer.css"> -->
    
    
    <title>SignUp Page</title>
</head>
<body>
  
 
    <div class="content">
       <div class="content-form">
        <h2>Sign Up</h2>
        <form action="../HTML/data-sender.php" method="POST">
            <input type="text" name="fullname" id="" placeholder="Name" >
            <input type="text" name="mail" id="" placeholder="Email">
            <input type="text" name="pwd" id="" placeholder="Password">
            <input type="text" name="c_number" id="" placeholder="Contact Number" >
            <input type="text" name="city" id="" placeholder="City">
            <input type="text" name="address" id="" placeholder="Address">
            <button class="button" type="submit" name="submit_signUp">Sign Up</button>
        </form>
        <?php echo error(); ?>
       </div>
    </div>
</body>
</html>

<?php
    include './footer.php';

    function error()
    {
        if(!isset($_GET['signup']))
        {
            return "";
            exit();
        }
         else
        {
            $signupvalue = $_GET['signup'];
            if($signupvalue=="error")
            {
                return "<p class='error'>Please submit the form!</p>";
                exit();
            }
            else if($signupvalue=="empty")
            {
               return "<p class='error'>Please fill up all the fields!</p>";
                exit();
            }
            else if($signupvalue =="errornameandmail")
            {
                return "<p class='error'>Please put a valid name and email.</p>";
                exit();
            }
            else if($signupvalue=="errorname")
            {
                return "<p class='error'>Not a valid name.</p>";
                exit();
            }
            else if($signupvalue=="erroremail")
            {
                return "<p class='error'>Not a valid email.</p>";
                exit();
            }
            else if($signupvalue=="errorpwd")
            {
                return "<p class='error'>Not a valid password.</p>";
                exit();
            }
            else if($signupvalue=="errorcontactno")
            {
                return "<p class='error'>Not a valid contact number.</p>";
                exit();
            }
            else if($signupvalue=="errorcity")
            {
                return "<p class='error'>Not a valid city name.</p>";
                 exit();
            }
            else if($signupvalue=="erroraddress")
            {
                return "<p class='error'>Not a valid address name.</p>";
                exit();
            }
            else if($signupvalue=="samecontactandmail")
            {
                return "<p class='error'>User already exist. Please Log In.</p>";
                exit();
            }
            else if($signupvalue=="samemail")
            {
                return "<p class='error'>There is already an user with this email. Please use a different email.</p>";
                exit();
            }
            else if($signupvalue=="samecontact")
            {
                return "<p class='error'>There is already an user with this contact number. Please use a different contact number.</p>";
                exit();
            }
        }
    }
?>