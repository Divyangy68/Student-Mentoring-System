<?php
    require '../PHPMailer/PHPMailerAutoload.php';
    $email = $_GET['emailid'];
    if (isset($email)) 
    {
        $mail = new PHPMailer;
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'mail.hostingspell.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'Ishan@hostingspell.com';                 // SMTP username
        $mail->Password = 'Ishan@1704';                           // SMTP password
        $mail->SMTPSecure = 'tls';  
                // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // 587TCP port to connect to

        $mail->setFrom('Ishan@hostingspell.com', 'Student Mentoring System');
        $mail->addAddress($email);               // Name is optional

        $mail->isHTML(true);                                  // Set email format to HTML

        $r = $_SESSION['PDREVIEW'];
        
        if($r == 1)
        {
            $body = "This Mail for Remind you to Submit Academic Review Form. <br> From this, We are give a knowledge about to fill Academic Review From as soon as possible ";
            $mail->Subject = 'Pending to fill Academic Review From';
            $mail->Body = $body;

            if(!$mail->Send())
            {
                echo "<script>alert('Mail Failed');</script>";
                echo "<script>window.location='PendingReview.php'</script>";
            }  
            else
            {
                echo "<script>alert('Mail Submitted');</script>";
                echo "<script>window.location='PendingReview.php'</script>";
            }
        }
        else
        {
            $body = "This Mail for Remind you to Submit Student Detail Form. <br> From this, We are give a knowledge about to fill Student Details form as soon as possible ";
            $mail->Subject = 'Pending to fill Student Detail From';
            $mail->Body = $body;

            if(!$mail->Send())
            {
                echo "<script>alert('Mail Failed');</script>";
                echo "<script>window.location='PendingDetails.php'</script>";
            }  
            else
            {
                echo "<script>alert('Mail Submitted');</script>";
                echo "<script>window.location='PendingDetails.php'</script>";
            }
        }
    }
?>