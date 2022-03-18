<?php 
require_once("databaseConnect.php");

$emailID = htmlentities($_POST['email']);
$emailID = strtolower($emailID);

$SELECT= "SELECT `email` FROM `user` where `email` = '$emailID' ";
$runquery = mysqli_query($connect, $SELECT);

if (mysqli_num_rows($runquery) > 0) {
    // require 'PHPMailer/PHPMailerAutoload.php';

    
    $class= 'PHPMailerAutoload';

    // function __autoload($class) {
    //     include 'PHPMailer/' . $class . '.php';
    // }

    spl_autoload_register(function ($class) {
        include 'PHPMailer/' . $class . '.php';
    });

    // require 'PHPMailer/PHPMailerAutoload.php';
    require 'PHPMailer/class.phpmailer.php';
    require 'PHPMailer/class.phpmaileroauth.php';
    require 'PHPMailer/class.pop3.php';
    require 'PHPMailer/class.smtp.php';

    //Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        // $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                       //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $email->SMTPSecure = "tls";                                 //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
        
        $mail->Username   = 'jahidcse.me@Gmail.com';                //SMTP username
        $mail->Password   = 'forhad+eva';                           //SMTP password
        

        //Recipients
        $mail->setFrom('jahidcse.me@Gmail.com', 'Insurance');
        $mail->addAddress($emailID, 'user');     //Add a recipient

        $mail->addReplyTo('jahidcse.me@Gmail.com');

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Reset Password';
        $mail->Body    = "Click link To Reset Your Password. 
        <a href='http://insurance.thejahid.xyz/resetPassForm.php?email={$emailID}'>Password Reset</a>";
        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
            
        header("location: ../messg.php?passResetMSG");
            
    } 
    catch (Exception $e) {
        header("location: ../reset.php?Mailer Error:{$mail->ErrorInfo}");
    }
}else {
    header("location: ../reset.php?InvalidUser");
}

?>
