<?php
    include 'loginCheck.php';
    include '../includes/connection.php';
    
    $email=$_SESSION['student_email'];
    $sql1 = "SELECT * FROM profile where email='$email'";
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
<body>
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="data:image/jpg;base64,<?php echo base64_encode($row['image']);?>" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['student_rollno'];?></div>
                    <div class="email" style="padding-top: 1%;">
                     <?php echo $_SESSION['student_email'];?>
                    </div>
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
                    <?php
                    	$q = "SELECT * from student where email='$email' AND studentreview='0'";
                    	$r = mysqli_query($conn,$q);
                    	if(mysqli_num_rows($r)>0)
					    {
	                    	$s = 0;
	                    	$q1 = "SELECT * from profile where email='$email'";
	                    	$r1 = mysqli_query($conn,$q1);
	                    	if(mysqli_num_rows($r1)>0)
						    {
						    	$row1 = mysqli_fetch_assoc($r1);
						    	$s = $row1['currentsem'];
						    }
						    if($s <= 8)
						    {
		                    	$q2 = "SELECT * from student where email='$email'";
		                    	$r2 = mysqli_query($conn,$q2);
							    if(mysqli_num_rows($r2)>0)
							    {
							      	$row2 = mysqli_fetch_assoc($r2);
							      	$date1 = $row2['registerdate'];
							  		$date2 = date("Y-m-d");

							  		$ts1 = strtotime($date1);
							  		$ts2 = strtotime($date2);

							  		$year1 = date('Y', $ts1);
							  		$year2 = date('Y', $ts2);

							  		$month1 = date('m', $ts1);
							  		$month2 = date('m', $ts2);

									$diff = (($year2 - $year1) * 12) + ($month2 - $month1);
							    }
							    if($diff == 6 OR $diff > 6)
							    {
					?>
								<li>
			                        <a href="Review.php">
			                            <i class="material-icons">update</i>
			                            <span> Give Academic Review</span>
			                        </a>
			                    </li>
					<?php
						    }
						}
					}
					else
					{
						$q6 = "SELECT * from student where email='$email' AND studentreview='1'";
                    	$r6 = mysqli_query($conn,$q6);
					    if(mysqli_num_rows($r6)>0)
					    {
					      	$row4 = mysqli_fetch_assoc($r6);

					      	$date1 = $row4['registerdate'];
					  		$date2 = date("Y-m-d");

					  		$ts1 = strtotime($date1);
					  		$ts2 = strtotime($date2);

					  		$year1 = date('Y', $ts1);
					  		$year2 = date('Y', $ts2);

					  		$month1 = date('m', $ts1);
					  		$month2 = date('m', $ts2);

							$diff = (($year2 - $year1) * 12) + ($month2 - $month1);

							if($diff >= 6)
							{
						    	$q3 = "SELECT * from profile where email='$email'";
						    	$r3 = mysqli_query($conn,$q3);
							    if(mysqli_num_rows($r3)>0)
							    {
							    	$row3 = mysqli_fetch_assoc($r3);
							    	$sem = $row3['currentsem'] + 1;								    	
							    }
                                if($sem<=8)
                                {
                                    $q4 = "UPDATE profile SET currentsem='$sem' where email='$email'";
                                    mysqli_query($conn,$q4);

    							    $d = date("Y-m-d");
    								$q5 = "UPDATE student SET registerdate='$d', studentreview='0' where email='$email'";
    								mysqli_query($conn,$q5);
                                }
                                else
                                {
                                    $q4 = "UPDATE profile SET currentsem='8' where email='$email'";
                                    mysqli_query($conn,$q4);

                                    $d = date("Y-m-d");
                                    $q5 = "UPDATE student SET registerdate='$d' where email='$email'";
                                    mysqli_query($conn,$q5);

                                    $q7 = "UPDATE student SET password='completedyourcourse' where email='$email'";
                                    mysqli_query($conn, $q7);
                                    echo "<script>alert('Your Study is over !!!');</script>";
                                    session_unset();
                                    session_destroy();
                                    echo "<script>window.location='login.php'</script>";
                                }
							}
					    }
					}	
					?>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">update</i>
                            <span>Query Details</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="AskQuery.php">Ask Query</a>
                            </li>
                            <li>
                                <a href="PendingQuery.php">Pending Query</a>
                            </li>
                            <li>
                                <a href="ResponseQuery.php">Response Of Query</a>
                            </li>
                        </ul>
                    </li>                                  
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2019 - 2020 <a href="javascript:void(0);">Student Mentoring System</a>.
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