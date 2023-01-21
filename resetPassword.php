<?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'lib/PHPMailer-master/src/PHPMailer.php';
    require 'lib/PHPMailer-master/src/SMTP.php';
    require 'lib/vendor/autoload.php';
    
    $email = $_POST['email'];
    echo $email;

    $data = file_get_contents("metadata/login.json"); 
    $jsonArray = json_decode($data, true);
    
    $valid = false;
    $cnt = 0;

    // un vero sistema di reset password non controllerebbe se la mail è nel db 
    foreach($jsonArray as $value){
        if($value['email'] == $email){
            $valid = true;

            $token = bin2hex(random_bytes(16));

            $jsonArray[$cnt]['token'] = $token;

            $jsonData = json_encode($jsonArray);

            file_put_contents('metadata/login.json', $jsonData);
        }
        $cnt++;
    }

    if (!$valid) {
        echo "Indirizzo email non trovato";
    } else {

        $mail = new PHPMailer(true);

        //Uses SMTP
        $mail->IsSMTP();
        //Set the hostname of the mail server
        $mail->Host = 'smtp.gmail.com';
        //Enable SMTP authentication
        $mail->SMTPAuth = true;
        //Username to use for SMTP authentication - use full email address for gmail
        $mail->Username = "testprogrammi2023@gmail.com";
        //Password to use for SMTP authentication
        $mail->Password = "yaupvvrydopqhcgf";
        //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
        $mail->Port = 587;
        //Set the encryption system to use - ssl (deprecated) or tls
        $mail->SMTPSecure = 'tls';

        $mail->setFrom('testprogrammi2023@gmail.com');
        $mail->addAddress($email);
        //$mail->addReplyTo('replyto@example.com', 'Reply-to Name');

        $mail->isHTML(true);

        $mail->Subject = 'Reset password (PHP Project)';
        $mail->Body    = 'Reset Account password by using this link: http://localhost:8080/resetPasswordPage.php?token='.$token;
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        if(!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            //echo 'Message has been sent';
            header("Location: forgotPasswordPage.php");
        }
    }
