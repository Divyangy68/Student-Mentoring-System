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
                <h2>Panding Queries</h2>
            </div>
            
            <!-- Basic Example -->
            <div class="row clearfix">
            <?php 
            $email=$_SESSION['student_email'];
            $query="SELECT * FROM query WHERE email='$email' AND status='0'";
            $result=mysqli_query($conn,$query);
            while($row=mysqli_fetch_assoc($result))
            {
                ?>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="card">
                        <div class="header bg-red">
                            <h2>
                      <?php echo $row['subject']; ?>
                            </h2><small><?php echo $row['datetime']; ?></small>
                        </div>
                        <div class="body">
                        <?php echo $row['message']; ?>
                        </div>
                    </div>
                </div>
                <?php
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