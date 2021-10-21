<?php

require './connection.php';
require './PHPMailer/Exception.php';
require './PHPMailer/PHPMailer.php';
require './PHPMailer/SMTP.php';

// Namespaces
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if(!isset($_POST['forgot_pass']))
{
    header("Location: index.php");
    exit();
}
else
{
    $email = mysqli_escape_string($connection,$_POST['e_mail']);
    if(empty($email))
    {
        header("Location: forgot-pass.php?email=empty");
        die();
    }
    else{
        $sql = "SELECT * FROM users WHERE email =?;";
        $stmt = mysqli_stmt_init($connection);
        if(!mysqli_stmt_prepare($stmt,$sql))
        {
            header("Location: forgot-pass.php?email=sqlerror");
            die();
        }
        else{
            mysqli_stmt_bind_param($stmt,"s",$email);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if(mysqli_num_rows($result)>0)
            {
                $str = "1234567890abcdefghijklmnopqrstuvwxyz@#";
                $sufflestring = str_shuffle($str);
                $sub = substr($sufflestring,0,8);
                $enryptpwd = password_hash($sub,PASSWORD_DEFAULT);
               
                    $sql = "UPDATE users SET pwd =? WHERE email =?;";

                    $stmt = mysqli_stmt_init($connection);
                    if(!mysqli_stmt_prepare($stmt,$sql))
                    {
                        header("Location: forgot-pass.php?email=sqlerror");
                        die();
                    }
                    else{
                        mysqli_stmt_bind_param($stmt,"ss",$enryptpwd,$email);
                        mysqli_stmt_execute($stmt);

                        $to = $email;
                        $subject = "Reset password for your E-store account";

                        $message = '<p>Here is your new password</p>';
                        $message.='<p> Here is your new password : </br>';
                        $message.=$sub;

                        $headers = "From: estore <estore@gmail.com>\r\n";
                        $headers.="Reply-To: estore@gmail.com\r\n";
                        $headers.="Content-type: text/html\r\n";

                        // mail($to,$subject,$message,$headers);

                        $sentemail =false;
                        $mail = new PHPMailer();
                        $mail->isSMTP();
                        $mail->SMTPAuth ="true";
                        $mail->SMTPSecure='ssl';
                        $mail->Host = 'smtp.gmail.com';
                        $mail->Port = '587';
                        $mail->isHTML();
                        $mail->Username = 'emulationmaniac64@gmail.com';
                        $mail->Password ='emulationmaniac64__';
                        $mail->Subject = $subject;
                        $mail->setFrom('emulationmaniac64@gmail.com');
                        $mail->Body = $message;
                        $mail->addAddress($to);
                        if($mail->send())
                        {
                            $sentemail=true;
                            echo "sent";
                        }
                        $mail->smtpClose();

                        if($sentemail==true)
                        {
                            header("Location: forgot-pass.php?email=success");
                            die();
                        }
                        
                    }
                
            }
            else
            {
                header("Location: forgot-pass.php?email=nouser");
                die();
            }
        }

    }
}