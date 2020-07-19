<?php
    include '../includes/connection.php';
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
                <h2>Response of Queries</h2>
            </div>
            <?php 
            $email=$_SESSION['student_email'];
            $query="SELECT * FROM query WHERE email='$email' AND status='1'";
            $result=mysqli_query($conn,$query);
            while($row=mysqli_fetch_assoc($result))
            {
            ?>     
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="card">
                    <div class="header bg-green" style="padding-bottom: 17%;"> 
                        <div class="col-lg-7">
                            <h2>
                            <?php 
                                    echo $row['subject']; 
                            ?>
                            <small><?php echo $row['datetime']; ?></small>
                            </h2>
                        </div>
                        
                    </div>
                    <div class="body">
                        
                        <p style="padding-left: 10%; text-align: justify;"> 
                           <?php echo $row['mentormsg']; ?>
                        </p>
                    </div>
                </div>
            </div>
           <?php
            }
           ?>
        </div>
    </section>
    <?php
        include 'Footer.php';
    ?>
</body>
</html>