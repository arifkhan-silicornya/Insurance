<?php 
require_once("databaseConnect.php");

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

$fullName = htmlentities($_POST['fullName']);
$gender = htmlentities($_POST['gender']);
$NID = htmlentities($_POST['NID']);

$emailnumber = htmlentities($_POST['email']);
$emailnumber = strtolower($emailnumber);

$number = htmlentities($_POST['number']);
$PassW = htmlentities($_POST['PassW']);
$RetypePass = htmlentities($_POST['RetypePass']);



if ($PassW == $RetypePass) {
    
if (isset($_POST['fullName']) &&  isset($_POST['NID']) &&  isset($_POST['email']) && isset($_POST['number'])) {
    


    $SELECT= "SELECT `nid_number` FROM `user` where `nid_number` = ? limit 1";

        //prepare statement
        $stmt = $connect->prepare($SELECT);
        $stmt -> bind_param("i", $NID);
        $stmt -> execute();
        $stmt -> bind_result($NID);
        $stmt -> store_result();
        $rnum = $stmt -> num_rows;
        if ($rnum == 0) {
            $stmt -> close();
            $SELECT2= "SELECT `phoneNumber` FROM `user` where `phoneNumber` = ? limit 1";

            //prepare statement
            $stmt = $connect->prepare($SELECT2);
            $stmt -> bind_param("i", $number);
            $stmt -> execute();
            $stmt -> bind_result($number);
            $stmt -> store_result();
            $rnum1 = $stmt -> num_rows;
            if ($rnum1 == 0) {
                $stmt -> close();
                $SELECT3= "SELECT `email` FROM `user` where `email` = ? limit 1";

                //prepare statement
                $stmt = $connect->prepare($SELECT3);
                $stmt -> bind_param("s", $emailnumber);
                $stmt -> execute();
                $stmt -> bind_result($emailnumber);
                $stmt -> store_result();
                $rnum3 = $stmt -> num_rows;
                if ($rnum3 == 0) {
                    $stmt -> close();

                    

                    //Instantiation and passing `true` enables exceptions
                    $mail = new PHPMailer(true);

                     try {
                        //Server settings
                        $mail->isSMTP();                                            //Send using SMTP
                        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                        $mail->SMTPSecure = 'tls';      //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                        $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
                        
                        $mail->Username   = 'mastermindtour@gmail.com';                     //SMTP username
                        $mail->Password   = 'dwaaxbjzfhmhtxuu';                               //SMTP password
                             //SMTP password
                        
                        
                        

                        //Recipients
                        $mail->setFrom('mastermindtour@gmail.com', 'Insurance');
                        $mail->addAddress($emailnumber, $fullName);     //Add a recipient

                        $mail->addReplyTo('mastermindtour@gmail.com');

                        //Content
                        $mail->isHTML(true);                                  //Set email format to HTML
                        $mail->Subject = 'Cofirm Registration';
                        $mail->Body    = "Click link To Confirm Your Registration. 
                        <a href='http://localhost/Insurance/php/confirm.php?email={$emailnumber}'>Confirm Now</a>";
                        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                        $mail->send();
                            $insertDataInDb= "INSERT INTO `user` (`nid_number`,`name`,`email`,`phoneNumber`,`password`, `gender`) VALUES('$NID','$fullName','$emailnumber','$number','$PassW', '$gender')";
                            $runquery = mysqli_query($connect, $insertDataInDb);
        
                            if ($runquery == true) {
                                $insertDataInpreadd= "INSERT INTO `address` (`email`) VALUES('$emailnumber')";
                                mysqli_query($connect, $insertDataInpreadd);

                                header("location: ../messg.php?checkyourMail");
                            }
                            else {
                                header("location: ../register.php?failed");
                            }
                    } 
                    catch (Exception $e) {
                            header("location: ../register.php?Mailer Error:{$mail->ErrorInfo}");
                        }
                    }else{
                    header("location: ../register.php?duplicateEMAIL");
                }

            }else{
                header("location: ../register.php?duplicateNUMBER");
            }

        }else{
            header("location: ../register.php?duplicateNID");
        }
}
}else {
    header("location: ../register.php?passwordnotMatched");
}
?>