<?php
    include 'loginCheck.php';
    include '../includes/connection.php';
    require '../PHPMailer/PHPMailerAutoload.php';
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Sign In</title>
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

<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);">Online<b>Mentoring</b>System</a>
<!--             <small>Admin BootStrap Based - Material Design</small> -->
        </div>
        <div class="card">
            <div class="body">
                 <form method="POST">
                    <div class="msg">Sign in to start your session</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2}\.[a-z]{2}$" placeholder="Email Id" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" placeholder="Password"  required>
                            <!--pattern="^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$"-->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4 p-t-4">
<!--                             <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-pink">
                            <label for="rememberme">Remember Me</label> -->
                        </div> 
                        <div class="col-xs-4">
                            <input type="submit" class="btn btn-block bg-pink waves-effect" name="submit" value="Submit">
                        </div>
                    </div>
                    <div class="row m-t-8 m-b--15">
                        <!-- <div class="col-xs-6">
                            <a href="sign-up.html">Register Now!</a>
                        </div> -->
                        <div class="col-xs-12 align-center">
                            <a href="forgot-password.php">Forgot Password?</a>
                        </div>
                    </div>
                </form>
                <?php
                    if(isset($_POST['submit']))
                    {
                        $email = $_POST['email'];
                        $pswd = $_POST['password'];

                        $sql = "select * from mentor where email='$email' and password='$pswd'";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) 
                        {
                            $row = mysqli_fetch_assoc($result);
                            if($row['password']=='changeme')
                            {
                                $subject = "First Time Authentication OTP";
                                $OTP = rand(100000, 999999);
                                $_SESSION['otp'] = $OTP;
                                
                                $_SESSION['mentor_id']=$row['id'];
                                $_SESSION['mentor_name']=$row['name'];
                                $_SESSION['mentor_email']=$row['email'];
                                $_SESSION['mentor_cabin']=$row['cabin'];

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
                                $mail->addAddress($email); 

                                $mail->isHTML(true);                                  // Set email format to HTML

                                $body = "One Time Password : $OTP";
                                $mail->Subject = $subject;
                                $mail->Body = $body;

                                if(!$mail->send())
                                {
                                    echo "<script>alert('Mail Failed');</script>"; 
                                    echo "<script>window.location='login.php'</script>";
                                }  
                                else
                                {
                                    echo "<script>alert('Check Your Mail For One Time Password');</script>";
                                    echo "<script>window.location='Authentication.php'</script>";
                                }
                            }
                            else
                            {
                                $_SESSION['mentor_id']=$row['id'];
                                $_SESSION['mentor_name']=$row['name'];
                                $_SESSION['mentor_email']=$row['email'];
                                $_SESSION['mentor_cabin']=$row['cabin'];
                                echo "<script>window.location='index.php'</script>";
                            }  
                        } 
                        else 
                        {
                            session_unset();
                            session_destroy();
                            echo "<script>alert('Invalid Username or Password !');</script>";
                        }
                    }
                ?>
            </div>
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
    <script src="js/pages/examples/sign-in.js"></script>
</body>

</html>