<?php
    include 'loginCheck.php';
    include '../includes/connection.php';
    $emailid = $_GET['emailid'];
?>
<!DOCTYPE html>
<html>
<body>
    <?php
        include 'Header.php';
        include 'Menu.php';
    ?>
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2><center>Queries And Response</center></h2>
            </div>
            
            <!-- Basic Example -->
            <div class="row clearfix">
            <?php 
                $query="SELECT * FROM query WHERE email='$emailid'";
                $result=mysqli_query($conn,$query);
                while($row=mysqli_fetch_assoc($result))
                {
                    $status = $row['status'];
                    if($status == 0)
                    {
            ?>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="card">
                            <div class="header bg-red">
                                <h2>Subject : <?php echo $row['subject'];?></h2><br>
                                <small style="padding-left: 50%">Query Ask Date :<?php echo $row['datetime'];?></small>
                            </div>
                            <div class="body"><?php echo $row['message'];?></div>
                        </div>
                    </div>
            <?php
                    }
                    else
                    {
            ?>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="card">
                        <div class="header bg-red">
                            <h2>Subject : <?php echo $row['subject'];?></h2><br>
                            <small style="padding-left: 50%">Query Ask Date :<?php echo $row['datetime'];?></small>
                        </div>
                        <div class="body"><?php echo $row['message'];?></div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12"></div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="card">
                        <div class="header bg-green">
                            <h2>Subject : <?php echo $row['subject'];?></h2><br>
                            <small style="padding-left: 50%">Response Date : <?php echo $row['responsedate'];?></small>
                        </div>
                        <div class="body"><?php echo $row['mentormsg'];?></div>
                    </div>
                </div>
            <?php
                    }
                }
            ?>
            </div>
        </div>
    </section>
    <?php
        include 'Footer.php';
    ?>
</body>
</html>