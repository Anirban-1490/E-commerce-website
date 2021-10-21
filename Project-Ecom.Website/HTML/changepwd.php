<?php
require './connection.php';
session_start();
if(!isset($_POST['submit_change_pwd']))
{
    header("Location: settings.php");
    exit();
}
else{
    $id = $_SESSION['id'];
    $oldpwd = mysqli_escape_string($connection,$_POST['old_pwd']);
    $newpwd = mysqli_escape_string($connection,$_POST['new_pwd']);
    $r_newpwd = mysqli_escape_string($connection,$_POST['r_new_pwd']);

    if(empty($oldpwd) || empty($newpwd) || empty($r_newpwd))
    {
        header("Location: settings.php?pwd=empty");
        die();
    }
    else{
        $sql = "SELECT * FROM users WHERE user_id =?;";
        $stmt = mysqli_stmt_init($connection);
        if(!mysqli_stmt_prepare($stmt,$sql))
        {
            header("Location: settings.php?pwd=sqlerror");
            die();
        }
        else{
            mysqli_stmt_bind_param($stmt,"i",$id);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if($row = mysqli_fetch_assoc($result))
            {
                $pwdcheck = password_verify($oldpwd,$row['pwd']);
                if($pwdcheck==false)
                {
                    header("Location: settings.php?pwd=nomatch");
                    die();
                }
                else if($pwdcheck==true)
                {   
                    if(!preg_match("/^[a-zA-Z0-9]*$/",$newpwd) || !preg_match("/^[a-zA-Z0-9]*$/",$r_newpwd))
                    {
                        header("Location: settings.php?pwd=invalid");
                        die();
                    }
                    else if($r_newpwd != $newpwd)
                    {
                        header("Location: settings.php?pwd=retyperror");
                        die();
                    }
                    else 
                    {
                       
                        $enryptpwd = password_hash($newpwd,PASSWORD_DEFAULT);
                        if(password_verify($newpwd,$row['pwd'])==true)
                        {
                            header("Location: settings.php?pwd=oldsamenew");
                            die();
                        }
                        else{
                            $sql = "UPDATE users SET pwd =? WHERE user_id =?;";

                            $stmt = mysqli_stmt_init($connection);
                            if(!mysqli_stmt_prepare($stmt,$sql))
                            {
                                header("Location: settings.php?pwd=sqlerror");
                                die();
                            }
                            else{
                                mysqli_stmt_bind_param($stmt,"si",$enryptpwd,$id);
                                mysqli_stmt_execute($stmt);
                                
                                header("Location: settings.php?pwd=success");
                                die();
                            }
                        }

                    }


                }
                else{
                    header("Location: settings.php?pwd=nomatch");
                    die();
                }
            }
        }
    }
}