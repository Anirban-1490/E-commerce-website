<?php
require './connection.php';


if(!isset($_POST['submit_login']))
{
    header('Location: index.php');
    exit();
}
else
{
    $useremail = mysqli_escape_string($connection,$_POST['mailuser']);
    $pwduser = mysqli_escape_string($connection,$_POST['pwduser']);

    if(empty($useremail) || empty($pwduser))
    {
        header("Location: index.php?error=empty");
        die();
    }
    else{
        $sql = "SELECT * FROM users WHERE email =?;";
        $stmt = mysqli_stmt_init($connection);
        if(!mysqli_stmt_prepare($stmt,$sql))
        {
            header("Location: index.php?error=sqlerror");
            die();
        }
        else{
            mysqli_stmt_bind_param($stmt,"s",$useremail);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if($row = mysqli_fetch_assoc($result))
            {
                $pwdcheck = password_verify($pwduser,$row['pwd']);
                if($pwdcheck==false)
                {
                    header("Location: index.php?error=wrongpwd");
                    die();
                }
                else if($pwdcheck==true)
                {
                    session_start();
                    $_SESSION['id'] =$row['user_id'];
                    $_SESSION['name'] =$row['fullname'];

                    header('Location: home.php');
                    die();
                }
                else
                {
                    header("Location: index.php?error=wrongpwd");
                    die();
                }
            }
            else
            {
                header("Location: index.php?error=nouser");
                die();
            }
        }
    }
}