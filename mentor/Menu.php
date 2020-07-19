<?php
    include 'loginCheck.php';
    include '../includes/connection.php';

    $email=$_SESSION['mentor_email'];
    $sql1 = "SELECT * FROM mentor where email='$email'";
    $result1 = mysqli_query($conn,$sql1);
    if($result1)
    {
      $row = mysqli_fetch_assoc($result1);
    }
    else
    {
        echo "<script>alert('No Records Found !');</script>";
        echo "<script>window.loaction='index.php'</script>";
    }
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Welcome To | Student Mentoring System</title>
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

    <!-- Morris Chart Css-->
    <link href="../plugins/morrisjs/morris.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="../css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="../css/themes/all-themes.css" rel="stylesheet" />
</head>
<body class="theme-red">
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="data:image/jpg;base64,<?php echo base64_encode($row['image']);?>" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['mentor_name'];?></div>
                    <div class="email"><?php echo $_SESSION['mentor_email'];?></div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="Profile.php"><i class="material-icons">person</i>Profile</a></li>
                            <li role="seperator" class="divider"></li>                          
                            <li><a href="./logout.php"><i class="material-icons">input</i>Sign Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li class="active">
                        <a href="index.php">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">person</i>
                            <span>Student Details</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="StudentDetails.php">Submitted Student's Details</a>
                            </li>
                            <li>
                                <a href="PendingDetails.php">Pending Student's Details</a>
                            </li>                         
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">update</i>
                            <span>Academic Review</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="MentorReview.php">Submitted Student's Review</a>
                            </li>
                            <li>
                                <a href="PendingReview.php">Pending Student's Review</a>
                            </li>                         
                        </ul>
                    </li>  
                    <li>
                        <a href="StudentQueryDetails.php">
                            <i class="material-icons">update</i>
                            <span>Student Query Details</span>
                        </a>
                    </li>                  
                    <!-- <li>
                        <a href="AttendenceSheet.php">
                            <i class="material-icons">assignment</i>
                            <span>Attendence Details</span>
                        </a>
                    </li>
                    <li>
                        <a href="Result.php">
                            <i class="material-icons">content_copy</i>
                            <span>Result Details</span>
                        </a>
                    </li>     -->                   
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2019 - 2020 <a href="index.php">Student Mentoring System</a>.
                </div>
                <div class="version">
                    <b>Version: </b> 1.0.5
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
    </section>
</body>
</html>