<?php
require './connection.php';
session_start();
if(!isset($_POST['submit_signUp']))
{
    header('Location: signup.php?signup=error');
    exit();
}
else
{
        
    $name =  mysqli_escape_string($connection , $_POST['fullname']);
    $email =  mysqli_escape_string($connection , $_POST['mail']);
    $pwd =  mysqli_escape_string($connection , $_POST['pwd']);
    $c_no =  mysqli_escape_string($connection , $_POST['c_number']);
    $city =  mysqli_escape_string($connection , $_POST['city']);
    $address =  mysqli_escape_string($connection , $_POST['address']);

    if(empty($name) || empty($email)||empty($pwd)||empty($c_no)||empty($city)||empty($address))
    {
        header("Location: signup.php?signup=empty&name='$name'&mail='$email'");
        die();
    }
    else if(!preg_match("/^[a-zA-Z' ]*$/",$name) && !filter_var($email,FILTER_VALIDATE_EMAIL))
    {
        header("Location: signup.php?signup=errornameandmail");
        die();
    }
    else if(!preg_match("/^[a-zA-Z ]*$/",$name))
    {
        header("Location: signup.php?signup=errorname&mail='$email'");
        die();
    }
    else if(!filter_var($email,FILTER_VALIDATE_EMAIL))
    {
        header("Location: signup.php?signup=erroremail&name='$name'");
        die();
    }
    else if(!preg_match("/^[a-zA-Z0-9]*$/",$pwd))
    {
        header("Location: signup.php?signup=errorpwd&name='$name'&mail='$email'");
        die();
    }
    else if(!preg_match("/[0-9]/",$c_no))
    {
        header("Location: signup.php?signup=errorcontactno&name='$name'&mail='$email'");
        die();
    }
    else if(!preg_match("/^[a-zA-Z' ]*$/",$city))
    {
        header("Location: signup.php?signup=errorcity&name='$name'&mail='$email'");
        die();
    }
    else if(!preg_match("/^[a-zA-Z0-9-.,' ]*$/",$address))
    {
        header("Location: signup.php?signup=erroraddress&name='$name'&mail='$email'");
        die();
    }
    else
    {
        $q1 = "SELECT * FROM users WHERE email ='$email' AND contact_number ='$c_no';";
        $q2 = "SELECT * FROM users WHERE email ='$email';";
        $q3 = "SELECT * FROM users WHERE contact_number ='$c_no';";

        if(mysqli_num_rows(mysqli_query($connection,$q1))>0)
        {
            header("Location: signup.php?signup=samecontactandmail&name='$name'&mail='$email'");
            die();
        }
        else if(mysqli_num_rows(mysqli_query($connection,$q2))>0)
        {
            header("Location: signup.php?signup=samemail&name='$name'&mail='$email'");
            die();
        }
        else if(mysqli_num_rows(mysqli_query($connection,$q3))>0)
        {
            header("Location: signup.php?signup=samecontact&name='$name'&mail='$email'");
            die();
        }
        else
        {
            $quary = "INSERT INTO users(fullname,email,pwd,contact_number,city,user_address,signup_date)VALUES(?,?,?,?,?,?,CURRENT_DATE);";
            $stmt = mysqli_stmt_init($connection);
            if(!mysqli_stmt_prepare($stmt,$quary))
            {
                header('Location: signup.php?signup=errorsql');
                exit();
            }
            else
            {
                $encryptedPwd = password_hash($pwd,PASSWORD_DEFAULT);
            

                mysqli_stmt_bind_param($stmt,"ssssss",$name,$email,$encryptedPwd,$c_no,$city,$address);
                mysqli_stmt_execute($stmt);
                $_SESSION['id'] =mysqli_insert_id($connection);
                $_SESSION['name'] =$name;
                header('Location: home.php');
                exit();
            }
        }

        
       
    }
}



