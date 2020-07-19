<?php
    include '../includes/connection.php';
    include 'loginCheck.php';
    require '../PHPMailer/PHPMailerAutoload.php';
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Mentor | Forgot Password | Student Mentoring System</title>
    <!-- Favicon-->
    <link rel="icon" href="../favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="../plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="../plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="../plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="../css/style.css" rel="stylesheet">
    <style type="text/css">
        b{
            color: #E91E63;
        }   
    </style>
</head>

<body class="fp-page">
    <div class="fp-box">
        <div class="logo">
            <a href="javascript:void(0);">Online<b>Mentoring</b>System</a>       
        </div>
        <div class="card">
            <div class="body">
                <form method="POST" action="#">
                    <div class="msg">
                        Enter your email address that you used to register. We'll send you an Email with One Time Password.
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">email</i>
                        </span>
                        <div class="form-line">
                            <input type="email" class="form-control" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2}\.[a-z]{2}$" placeholder="Email" required="required" autofocus>
                        </div>
                    </div>

                    <button class="btn btn-block btn-lg bg-pink waves-effect" type="submit" name="submit">Send OTP</button>  
                </form>
                <div class="row m-t-20 m-b--5 align-center">
                    <a href="login.php">Sign In!</a>
                </div>
                <?php
                    if (isset($_POST['submit'])) {
                        $email = $_POST['email'];
                        $_SESSION['email'] = $email;
                        $subject = "Forgot Password OTP";
                        $OTP = rand(10000, 99999);
                        $_SESSION['otp'] = $OTP;

                        $sql = "SELECT * from mentor where email='$email'";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) 
                        {
                    	    $mail = new PHPMailer;
                          	$mail->isSMTP();                                      // Set mailer to use SMTP
							$mail->Host = 'mail.hostingspell.com';  // Specify main and backup SMTP servers
							// $mail->SMTPDebug = 1; 
							$mail->SMTPAuth = true;                               // Enable SMTP authentication
							$mail->Username = 'Ishan@hostingspell.com';                 // SMTP username
							$mail->Password = 'Ishan@1704';                           // SMTP password
							$mail->SMTPSecure = 'tls';  
							        // Enable TLS encryption, `ssl` also accepted
							$mail->Port = 587;                                    // 587TCP port to connect to

							$mail->setFrom('Ishan@hostingspell.com', 'Student Mentoring System');
                            $mail->addAddress($email);               // Name is optional

							$mail->isHTML(true);                                  // Set email format to HTML

							$body = "One Time Password For Reseting The Password : $OTP";
                            $mail->Subject = 'Forgot Password Reset OTP';
                            $mail->Body = $body;

                            if(!$mail->send())
                            {
                                echo "<script>alert('Mail Failed');</script>";
                                echo 'Error : '.$mail->ErrorInfo;
                            }  
                            else
                            {
                                echo "<script>alert('Check Your Mail For One Time Password');</script>";
                                echo "<script>window.location='Authentication.php'</script>";
                            }
                        }
                        else
                        {
                            echo "<script>alert('UnAuthorized Email Id...');</script>";
                            echo "<script>window.location='forgot-password.php'</script>";
                        }
                    }
                ?>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <script src="js/pages/examples/forgot-password.js"></script>
</body>

</html>