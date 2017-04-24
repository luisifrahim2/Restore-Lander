<?php 

    if (isset($_POST['name']) && $_POST['name'] != "")
    {
        
       
        require 'phpmailer/class.phpmailer.php';

        $mail = new PHPMailer;

        //$mail->SMTPDebug = 3;                               // Enable verbose debug output

        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.mailgun.org';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'postmaster@treatsearch.com';                 // SMTP username
        $mail->Password = '4aaca8063d90183885faa98bdc789771';                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to

        $mail->setFrom('leads@treatsearch.com', 'Treatment Centers');
        $mail->addAddress('leads@treatsearch.com', 'Treatment Centers');     // Add a recipient
        $mail->addAddress('ihernandez@recoveryhealthcaresystems.com', 'Treatment Centers');
        //$mail->addReplyTo('info@example.com', 'Information');
        
        

        
        $mail->isHTML(true);                                  // Set email format to HTML

        $mail->Subject = 'New contact from submission';
        $mail->Body    = 'Name= '.$_POST['name'].'<br> Email= '.$_POST['email'].'<br> Phone= '.$_POST['phone'].'<br> Message= '.$_POST['message'];
        $mail->AltBody = 'Name= '.$_POST['name'].'<br> Email= '.$_POST['email'].'<br> Phone= '.$_POST['phone'].'<br> Message= '.$_POST['message'];

        if(!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo 'Message has been sent';
        }
    }

?>